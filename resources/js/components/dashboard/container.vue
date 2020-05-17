<template>
    <div>
        <v-card
            class="ma-3 pa-3"
            max-width="1200"
            min-width="800"
            min-height="700"
            elevation="4"
        >

            <v-tabs
                v-model="selectedTab" background-color="light">
                <v-tab :key="0">Listings</v-tab>
                <v-tab :key="1">Details</v-tab>
                <v-tab :key="2">Add Listing</v-tab>
            </v-tabs>
            <v-tabs-items v-model="selectedTab">
                <v-tab-item :key="0">
                    <v-card flat>
                        <v-card-text>
                            <table-filters v-bind:listings="listings" v-bind:filtered="filtered" @updateFiltered="updateFiltered($event)"/>
                            <div v-if="this.filtered[0]"><filtered-table v-bind:filtered="filtered" v-on:itemSelected="itemSelected($event)"/></div>
                            <div v-else><listings-table v-bind:listings="listings" v-on:itemSelected="itemSelected($event)"/></div>
                        </v-card-text>
                    </v-card>
                </v-tab-item>

                <v-tab-item :key="1">
                    <v-card flat>
                        <v-card-text>
                            <v-row>
                                <v-col :cols="4">
                                    <selected-listing v-bind:selected="this.selected"/>
                                </v-col>
                                <v-col :cols="4">
                                    <v-card  min-height="550">
                                        <send-text v-bind:selected="this.selected"/>

                                    </v-card>
                                </v-col>
                                <v-col :cols="4">
                                    <v-card  min-height="550">
                                        <make-call v-bind:selected="this.selected"/>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-tab-item>

                <v-tab-item :key="2">
                    <v-card flat>
                        <v-card-text>
                            Add new listing!
                        </v-card-text>
                    </v-card>
                </v-tab-item>

            </v-tabs-items>
        </v-card>
    </div>
</template>

<script>

    import tableFilters from "./tableFilters";
    import listingsTable from "./listingsTable";
    import filteredTable from "./filteredTable";
    import selectedListing from "./selectedListing";
    import sendText from "./sendText";
    import makeCall from "./makeCall";
    import Axios from "axios";

    export default {
        name: "container",
        components: {
        tableFilters, listingsTable, filteredTable, selectedListing, sendText, makeCall
        },
        data: () => ({

            listings: [],
            filtered: [],
            selected: [],
            add: [],
            selectedTab: ''
        }),

        methods: {
            updateFiltered($event) {
                this.filtered = $event
            },
            itemSelected($event) {

                if ($event.value = true)
                    this.selectedTab = 1
                this.selected = $event.item
            },
        },
        created() {

            Axios.get('http://kbc.test/api/v1/listings')

                .then(res => this.listings = res.data.data)
                .catch(err => console.log(err))


        },
        mounted() {
            this.selectedTab = 0;
        },
    }
</script>

<style scoped>

</style>
