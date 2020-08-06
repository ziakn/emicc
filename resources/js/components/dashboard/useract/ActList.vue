<template>
	<v-content >
		<v-container fluid> 
			<v-overlay :value="showFullLoading" :absolute="absolute">
				<v-progress-circular indeterminate size="64"></v-progress-circular>
			</v-overlay>
            <v-toolbar color="transparent" flat>
                <v-avatar tile color="primary" class=" elevation-12">
                    <v-icon dark>face</v-icon>
                </v-avatar>

                <v-toolbar-title class="ml-4 primary--text" >{{$t('message.user.list')}}</v-toolbar-title>

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
					
						<template v-slot:no-data>
							<NoDataList :loading="loading" @initialize="initialize"></NoDataList>
						</template>
					</v-data-table>
				</v-col>
			</v-row>
			<v-btn bottom color="primary" dark fab fixed right @click="dialog = !dialog">
				<v-icon>mdi-plus</v-icon>
			</v-btn>
		</v-container>
		<v-snackbar
			v-model="snackbar"
			:vertical="snackvertical"
			:timeout="snacktimeout"
			:top="snacktop"
			:right="snackright"
			:color="snackcolor"
		>
			{{ snacktext }}
			<v-btn color="white" text @click="snackbar = false">Close</v-btn>
		</v-snackbar>
	</v-content>
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
		items: [
        {
          text: 'Dashboard',
          disabled: false,
          href: 'breadcrumbs_dashboard',
        },
        {
          text: 'Link 1',
          disabled: false,
          href: 'breadcrumbs_link_1',
        },
        {
          text: 'Link 2',
          disabled: true,
          href: 'breadcrumbs_link_2',
        },
      ],
		userType: [],
		headers: [
		    { text: "ID", align: "left", value: "id" },
			{text: "A", value: "arta"},
			{ text: "B", value: "artb" },
			{ text: "C", value: "artc" },
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
      status: 1,
      company_name: "",
			company_contact: "",
			city: "",
			postcode: "",
		},
		defaultItem: {
			name: "",
			email: "",
			type: "",
			contact: "",
			address: "",
      status: 1,
       company_name: "",
			company_contact: "",
			city: "",
			postcode: "",
		},
		dataStatus: [
			{ name: "Active", value: 1 },
			{ name: "Disable", value: 0 }
		],
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
          url: "/app/articulate"
        });
        this.dataList = data;
      } catch (e) {}
    },
    editItem(item) {
      this.edit = false;
      this.editedIndex = this.dataList.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    deleteItem(item) {
    	this.dataIndex = this.dataList.indexOf(item);
			this.deleteTitle = "Are you sure you want to delete this item?";
			this.isDelete = !this.isDelete;
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