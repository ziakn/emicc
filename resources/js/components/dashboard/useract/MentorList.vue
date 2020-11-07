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

                <v-toolbar-title class="ml-4 primary--text" >{{$t('message.mentor.list')}}</v-toolbar-title>
				
            </v-toolbar>
			<Breadcrumbs/>
			<v-row justify="center">
			<v-col>
				<v-select
				v-model="editedItem.mentor_id"
				:items="dataList"
				item-text="name"
                item-value="id"
                label="Mentors"
                required
                filled
				>
				</v-select>
			</v-col>
			</v-row>
			<v-row justify="center">
				<v-col sm="4" md="4" lg="4">
					
				</v-col>
				<v-col sm="4" md="4" lg="4">
					
				</v-col>
				<v-col sm="4" md="4" lg="4">
					<v-row>
						<v-col sm="6" md="6" lg="6"></v-col>
					<v-col sm="6" md="6" lg="6">

					 <v-btn right dark color="primary" text @click="save" >Save</v-btn>
					</v-col>
					</v-row>
					
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
export default {
	components:{
		Breadcrumbs,
	},
	data: () => ({
		search: "",
		absolute: true,
		loading: false,
		edit: true,
		dialog: false,
		dataList: [],
		dataBreadcrumbs:[],
		flag:'',
		userType: [],
		editedItem: {
			mentor_id: "",
		},
		defaultItem: {
			mentor_id: "",
		},
		
	}),

props: {
    source: String
  },
  computed: {
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
          url: "/app/getmentor"
        });
        this.dataList = data;
      } catch (e) {}

	  try {
        let { data } = await axios({
          method: "get",
          url: "/app/getmentoruser"
        });
		this.editedItem.mentor_id = data.mentor_id;
		this.flag=data.mentor_id;
      } catch (e) {}
 
	

	},
	async save()
	{
		if(this.flag )
		{
				 try {
						let { data } = await axios({
						method: "put",
						url: "/app/mentoruser/"+ this.editedItem.mentor_id,
						data :this.editedItem
						});
						  this.snacks('Successfully Done','green')
     					 } catch (e) {}
		}
		else
		{
			 try {
						let { data } = await axios({
						method: "post",
						url: "/app/mentoruser",
						data :this.editedItem
						});
						  this.snacks('Successfully Done','green')
					} catch (e) {}
		}
		
	}
	

	
	
  

  }
};
</script>