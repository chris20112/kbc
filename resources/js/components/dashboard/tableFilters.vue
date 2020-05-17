<template>
    <div>
        <v-row align="center">
            <v-col class="d-flex" cols="12" sm="6">
                <v-select
                    v-model="statusSelect"
                    :items="status"
                    label="Status"
                    dense

                    item-text="name"
                    item-value="value"
                    @change="updateFilters"
                ></v-select>
            </v-col>

            <v-col class="d-flex" cols="12" sm="6">
                <v-select
                    v-model="sourceSelect"
                    :items="source"
                    label="Source"
                    dense

                    item-text="name"
                    item-value="value" t
                    @change="updateFilters"
                ></v-select>
            </v-col>

        </v-row>

    </div>
</template>

<script>
    export default {
        name: "tableFilters",
        props: ['listings', 'filtered'],
        data: () => ({
            sourceSelect: 1,
            statusSelect: 1,
            status: [
                { name: 'All', value: 1 },
                { name: 'uncontacted', value: 14 },
                { name: 'contacted', value: 13 },
            ],
            source: [
                { name: 'All', value: 1 },
                { name: 'craigslist', value: 13 },
                { name: 'cars.com', value: 14 },
            ],
            chips: true
        }),
        methods: {
            updateFilters: function () {
                let sourceFiltered
                let statusFiltered
                let statusSelect = this.statusSelect
                let sourceSelect = this.sourceSelect
                let listings = this.listings

                if (statusSelect === 1 ) {
                    statusFiltered = listings.filter(listing => listing.status.status_id > statusSelect)
                }
                else {
                    statusFiltered = listings.filter(listing => listing.status.status_id === statusSelect)
                }
                if (sourceSelect === 1 ) {
                    sourceFiltered = statusFiltered.filter(statusFilter => statusFilter.source.source_id > sourceSelect)
                }
                else {
                    sourceFiltered = statusFiltered.filter(statusFilter => statusFilter.source.source_id === sourceSelect)
                }
                this.$emit('updateFiltered', sourceFiltered)
            },

        },


    }
</script>

<style scoped>

</style>
