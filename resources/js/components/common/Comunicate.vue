<template>
    	 <v-dialog v-model="dialog1" persistent max-width="500">
			<v-card>
				<v-card-title class="headline">Use Google's location service?</v-card-title>
				<v-card-text>Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.</v-card-text>
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
        dialog1:false
    }),
    props:
    {
        trigger: false,
        title: '',
        body: '',

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