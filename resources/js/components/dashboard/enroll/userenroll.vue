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
	</v-content>
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
		    {text: "ID", align: "left", value: "id" },
            {text: "A", value: "arta"},
            {text: "B", value: "artbb"},
            {text: "C", value: "artcc"},
            {text: "User", value: "name"},
            {text: "Mentor", value: "mentor"},
			{text: "Action", value: "action" },
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
          url: "/app/getusermentor"
        });
        this.dataList = data;
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