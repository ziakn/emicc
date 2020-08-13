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

                <v-toolbar-title class="ml-4 primary--text" >{{$t('message.mentor.list')}}</v-toolbar-title>
            </v-toolbar>
			<Breadcrumbs/>
			<v-row justify="center">
			
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
		
		userType: [],
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
          url: "/app/user"
        });
        this.dataList = data;
      } catch (e) {}
 
    },
    
  

  }
};
</script>