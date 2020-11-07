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
						<template v-slot:item.action="{ item }">
							<v-icon small @click="editItem(item)">edit</v-icon>
							<v-icon small @click="deleteItem(item)">delete</v-icon>
						</template>
						<template v-slot:no-data>
							<NoDataList :loading="loading" @initialize="initialize"></NoDataList>
						</template>
					</v-data-table>
				</v-col>
			</v-row>
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
		<DeleteModal :trigger="isDelete" :title="deleteTitle" :body="deleteBody" @request="remove"></DeleteModal>
	</v-main>
</template>

<script>
import Breadcrumbs from "./../../common/Breadcrumbs"
import NoDataList from "./../../common/NoDataList"
import DeleteModal from "./../../common/DeleteModal";
export default {
	components:{
		Breadcrumbs,
		NoDataList,
		DeleteModal,
	},
	data: () => ({
		search: "",
		absolute: true,
		loading: false,
		dataIndex: null,
		deleteTitle: "",
		deleteBody: "",
        isDelete: false,
		edit: true,
		dialog: false,
		dataList: [],
		userType: [],
		headers: 
		[
		    { text: "ID", align: "left", value: "id" },
			{text: "A", value: "arta"},
			{ text: "B", value: "artb" },
			{ text: "C", value: "artc" },
			{ text: "Date", value: "date" },
			{ text: "Action", value: "action" }
		],
		
	}),

props: {
    source: String
  },
  computed: 
  {
	formTitle() 
	{
        return this.editedIndex === -1 ? "New Item" : "Edit Item";
    }
  },
  watch: {},
  
  created() 
  {
    this.initialize();
  },

  methods: 
  {

	async initialize() 
	{
	  try 
	  {
        let { data } = await axios({
          method: "get",
          url: "/app/articulate"
        });
        this.dataList = data;
	  } 
	  catch (e) 
	  {

	  }
	},
	
	editItem(item) 
	{
		 this.$router.push('/useract/useractadd/'+item.id);
    },
	deleteItem(item) 
	{
    	this.dataIndex = this.dataList.indexOf(item);
		this.deleteTitle = "Are you sure you want to delete this item?";
		this.isDelete = !this.isDelete;
    },
    
 
	async remove() 
		{
			try 
			{
				let { data } = await axios({
					method: "delete",
					url: "/app/articulate/" + this.dataList[this.dataIndex].id
				});
				if (data.status) 
				{
					this.snacks('Successfully Done','green')
					this.dataList.splice(this.dataIndex, 1);
					this.close();				
				}
				else
				{
					this.snacks(data.data,'red')
					this.loading = false;
				}

			} catch (e) 
			{
				this.snacks('Operation Failed','red')
				this.loading = false;
			}
		}
  }
};
</script>