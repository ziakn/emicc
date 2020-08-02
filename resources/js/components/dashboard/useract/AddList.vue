<template>
	<v-content>
		<v-container fluid>
			<v-row justify="center">
				<v-col sm="12" md="12" lg="12" >
					<v-tabs
					v-model="tab"
					background-color="primary"
					centered
					dark
					grow
					>
					<v-tabs-slider></v-tabs-slider>
					<v-tab href="#tab-1">
						Article
					</v-tab>
					<v-tab href="#tab-2">
						Comunicate
					</v-tab>
					<v-tab href="#tab-3">
						Take Actions
					</v-tab>
					</v-tabs>
					<v-tabs-items v-model="tab">
						<v-tab-item value="tab-1">
							<v-card  class="mt-5">
								<v-card-title> 
										<v-row>
											<v-col>
												<v-icon large left color="blue" >
													dashboard
												</v-icon>
												<span class="title font-weight-light">Article</span>
											</v-col>
												<v-col cols="12" sm="6" md="4">
												<v-menu
													v-model="menu2"
													:close-on-content-click="false"
													:nudge-right="40"
													transition="scale-transition"
													offset-y
													min-width="290px"
												>
													<template v-slot:activator="{ on, attrs }">
													<v-text-field
														v-model="date"
														label="Picker without buttons"
														prepend-icon="event"
														readonly
														v-bind="attrs"
														v-on="on"
													></v-text-field>
													</template>
													<v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
												</v-menu>
												</v-col>
  										</v-row>
								</v-card-title>
								<v-card-text>
								
									<v-row justify="center">
                                        <v-col sm="12" md="12" lg="8" >
											<v-textarea
												v-model="editedItem.arta"
												label="A"
												filled
											></v-textarea>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-textarea
												v-model="editedItem.artb"
												label="B"
												
												filled
											></v-textarea>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-textarea
												v-model="editedItem.artc"							
												label="C"
												filled
											></v-textarea>
										</v-col>	
									</v-row>
								</v-card-text>
							</v-card>
						</v-tab-item>
						<v-tab-item value="tab-2">
							<v-card  class="mt-5">
								<v-row>
									<v-col>
										<v-card-title> 
									<v-icon large left color="blue" >
										dashboard
									</v-icon>
									<span class="title font-weight-light">Comunicate</span>
									
								</v-card-title>
									</v-col>
										<v-col cols="12" sm="6" md="4">
													<v-select
														v-model="editedItem.status"
														label="Select level"
														:items="statusType"
													></v-select>
												</v-col>
								
								</v-row>
								<v-card-text>
									<v-row justify="center">
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
												v-model="editedItem.arta1"					
												label="A1"
												filled
											></v-text-field>
										</v-col>	
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="editedItem.arta2"
													label="A2"				
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="editedItem.arta3"
													label="A3"					
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
												v-model="editedItem.artb1"								
												label="B1"
												filled
											></v-text-field>
										</v-col>	
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="editedItem.artb2"
													label="B2"					
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="editedItem.artb3"
													label="B3"					
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
												v-model="editedItem.artc1"							
												label="C1"
												filled
											></v-text-field>
										</v-col>	
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="editedItem.artc2"
													label="C2"				
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="editedItem.artc3"
													label="C3"					
													filled
											></v-text-field>
										</v-col>
									</v-row>
								</v-card-text>
							</v-card>
						</v-tab-item>
						<v-tab-item value="tab-3">
							<v-card  class="mt-5">
								<v-card-title> 
									<v-icon large left color="blue" >
										dashboard
									</v-icon>
									<span class="title font-weight-light">Take Action</span>
								</v-card-title>
								<v-card-text>
									<v-row justify="center">
                                        <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="editedItem.saturday"
												label="Saturday"
												filled
											></v-textarea>
										</v-col>
									 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="editedItem.sunday"
												label="Sunday"
												filled
											></v-textarea>
										</v-col>
									 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="editedItem.monday"
												label="Monday"
												filled
											></v-textarea>
										</v-col>	
										 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="editedItem.tuesday"
												label="Tuesday"
												filled
											></v-textarea>
										</v-col>
									 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="editedItem.wednesday"
												label="Wednesday"
												filled
											></v-textarea>
										</v-col>
									 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="editedItem.thursaday"
												label="Thursady"
												filled
											></v-textarea>
										</v-col>
										 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="editedItem.friday"
												label="Friday"
												filled
											></v-textarea>
										</v-col>
									</v-row>
								</v-card-text>
							</v-card>
						</v-tab-item>
					</v-tabs-items>
				</v-col>
			</v-row>
		</v-container>
        <v-snackbar
			v-model="loading"
			:vertical="snackvertical"
			:timeout="snacktimeout"
			:top="snacktop"
			color="red"
			>
			<v-btn
				color="white"
				text
				@click="loading = false"
			>
				Close
      		</v-btn>
    	</v-snackbar>
		<v-btn bottom color="success" dark fab fixed large right  @click="addData" >
			<v-icon>check</v-icon>
		</v-btn>
	</v-content>
</template>

<script>

export default {
	components: {
	
		
	},
	data: () => ({
		 date: new Date().toISOString().substr(0, 10),
     	 menu2: false,
		loadingdialog:false,
		menu2: false,
		loading:false,
		mode: "",
        timeout: 6000,
		snackbar: false,
		tab:null,
			edit: true,
			dialog: false,
		editedItem:
		{
            arta:'',
            artb:'',
			artc:'',
			date:'',
			arta1:'',
			status:'',
            arta2:'',
            arta3:'',
            artb1:'',
            artb2:'',
			artb3:'',
			artc1:'',
			artc2:'',
			artc3:'',
			saturday:'',
			sunday:'',
			monday:'',
			tuesday:'',
			wednesday:'',
			thursday:'',
			friday:'',
		},
		
		
		statusType:[
			{name:'Low', value:0},
			{name:'Medium', value:1},
			{name:'High', value:2},

		],
      
	}),

	computed: {
	},
	watch: {
		
	},
	created() {
		this.initialize();
	},
	methods: {	
		
		async initialize() {
		
        },
        
		editItem(item) 
		{
			this.edit = false;
			this.editedIndex = this.dataList.indexOf(item);
			this.editedItem = Object.assign({}, item);
			this.dialog = true;
		},
		
		async addData()
		{

			try 
			{
				let { data } = await axios({
					method: "post",
					url: "/app/articulate",
					data: this.editedItem
				});
				this.snacks('Successfully Done','green')
			}catch (e) 
			{
				this.snacks('Failed','Red')
				
			}
		}


	}
};
</script>