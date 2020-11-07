<template>
    <v-main>
        <v-container fluid>
            <v-row justify="center">
                <v-col sm="12" md="12" lg="12">
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
                            <v-card class="mt-5">
                                <v-card-title>
                                    <v-row>
                                        <v-col>
                                            <v-icon large left color="blue">
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
                                                <template
                                                    v-slot:activator="{
                                                        on,
                                                        attrs
                                                    }"
                                                >
                                                    <v-text-field
                                                        v-model="editedItem.date"
                                                        label="Select Date"
                                                        prepend-icon="event"
                                                        readonly
                                                        v-bind="attrs"
                                                        v-on="on"
                                                        required
                                                    ></v-text-field>
                                                </template>
                                                <v-date-picker
                                                    v-model="editedItem.date"
                                                    @input="menu2 = false"
                                                ></v-date-picker>
                                            </v-menu>
                                        </v-col>
                                    </v-row>
                                </v-card-title>
                                <v-card-text>
                                    <v-row justify="center">
                                        <v-col sm="12" md="12" lg="8">
                                            <v-textarea
                                                v-model="editedItem.arta"
                                                label="A"
                                                filled
                                            ></v-textarea>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-textarea
                                                v-model="editedItem.artb"
                                                label="B"
                                                filled
                                            ></v-textarea>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
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
                            <v-card class="mt-5">
                                <v-row>
                                    <v-col>
                                        <v-card-title>
                                            <v-icon large left color="blue">
                                                dashboard
                                            </v-icon>
                                            <span
                                                class="title font-weight-light"
                                                >Comunicate</span
                                            >
                                        </v-card-title>
                                    </v-col>
                                    
                                </v-row>
                                <v-card-text>
                                      <v-row justify="center">
                                        <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.arta1"
                                                label="A1"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.arta1status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                        <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.arta,'A1', 'A',editedItem.arta1)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                       
                                         <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.arta2"
                                                label="A2"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.arta2status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                        <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.arta,'A2', 'A',editedItem.arta2)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.arta3"
                                                label="A3"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.arta3status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                        <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.arta,'A3', 'A',editedItem.arta3)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.artb1"
                                                label="B1"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.artb1status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                        <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artb,'B1', 'B',editedItem.artb1)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.artb2"
                                                label="B2"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.artb2status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artb,'B2', 'B',editedItem.artb2)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.artb3"
                                                label="B3"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.artb3status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artb,'B3', 'B',editedItem.artb3)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.artc1"
                                                label="C1"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.artc1status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artc,'C1', 'C',editedItem.artc1)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                       <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.artc2"
                                                label="C2"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.artc2status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artc,'C2', 'C',editedItem.artc2)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="6">
                                            <v-text-field
                                                v-model="editedItem.artc3"
                                                label="C3"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="6" md="2">
                                        <v-select
                                            v-model="editedItem.artc3status"
                                            label="Importance level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artc,'C3', 'C',editedItem.artc3)"
                                                dark
                                                >Edit</v-btn
                                            >
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                            </v-card>
                              <v-btn 
                                        bottom
                                        color="success"
                                        dark
                                        fab
                                        fixed
                                        large
                                        right
                                        @click="addData"
                                    >
                                        <v-icon>check</v-icon>
                                    </v-btn>
                        </v-tab-item>
                        <v-tab-item value="tab-3">
                            <v-card class="mt-5">
                                <v-card-title>
                                    <v-icon large left color="blue">
                                        dashboard
                                    </v-icon>
                                    <span class="title font-weight-light"
                                        >Take Action</span
                                    >
                                    
                                </v-card-title>
                                <v-card-text>
                                    <v-row justify="center">
                                    <v-col cols="12" sm="12" md="12">
                                        <v-switch v-model="editedItem.notification" color="primary" inset  label="Notification"></v-switch>
                                    </v-col>
                                        <v-col cols="12" sm="12" md="12">
                                        <v-select
                                            v-model="editedItem.actionstatus"
                                            label="Status"
                                            :items="statusAction"
                                            item-text="name"
                                            item-value="value"
                                            filled
                                        ></v-select>
                                    </v-col>
                                         <v-col cols="12" sm="12" md="12">
                                             
                                        <v-select
                                            v-model="editedItem.ringtone"
                                            label="Ring Tone"
                                            :items="ringtoneTask"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                   
                                      <v-col cols="12" sm="12" md="12">
                                            <v-switch v-model="editedItem.notification_frequency" color="primary" inset  label="Repeat Notification"></v-switch>
                                      </v-col>
                                                    
                                    <v-col cols="12" sm="12" md="12">
                                        <v-select
                                            v-model="editedItem.repeattask"
                                            label="Reapeted Task"
                                            :items="repeatTask"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="12" v-if="editedItem.repeattask=='Weekly'">
                                        <v-select
                                            v-model="editedItem.repeat_flag"
                                            label="Reapeted Task"
                                            :items="weeklyTask"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                     <v-col cols="12" sm="12" md="12" v-if="editedItem.repeattask=='Monthly'">
                                        <v-select
                                            v-model="editedItem.repeat_flag"
                                            label="Reapeted Task"
                                            :items="monthlyTask"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="12">
                                            <v-menu
                                                ref="menu"
                                                v-model="menu1"
                                                :close-on-content-click="false"
                                                :nudge-right="40"
                                                :return-value.sync="editedItem.time"
                                                transition="scale-transition"
                                                offset-y
                                                max-width="300px"
                                                min-width="300px"
                                            >
                                                <template v-slot:activator="{ on, attrs }">
                                                <v-text-field
                                                    v-model="editedItem.time"
                                                    label="Time"
                                                    prepend-icon="mdi-clock-time-four-outline"
                                                    readonly
                                                    v-bind="attrs"
                                                    v-on="on"
                                                ></v-text-field>
                                                </template>
                                                <v-time-picker
                                                v-if="menu1"
                                                v-model="editedItem.time"
                                                full-width
                                                @click:minute="$refs.menu.save(editedItem.time)"
                                                ></v-time-picker>
                                            </v-menu>
                                        </v-col>
                                        
                                        <!-- <v-col sm="12" md="12" lg="4">
                                            <v-textarea
                                                v-model="editedItem.saturday"
                                                label="Saturday"
                                                filled
                                            ></v-textarea>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="4">
                                            <v-textarea
                                                v-model="editedItem.sunday"
                                                label="Sunday"
                                                filled
                                            ></v-textarea>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="4">
                                            <v-textarea
                                                v-model="editedItem.monday"
                                                label="Monday"
                                                filled
                                            ></v-textarea>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="4">
                                            <v-textarea
                                                v-model="editedItem.tuesday"
                                                label="Tuesday"
                                                filled
                                            ></v-textarea>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="4">
                                            <v-textarea
                                                v-model="editedItem.wednesday"
                                                label="Wednesday"
                                                filled
                                            ></v-textarea>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="4">
                                            <v-textarea
                                                v-model="editedItem.thursaday"
                                                label="Thursady"
                                                filled
                                            ></v-textarea>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="4">
                                            <v-textarea
                                                v-model="editedItem.friday"
                                                label="Friday"
                                                filled
                                            ></v-textarea>
                                        </v-col> -->
                                    </v-row>
                                     <v-btn
                                        bottom
                                        color="success"
                                        dark
                                        fab
                                        fixed
                                        large
                                        right
                                        @click="addData"
                                    >
                                        <v-icon>check</v-icon>
                                    </v-btn>
                                </v-card-text>

                            </v-card>
                        </v-tab-item>
                    </v-tabs-items>
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
			<v-btn color="white" text right @click="snackbar = false">Close</v-btn>
		</v-snackbar>
        <Comunicate
            :trigger="dialog1"
			:articulateObj="articulateObj"
            @send="getarticulateObj"
        ></Comunicate>
    </v-main>
