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
									<v-icon large left color="blue" >
										dashboard
									</v-icon>
									<span class="title font-weight-light">Article</span>
								</v-card-title>
								<v-card-text>
									<v-row justify="center">
                                        <v-col sm="12" md="12" lg="8" >
											<v-textarea
												v-model="formValue.category_id"
												:items="dataCategory"
												item-text="name"
												item-value="id"
												label="A"
												
												filled
											></v-textarea>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-textarea
												v-model="formValue.room"
												:items="dataBedRoom"
												item-value="value"
												item-text="name"
												label="B"
												
												filled
											></v-textarea>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-textarea
												v-model="formValue.bathroom"
												:items="dataBathroom"								
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
								<v-card-title> 
									<v-icon large left color="blue" >
										dashboard
									</v-icon>
									<span class="title font-weight-light">Comunicate</span>
								</v-card-title>
								<v-card-text>
									<v-row justify="center">
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
												v-model="formValue.bathroom"
												:items="dataBathroom"								
												label="A1"
												filled
											></v-text-field>
										</v-col>	
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="formValue.parking_space"
													label="A2"
													type="number"						
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="formValue.parking_space"
													label="A3"
													type="number"						
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
												v-model="formValue.bathroom"
												:items="dataBathroom"								
												label="B1"
												filled
											></v-text-field>
										</v-col>	
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="formValue.parking_space"
													label="B2"
													type="number"						
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="formValue.parking_space"
													label="B3"
													type="number"						
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
												v-model="formValue.bathroom"
												:items="dataBathroom"								
												label="C1"
												filled
											></v-text-field>
										</v-col>	
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="formValue.parking_space"
													label="C2"
													type="number"						
													filled
											></v-text-field>
										</v-col>
										<v-col sm="12" md="12" lg="8" >
											<v-text-field
													v-model="formValue.parking_space"
													label="C3"
													type="number"						
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
												v-model="formValue.category_id"
												:items="dataCategory"
												item-text="name"
												item-value="id"
												label="Saturday"
												
												filled
											></v-textarea>
										</v-col>
									 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="formValue.category_id"
												:items="dataCategory"
												item-text="name"
												item-value="id"
												label="Sunday"
												
												filled
											></v-textarea>
										</v-col>
									 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="formValue.category_id"
												:items="dataCategory"
												item-text="name"
												item-value="id"
												label="Monday"
												
												filled
											></v-textarea>
										</v-col>	
										 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="formValue.category_id"
												:items="dataCategory"
												item-text="name"
												item-value="id"
												label="Tuesday"
												
												filled
											></v-textarea>
										</v-col>
									 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="formValue.category_id"
												:items="dataCategory"
												item-text="name"
												item-value="id"
												label="Wednesday"
												
												filled
											></v-textarea>
										</v-col>
									 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="formValue.category_id"
												:items="dataCategory"
												item-text="name"
												item-value="id"
												label="Thursady"
												
												filled
											></v-textarea>
										</v-col>
										 <v-col sm="12" md="12" lg="4" >
											<v-textarea
												v-model="formValue.category_id"
												:items="dataCategory"
												item-text="name"
												item-value="id"
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
		<v-dialog
                v-model="loadingdialog"
                hide-overlay
                persistent
                width="300"
                >
                <v-card
                    color="primary"
                    dark
                >
                    <v-card-text>
                    Please wait data and images is storing...
                    <v-progress-linear
                        indeterminate
                        color="white"
                        class="mb-0"
                    ></v-progress-linear>
                    </v-card-text>
                </v-card>
        </v-dialog>
        <v-snackbar
			v-model="loading"
			:vertical="snackvertical"
			:timeout="snacktimeout"
			:top="snacktop"
			color="red"
			>
			{{ text }}
			<v-btn
				color="white"
				text
				@click="loading = false"
			>
				Close
      		</v-btn>
    	</v-snackbar>
		<v-btn bottom color="success" dark fab fixed large right v-show="accept" @click="addData" >
			<v-icon>check</v-icon>
		</v-btn>
	</v-content>
</template>

<script>

