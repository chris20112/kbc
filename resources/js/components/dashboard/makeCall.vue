<template>
    <div>
        Make Call:
    <v-btn @click="makeCall">Call:</v-btn>
    </div>
</template>

<script>
    import Axios from "axios";

    export default {
        name: "makeCall",
        props: ['selected'],
        methods: {
            makeCall() {
                let data = { numberToCall: this.selected.contact.phone_1, numberFrom: '5714103765' }
                Axios.post('http://kbc.test/api/makeCall', data)
                    .then(res => this.fromTwilio = res.data)
                    .catch(err => console.log(err))
                this.$emit('fromTwilio', this.fromTwilio)
            }
        }
    }
</script>

<style scoped>

</style>
