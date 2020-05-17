<template>
    <div>
        <h5>Listings:</h5>
        <v-data-table :headers="headers" :items="filtered"
                      item-key="id" class="elevation-1"
                      v-model="selected" show-select :single-select="singleSelect"
                      :footer-props="{itemsPerPageOptions:[10,20,30]}"
                      @item-selected="$emit('itemSelected', $event)"
        >
        </v-data-table>
        <br>
    </div>
</template>

<script>
    export default {
        props: ['filtered'],
        data: () => ({
            singleSelect: true,
            selected: [],
            headers: [
                /*{ text: 'Listing ID:', value: 'id' },
                { text: 'Link', value: 'link_url' },*/
                { text: 'Status', value: 'status.status' },
                { text: 'Source', value: 'source.source' },
                { text: 'Year', value: 'vehicle.year.text' },
                { text: 'Make', value: 'vehicle.make.text' },
                { text: 'Model', value: 'vehicle.model.model' },
                { text: 'Trim', value: 'vehicle.trim.trim' },
                { text: 'Asking', value: 'vehicle.appraisal.asking_now' },
                { text: 'Pay', value: 'vehicle.appraisal.vauto_app' },
                /*{ text: 'More', value: 'data-table-expand' },*/
            ],

        }),

    }
</script>

<style scoped>

</style>

