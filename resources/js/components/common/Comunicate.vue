<template>
    	 <v-dialog v-model="dialog1" persistent max-width="30%">
			<v-card>
				<v-card-title class="headline">{{articulateObj.articulateFlag }} | {{articulateObj.articulate}}</v-card-title>
				<v-card-text>
                    <v-text-field
                    v-model="articulateObj.artData"
                     filled
                    >
                    </v-text-field>
                    <v-textarea
                      v-model="articulateObj.articulateData"
                      filled
                      disabled
                    >
                    </v-textarea>
                </v-card-text>
				<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="green darken-1" text @click="dialog1 = false">close</v-btn>
				<v-btn color="green darken-1" text @click="sendBackData">Edit </v-btn>
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
        articulateObj: Object,
    },
    methods:
    {
        sendBackData()
        {
            this.$emit('send', this.articulateObj)
            this.dialog1=false
            this.articulateObj.artData=''
        }

    },
    watch:{
        trigger() {
            this.dialog1=true
            }


    }

}
</script>