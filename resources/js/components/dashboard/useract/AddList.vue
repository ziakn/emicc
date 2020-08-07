<template>
    <v-content>
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
                                            <span
                                                class="title font-weight-light"
                                                >Article</span
                                            >
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
                                                        label="Picker without buttons"
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
                                    <v-col cols="12" sm="6" md="4">
                                        <v-select
                                            v-model="editedItem.status"
                                            label="Select level"
                                            :items="statusType"
                                            item-text="name"
                                            item-value="value"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                                <v-card-text>
                                    <v-row justify="center">
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.arta1"
                                                label="A1"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.arta,'A1', 'A')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.arta2"
                                                label="A2"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.arta,'A2', 'A')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.arta3"
                                                label="A3"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.arta,'A3', 'A')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.artb1"
                                                label="B1"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                        <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artb,'B1', 'B')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.artb2"
                                                label="B2"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artb,'B2', 'B')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.artb3"
                                                label="B3"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artb,'B3', 'B')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.artc1"
                                                label="C1"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artc,'C1', 'C')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.artc2"
                                                label="C2"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artc,'C2', 'C')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                        <v-col sm="12" md="12" lg="8">
                                            <v-text-field
                                                v-model="editedItem.artc3"
                                                label="C3"
                                                filled
                                            ></v-text-field>
                                        </v-col>
                                           <v-col sm="12" md="12" lg="2">
                                            <v-btn
                                                color="primary"
                                                small
                                                @click="openModel(editedItem.artc,'C3', 'C')"
                                                dark
                                                >Open Dialog</v-btn
                                            >
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                            </v-card>
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
                                        <v-col sm="12" md="12" lg="4">
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
                                        </v-col>
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
    </v-content>
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
        loading: false,
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
            arta1: "",
            status: "",
            arta2: "",
            arta3: "",
            artb1: "",
            artb2: "",
            artb3: "",
            artc1: "",
            artc2: "",
            artc3: "",
            saturday: "",
            sunday: "",
            monday: "",
            tuesday: "",
            wednesday: "",
            thursday: "",
            friday: ""
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
            { name: "High", value: 2 }
        ]
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
                editedItem.arta1 = item.artData
            }
            if(item.articulate=="A2" && item.articulateFlag =="A")
            {
                editedItem.arta2 = item.artData
            }
            if(item.articulate=="A3" && item.articulateFlag =="A")
            {
                editedItem.arta3 = item.artData
            }
            if(item.articulate=="B1" && item.articulateFlag =="B")
            {
                editedItem.artb1 = item.artData
            }
            if(item.articulate=="B2" && item.articulateFlag =="B")
            {
                editedItem.artb2 = item.artData
            }
            if(item.articulate=="B3" && item.articulateFlag =="B")
            {
                editedItem.artb3 = item.artData
            }
            if(item.articulate=="C1" && item.articulateFlag =="C")
            {
                editedItem.artc1 = item.artData
            }
            if(item.articulate=="C2" && item.articulateFlag =="C")
            {
                editedItem.artc2 = item.artData
            }
            if(item.articulate=="C3" && item.articulateFlag =="C")
            {
                editedItem.artc3 = item.artData
            }
        },

        async addData() 
        {
            if(this.editedItem.date == '')
            {
                 this.snacks("Select date", "warning");
                 return
            }
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
                    this.snacks("Data Once Used", "red");
                }                
            } 
            catch (e) 
            {
                this.snacks("Failed", "Red");
            }
        }
    }
};
</script>
