<template>
    <v-form @submit="onSubmit" @reset="onReset" v-if="show">
                    Send To: {{ this.selected.contact.phone_1 }}
                    <v-textarea id="message" v-model="form.message" size="sm">
                    </v-textarea>
                    <v-btn type="submit" size="sm">Send</v-btn>
                    <v-btn type="reset" variant="danger" size="sm">Reset</v-btn>

    </v-form>
</template>

<script>
    import Axios from "axios";

    export default {
        name: "communicate",
        props: ['selected'],
        fromTwilio: '',
        data() {
            return {
                form: {
                    message: ''
                },
                show: true

            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                /*let config = {
                    headers: {'content-type': 'application/json'},
                    params: {
                        sendTo: this.form.sendTo,
                        message: this.form.message
                    }
                }*/
                let data = { sendTo: this.selected.contact.phone_1, message: this.form.message }
                Axios.post('http://kbc.test/api/sendText', data)
                    .then(res => this.fromTwilio = res.data)
                    .catch(err => console.log(err))
                this.$emit('fromTwilio', this.fromTwilio)
            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.sendTo = ''
                this.form.message = ''
                // Trick to reset/clear native browser form validation state
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            }
        }
    }
</script>
