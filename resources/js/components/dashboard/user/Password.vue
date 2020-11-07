<template>
	<v-main >
		<v-container fluid> 
			<v-overlay :value="showFullLoading" :absolute="absolute">
				<v-progress-circular indeterminate size="64"></v-progress-circular>
			</v-overlay>
            <v-toolbar color="transparent" flat>
                <v-avatar tile color="primary" class=" elevation-12">
                    <v-icon dark>face</v-icon>
                </v-avatar>

                <v-toolbar-title class="ml-4 primary--text" >{{$t('message.user.password')}}</v-toolbar-title>

                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Search"
                    hide-details
                    outlined
                    dense

                ></v-text-field>
            </v-toolbar>
			<Breadcrumbs/>
			<v-row justify="center">
				<v-col sm="12" md="12" lg="12">
					<v-data-table color="white" :headers="headers" :items="dataList" :search="search" class="elevation-4">
						<template v-slot:item.action="{ item }">
							<v-icon small @click="editItem(item)">edit</v-icon>
						</template>
						<template v-slot:item.status="{ item }">
							<v-chip :color="item.status?'green':'red'" text-color="white" >{{item.status?'Active':'Disable'}}</v-chip>
						</template>
						<template v-slot:item.type="{ item }">
							{{item.user_type.name}}
						</template>
						<template v-slot:no-data>
							<NoDataList :loading="loading" @initialize="initialize"></NoDataList>
						</template>
					</v-data-table>
				</v-col>
			</v-row>
			<!-- <v-btn bottom color="primary" dark fab fixed right @click="dialog = !dialog">
				<v-icon>mdi-plus</v-icon>
			</v-btn> -->
		</v-container>
        <v-dialog v-model="dialog" max-width="500px" persistent>
            <v-card>
				<v-card color="primary" dark :tile="true" flat >
					<v-card-title
					class="headline"
					v-text="formTitle"
					></v-card-title>
         		 </v-card >
                <v-card-title>
                </v-card-title>

                 <v-card-text>
                  <v-container grid-list-md>
                    <v-layout wrap>
                      <v-flex xs12 sm12s md12 >
                        <v-text-field
                          v-model="editedItem.password"
                          :rules="passwordRules"
                          label="Password"
                          type="text"
                          filled
                        ></v-text-field>
                      </v-flex>
                    </v-layout>
                  </v-container>
              </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" text @click="close">Cancel</v-btn>
                    <v-btn
                        color="primary"
                        :loading="loading"
                        :disabled="loading"
                        text
                        @click="save"
                    >Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
		<v-snackbar
			v-model="snackbar"
			:vertical="snackvertical"
			:timeout="snacktimeout"
			:top="snacktop"
			:right="snackright"
			:color="snackcolor"
		>
			{{ snacktext }}
		</v-snackbar>
	</v-main>
</template>

<script>
import Breadcrumbs from "./../../common/Breadcrumbs"
import NoDataList from "./../../common/NoDataList"
export default {
	components:{
		Breadcrumbs,
		NoDataList
	},
	data: () => ({
		search: "",
		absolute: true,
		loading: false,
		edit: true,
		dialog: false,
		dataList: [],
		dataBreadcrumbs:[],
		
		userType: [],
		headers: [
		    { text: "ID", align: "left", value: "id" },
			{text: "Name", value: "name"},
			{ text: "Email", value: "email" },
			{ text: "Type", value: "type" },
			{ text: "status", value: "status" },
			{ text: "Action", value: "action" }
		],
		emailRules: [
			v => !!v || "E-mail is required",
			v => /.+@.+.\.+.+/.test(v) || "E-mail must be valid"
		],
		usernameRules: [
			v => !!v || "Name is required",
			v => (v || "").indexOf(" ") < 0 || "No spaces are allowed"
		],
		passwordRules: [
			v => (v || "").length >= 8 || `A minimum of 8 characters is allowed`
		],
		editedIndex: -1,
		editedItem: {
			name: "",
			email: "",
			type: "",
			contact: "",
			address: "",
			status: 1
		},
		defaultItem: {
			name: "",
			email: "",
			type: "",
			contact: "",
			address: "",
			status: 1
		},
		dataStatus: [
			{ name: "Active", value: 1 },
			{ name: "Disable", value: 0 }
		]
	}),

props: {
    source: String
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    }
  },
  watch: {},
  created() {
    this.initialize();
  },
  methods: {
    async initialize() {
      try {
        let { data } = await axios({
          method: "get",
          url: "/app/user"
        });
        this.dataList = data;
      } catch (e) {}
 try {
        let { data } = await axios({
          method: "get",
          url: "/app/usertype"
        });
        this.userType = data;
      } catch (e) {}
    },
    editItem(item) {
      this.edit = false;
      this.editedIndex = this.dataList.indexOf(item);
	  this.editedItem = Object.assign({}, item);
	  this.editedItem.password = Math.random().toString(36).slice(-10);
      this.dialog = true;
    },
    deleteItem(item) {
    	this.dataIndex = this.dataList.indexOf(item);
			this.deleteTitle = "Are you sure you want to delete this item?";
			this.isDelete = !this.isDelete;
    },
    close() {
	  this.dialog = false;
	  this.edit = true;
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      }, 300);
    },
    async save() 
    {
      if (this.editedIndex > -1) {
        try {
          let { data } = await axios({
            method: "post",
            url: "/app/updatepassword",
            data: this.editedItem
          });
		  this.dataList[this.editedIndex].status=3;
		   this.snacks('Successfully Done','green')
          this.close();
        } catch (e) {
          this.loading = false;
        }
      }
    },
    async remove() {
			try {
				let { data } = await axios({
					method: "delete",
					url: "/app/user/" + this.dataList[this.dataIndex].id
				});
				if (data.status) {
					this.snacks('Successfully Done','green')
					this.dataList.splice(this.dataIndex, 1);
					this.close();				
				}
				else
				{
					this.snacks(data.data,'red')
					this.loading = false;
				}

			} catch (e) {
				this.snacks('Operation Failed','red')
				this.loading = false;
			}
		}
  }
};
</script>