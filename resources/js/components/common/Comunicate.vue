<template>
    	 <v-dialog v-model="dialog1" persistent max-width="30%">
			<v-card>
				<v-card-title class="headline">{{articulateFlag }} | {{articulate}}</v-card-title>
				<v-card-text>
                    <v-text-field
                    v-model="artData"
                     filled
                    >
                    </v-text-field>
                    <v-textarea
                      v-model="articulateData"
                      filled
                      disabled
                    >
                    </v-textarea>
                </v-card-text>
				<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="green darken-1" text @click="dialog1 = false">Disagree</v-btn>
				<v-btn color="green darken-1" text @click="dialog1 = false">Agree</v-btn>
				</v-card-actions>
			</v-card>
			</v-dialog>
</template>
<script>
export default {
    data: () => ({
    
        dialog1:false,
        artData:null,
    }),
    props:
    {
        trigger: false,
        articulateData: String,
		articulate: String,
	    articulateFlag: String
    },
    methods:
    {
        deleteData()
        {
            this.$emit('request')
            this.dialog1=false
        }

    },
    watch:{
        trigger() {
            this.dialog1=true
            }


    }

}
</script>