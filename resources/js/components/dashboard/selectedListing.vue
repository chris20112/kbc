<template>
    <div v-if="this.selected">
            <v-card min-height="550">
                <h6>Contact Info:</h6>
                <v-simple-table dense class="elevation-1">
                <tbody>
                <tr>
                    <td colspan="2">First Name:</td>
                    <td>Last Name:</td>
                </tr>
                <tr>
                    <td  colspan="2"><b>{{ this.selected.contact.first_name }}</b></td>
                    <td><b>{{ this.selected.contact.last_name }}</b></td>
                </tr>
                <tr>
                    <td colspan="2">Address:</td>
                    <td>Apt:</td>
                </tr>
                <tr>
                    <td colspan="2"><b>{{ this.selected.address.street_1 }}</b></td>
                    <td><b>{{ this.selected.address.street_2 }}</b></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td>State:</td>
                    <td>Zip:</td>
                </tr>
                <tr>
                    <td><b>{{ this.selected.address.city }}</b></td>
                    <td><b>{{ this.selected.address.state }}</b></td>
                    <td><b>{{ this.selected.address.zip }}</b></td>
                </tr>
                </tbody>
                </v-simple-table>
                <h6>Vehicle Info</h6>
                <v-simple-table dense class="elevation-1">
                    <tbody>
                    <tr>
                        <td colspan="2">VIN:</td>
                        <td>Odometer:</td>
                    </tr>
                    <tr>
                        <td  colspan="2"><b>{{ this.selected.vehicle.vin }}</b></td>
                        <td><b>{{ this.selected.vehicle.odometer }}</b></td>
                    </tr>
                    <tr>
                        <td>Year:</td>
                        <td>Make:</td>
                        <td>Model:</td>
                    </tr>
                    <tr>
                        <td><b>{{ this.selected.vehicle.year.text }}</b></td>
                        <td><b>{{ this.selected.vehicle.make.text }}</b></td>
                        <td><b>{{ this.selected.vehicle.model.model }}</b></td>
                    </tr>
                    <tr>
                        <td>Trim:</td>
                        <td>Drive:</td>
                        <td>Trans:</td>
                    </tr>
                    <tr>
                        <td><b>{{ this.selected.vehicle.trim.trim }}</b></td>
                        <td><b>{{ this.selected.vehicle.drive.drive }}</b></td>
                        <td><b>{{ this.selected.vehicle.transmission.transmission }}</b></td>
                    </tr>
                    </tbody>
                </v-simple-table>
                <h6>Appraisal Info:</h6>
                <v-simple-table dense class="elevation-1">
                    <tbody>
                    <tr>
                        <td>Date Listed:</td>
                        <td>Asking Original:</td>
                        <td>Asking Now:</td>
                    </tr>
                    <tr>
                        <td><b>{{ this.selected.vehicle.appraisal.date_listed }}</b></td>
                        <td><b>{{ this.selected.vehicle.appraisal.asking_original }}</b></td>
                        <td><b>{{ this.selected.vehicle.appraisal.asking_now }}</b></td>
                    </tr>
                    <tr>
                        <td>Appraisal:</td>
                        <td>KBB PP:</td>
                        <td>KBB Trade:</td>
                    </tr>
                    <tr>
                        <td><b>{{ this.selected.vehicle.appraisal.vauto_app }}</b></td>
                        <td><b>{{ this.selected.vehicle.appraisal.kbb_pp }}</b></td>
                        <td><b>{{ this.selected.vehicle.appraisal.kbb_trade }}</b></td>
                    </tr>
                    <tr>
                        <td>Accu WS:</td>
                        <td>Accu Offer:</td>
                        <td>Trans:</td>
                    </tr>
                    <tr>
                        <td><b>{{ this.selected.vehicle.appraisal.accu_ws }}</b></td>
                        <td><b>{{ this.selected.vehicle.appraisal.accu_truecar }}</b></td>
                        <td><b>{{ this.selected.vehicle.transmission.transmission }}</b></td>
                    </tr>
                    </tbody>
                </v-simple-table>
            </v-card>
    </div>
    <div v-else>
        Nothing Selected
    </div>
</template>

<script>
    export default {
        name: "selectedListing",
        props: ['selected'],
        selected: []
    }
</script>

<style scoped>

</style>