</template>

<script>
import Comunicate from "./../../common/Comunicate";
export default {
    components: {
        Comunicate
    },
    data: () => ({
        date: new Date().toISOString().substr(0, 10),
        menu2: false,
        menu1: false,
        loading: false,
        picker: null,
        mode: "",
        timeout: 6000,
        snackbar: false,
        tab: null,
        edit: true,
        dialog: false,
		dialog1: false,
        editedItem: {
            arta: "",
            artb: "",
            artc: "",
            date: "",
            status: "",
            arta1: "",
            arta2: "",
            arta3: "",
            artb1: "",
            artb2: "",
            artb3: "",
            artc1: "",
            artc2: "",
            artc3: "",
            repeattask:'',
            time:'',
            arta1status: 1,
            arta2status: 1,
            arta3status: 1,
            artb1status: 1,
            artb2status: 1,
            artb3status: 1,
            artc1status: 1,
            artc2status: 1,
            artc3status: 1,
            repeat_flag:'',
            ringtone:'',
            actionstatus:'',
            notification_frequency:'',
            notification:'',
            
            

            

        },
        articulateObj:
        {
            articulateData:null,
            articulate:null,
            articulateFlag:null,
            artData:null,
        },
        statusType: [
            { name: "Low", value: 0 },
            { name: "Medium", value: 1 },
            { name: "High", value: 2 },
            { name: "Very High", value: 3 }
        ],
         statusAction: [
            { name: "Low", value: 0 },
            { name: "Medium", value: 1 },
            { name: "High", value: 2 },
            { name: "Very High", value: 3 }
        ],
        repeatTask: [
            { name: "Daily", value: 'Daily' },
            { name: "Weekly", value: 'Weekly' },
            { name: "Monthly", value: 'Monthly' },
        ],
         ringtoneTask: [
            { name: "ring1", value: 'ring1' },
            { name: "ring2", value: 'ring2' },
        ],
        weeklyTask: [
            { name: "Saturday", value: 'Saturday' },
            { name: "Sunday", value: 'Sunday' },
            { name: "Monday", value: 'Monday' },
            { name: "Tuesday", value: 'Tuesday' },
            { name: "Wednesday", value: 'Wednesday' },
            { name: "Thursday", value: 'Thursday' },
            { name: "Friday", value: 'Friday' },
        ],
         monthlyTask: [
            { name: "January", value: 'January' },
            { name: "February", value: 'February' },
            { name: "March", value: 'March' },
            { name: "April", value: 'April' },
            { name: "May", value: 'May' },
            { name: "June", value: 'June' },
            { name: "July", value: 'July' },
            { name: "August", value: 'August' },
            { name: "September", value: 'September' },
            { name: "October", value: 'October' },
            { name: "November", value: 'November' },
            { name: "December", value: 'December' },
        ],
    }),

    computed: {},
    watch: {},

    created() 
    {
        this.initialize();
    },



    methods: 
    {

        async initialize()
        {
            if(this.$route.params.id)
            {
                console.log(this.$route.params.id)
                 try 
                {
                    let { data } = await axios({
                        method: "get",
                        url: "/app/articulate/"+this.$route.params.id,
                    });
                        this.editedItem.arta= data.arta
                        this.editedItem.artb= data.artb
                        this.editedItem.artc= data.artc
                        this.editedItem.date= data.date
                        this.editedItem.arta1= data.comunicate.arta1
                        this.editedItem.arta2= data.comunicate.arta2
                        this.editedItem.arta3= data.comunicate.arta3
                        this.editedItem.artb1= data.comunicate.artb1
                        this.editedItem.artb2= data.comunicate.artb2
                        this.editedItem.artb3= data.comunicate.artb3
                        this.editedItem.artc1= data.comunicate.artc1
                        this.editedItem.artc2= data.comunicate.artc2
                        this.editedItem.artc3= data.comunicate.artc3

                        this.editedItem.arta1status= data.comunicate.arta1status
                        this.editedItem.arta2status= data.comunicate.arta2status
                        this.editedItem.arta3status= data.comunicate.arta3status
                        this.editedItem.artb1status= data.comunicate.artb1status
                        this.editedItem.artb2status= data.comunicate.artb2status
                        this.editedItem.artb3status= data.comunicate.artb3status
                        this.editedItem.artc1status= data.comunicate.artc1status
                        this.editedItem.artc2status= data.comunicate.artc2status
                        this.editedItem.artc3status= data.comunicate.artc3status
                        
                     
                        this.editedItem.repeattask= data.takecation.repeattask
                        this.editedItem.time= data.takecation.time

                        this.editedItem.repeat_flag= data.takecation.repeat_flag
                        this.editedItem.ringtone= data.takecation.ringtone
                        this.editedItem.actionstatus= data.takecation.actionstatus
                        this.editedItem.notification_frequency= data.takecation.notification_frequency
                        this.editedItem.notification= data.takecation.notification
                        // this.editedItem.time= data.takecation.time
                        // console.log(data);
                } 
                catch (e) 
                {
                    this.snacks("Failed", "Red");
                }
            }
        },

        editItem(item) {
            this.edit = false;
            this.editedIndex = this.dataList.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

		openModel(param1, param2, param3) 
		{
			this.articulateObj.articulateData=param1
			this.articulateObj.articulate=param2,
			this.articulateObj.articulateFlag=param3
            this.dialog1 = !this.dialog1;
        },

        getarticulateObj(item)
        {
            if(item.articulate=="A1" && item.articulateFlag =="A")
            {
                this.editedItem.arta1 = item.artData
            }
            if(item.articulate=="A2" && item.articulateFlag =="A")
            {
                this.editedItem.arta2 = item.artData
            }
            if(item.articulate=="A3" && item.articulateFlag =="A")
            {
                this.editedItem.arta3 = item.artData
            }
            if(item.articulate=="B1" && item.articulateFlag =="B")
            {
                this.editedItem.artb1 = item.artData
            }
            if(item.articulate=="B2" && item.articulateFlag =="B")
            {
                this.editedItem.artb2 = item.artData
            }
            if(item.articulate=="B3" && item.articulateFlag =="B")
            {
                this.editedItem.artb3 = item.artData
            }
            if(item.articulate=="C1" && item.articulateFlag =="C")
            {
               this.editedItem.artc1 = item.artData
            }
            if(item.articulate=="C2" && item.articulateFlag =="C")
            {
                this.editedItem.artc2 = item.artData
            }
            if(item.articulate=="C3" && item.articulateFlag =="C")
            {
                this.editedItem.artc3 = item.artData
            }
        },

        async addData() 
        {
            if(this.editedItem.date == '')
            {
                 this.snacks("Select date", "warning");
                 return
            }
            if(this.$route.params.id)
            {
                try 
                {
                    let { data } = await axios({
                        method: "put",
                        url: "/app/articulate/"+ this.$route.params.id,
                        data: this.editedItem
                    });
                    if(data.status)
                    {
                        this.snacks("Successfully Done", "green");
                    }
                    else
                    {
                        this.snacks("Failed", "red");
                    }                
                } 
                catch (e) 
                {
                    this.snacks("Failed", "Red");
                }
            }
            else
            {
                try 
                {
                    let { data } = await axios({
                        method: "post",
                        url: "/app/articulate",
                        data: this.editedItem
                    });
                    if(data.status)
                    {
                        this.snacks("Successfully Done", "green");
                    }
                    else
                    {
                        this.snacks("Failed", "red");
                    }                
                } 
                catch (e) 
                {
                    this.snacks("Failed", "Red");
                }
            }
            
        }
    }
};
</script>
