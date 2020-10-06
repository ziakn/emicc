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
				  	<v-col cols="4">
				 <v-select
                                v-model="filters.user_id"
                                :items="dataUser"
                                item-text="name"
                                item-value="id"
                                label="Users"
                                filled
								@change="getUser"
                    ></v-select> 
				  </v-col> 
				    <v-col cols="4">  
                <v-text-field
                    v-model="filters.name"
                    append-icon="search"
                    label="Search"
                    hide-details
                    outlined
                    dense
                ></v-text-field>
				  </v-col> 
            </v-toolbar>
			<Breadcrumbs/>
		 
			<v-row justify="center">
				<v-col sm="12" md="12" lg="12">
					<v-data-table color="white" :headers="headers" :items="dataList" :search="search" class="elevation-4">
                        <template v-slot:item.name="{ item }">
							{{item.user.name}}
						</template>
                        <template v-slot:item.mentor="{ item }">
							<p v-if="item.user.mentoruser">{{item.user.mentoruser.mentor.name}}</p>
                            <p v-else>self</p>
						</template>
						<template v-slot:item.action="{ item }">
							<v-icon small @click="editItem(item)">edit</v-icon>
						</template>
						<template v-slot:no-data>
							<NoDataList :loading="loading" @initialize="initialize"></NoDataList>
						</template>
					</v-data-table>
					 <div class="text-center">
                                <v-pagination
                                v-model="filters.page"
                                :length="pageCount"
                                @input="getUser"
                                ></v-pagination>
                            </div>
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
	</v-main>
</template>

<script>
import Breadcrumbs from "./../../common/Breadcrumbs"
import NoDataList from "./../../common/NoDataList"
export default {
	components:{
		Breadcrumbs,
		NoDataList,
	},
	data: () => ({
		search: "",
		absolute: true,
		loading: false,
		itemsPerPage:1,
        pageCount:2,
		dataIndex: null,
		deleteTitle: "",
		deleteBody: "",
        isDelete: false,
		edit: true,
		dialog: false,
		dataList: [],
		dataUser: [],
		headers: 
		[
		    {text: "ID", align: "left", value: "id" },
            {text: "A", value: "arta"},
            {text: "B", value: "artb"},
            {text: "C", value: "artc"},
            {text: "User", value: "name"},
            {text: "Mentor", value: "mentor"},
			{text: "Action", value: "action" },
		],
		 filters:
        {
			page:1,
			user_id:'',
			name:'',

        },
    
		
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
 watch: 
		{
			'filters.name'(after, before) 
				{	
					this.getUser();
				}
    	},

  created() 
  {
    this.initialize();
  },

  methods: 
  {

	async initialize() 
	{
		 this.getUser();
		  this.getUserFilter();
	 
	},

async getUserFilter()
    {
		 try 
		 {
        let { data } = await axios({
          method: "get",
          url: "/app/getuserfilter",
        });
         this.dataUser = data;
      } catch (e) {}
    },
	async getUser()
	{	
		 try 
	  {
        let { data } = await axios({
          method: "post",
		  url: "/app/getusermentor",
		   params: this.filters,
        });
        this.dataList = data.data;
                this.itemsPerPage=data.per_page;
                this.pageCount=data.last_page;
				this.filters.page=data.current_page
	  } 
	  catch (e) 
	  {

	  }

	},
	
	editItem(item) 
	{
		 this.$router.push('/enroll/useractdetail/'+item.id);
    },

    
 

  }
};
</script>