export default {
	components: {
	
		
	},
	data: () => ({
		loadingdialog:false,
		menu2: false,
			loadingselectimage:false,
			loadingdialog:false,
			loading:false,
		   mode: "",
        timeout: 6000,
	  text: "Your Total Images Size is more than 2 Mb Plz Compress or resize...",
	  text1: "Please select image for uploading",
        snackbar: false,
		formValue:
		{
            room:'',
            bathroom:'',
            parking_space:'',
            furnish_type:'',
            rent_type:'',
            service_charges:'',
            payment_type:'',
            availability:'',
			category_id:'',
			title:'',
			description:'',
			price:0,
			meta_keyword:'',
			meta_description:'',
            meta_title:'',
            property_location:'',
            street_name:'',
            street_no:'',
			building_no:'',
			data_percentage:'',
			percentvalue:'',
		},
		
		dataAmenities: [
        ],

		dataBedRoom:[
			{name:'Studio', value:'studio'},
			{name:'1', value:'1'},{name:'2', value:'2'},{name:'3', value:'3'},{name:'4', value:'4'},{name:'5', value:'5'},
			{name:'6', value:'6'},{name:'7', value:'7'},{name:'8', value:'8'},{name:'9', value:'9'},{name:'10', value:'10'},
			{name:'11', value:'11'},{name:'12', value:'12'},{name:'13', value:'13'},{name:'14', value:'14'},{name:'15', value:'15'},
		],
		dataBathroom:[
			1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,20
		],
		dataFurnished:[
			'Furnished', 'Un-Furnished', 'Semi-Furnished'
		],
		dataRentType:[
			'Daily', 'Weekly', 'Monthly','Yearly'
		],
		dataPercentage:[
			'Days', 'Percentage(%)',
		],
		dataCategory:[],
		paymentType:[
			{name:'Cheque', value:'cheque'},
			{name:'Cash', value:'cash'},

		],
		dataAvailability:[
			{name:'Available', value:'available'},
			{name:'Not Available', value:'notavailable'},

		],
			
        absolute: true,
		editedIndex:null,
		tab: null,
		files:[],
		amenities:[],
	
      
		
	}),

	computed: {

		accept()
		{
			if(this.formValue.title && this.formValue.description 
				 && this.formValue.category_id && this.formValue.price && this.formValue.property_location)
            {
			    return true
            }
            else
            {
                return false
            }
			
		},
		
            

	},
	watch: {
		'formValue.title': function (data)
		{
			this.formValue.meta_title=data
		},
		'formValue.description': function (data)
		{
			this.formValue.meta_description=data
		},
	},
	created() {
		this.initialize();
	},
	methods: {	
		seoValue(item)
		{
			this.formValue.meta_description=item.meta_description;
			this.formValue.meta_title=item.meta_title;
			this.formValue.meta_keyword=item.meta_keyword;
		},
		locationValue(item)
		{
			this.formValue.property_location=item.property_location;
			this.formValue.street_name=item.street_name;
			this.formValue.street_no=item.street_no;
			this.formValue.building_no=item.building_no;
		},
		filesValue(item)
		{
			this.files=item;
        },
        
		async initialize() {
			this.start();
			try {
				let { data } = await axios({
					method: "get",
					url: "/app/category"
				});
				this.dataCategory = data;
			} catch (e) {
				this.fail();
			}
			try {
				let { data } = await axios({
					method: "get",
					url: "/app/amenity"
				});
				this.dataAmenities = data;
			} catch (e) {
				this.fail();
			}
			
			
        },
        

		async addData()
		{
		if(this.files.some(file => file.size > 2e6))
			{
				this.loading=true
				 this.totalFiles=[];
					return false
			}
			else{
			 this.loadingdialog=true
			      const formData = new FormData();
					this.amenities.forEach(file => {
						formData.append("amenities[]", JSON.stringify(file));
					});
					this.files.forEach(file => {
						formData.append("media[]", file, file.name);
					});
					for ( var key in this.formValue ) {
						formData.append(key, this.formValue[key]);
					}
			try {
				let { data } = await axios({
					method: "post",
					url: "/app/property",
					data: formData
				});
				this.snacks('Successfully Done','green')
				 this.loadingdialog=false
				this.$router.push('/dashboard/property/list')
			} catch (e) {
				this.fail();
				this.snacks('Failed','Red')
				
			}
			}
		}


	}
};
</script>