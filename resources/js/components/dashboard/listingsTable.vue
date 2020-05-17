<template>
    <div>
        <v-text-field
            v-model="search"
            label="Search"
            single-line
            hide-details
            dense
        ></v-text-field>
        <v-data-table  :headers="headers" :items="listings" :search="search"
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
        props: ['listings'],
        data: () => ({
            singleSelect: true,
            selected: [],
            search: '',
            headers: [
                { text: 'Status', value: 'status.status', filterable: true },
                { text: 'Source', value: 'source.source' },
                { text: 'Year', value: 'vehicle.year.text' },
                { text: 'Make', value: 'vehicle.make.text' },
                { text: 'Model', value: 'vehicle.model.model' },
                { text: 'Trim', value: 'vehicle.trim.trim' },
                { text: 'Asking', value: 'vehicle.appraisal.asking_now' },
                { text: 'Pay', value: 'vehicle.appraisal.vauto_app' },

            ],

        }),

    }
</script>

<style scoped>

</style>
