<template>
    <v-app id="inspire">
        <v-navigation-drawer
            v-model="drawer"
            app
        >
            <v-list dense>
                <v-list-item to="/dashboard" link>
                    <v-list-item-action>
                        <v-icon>mdi-home</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Dashboard</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item to="/email" link>
                    <v-list-item-action>
                        <v-icon>mdi-email</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Email</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-action>
                        <v-icon>mdi-power</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title @click="logout">Logout {{ currentUser.name }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app color="light">
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>Koons Buys Cars</v-toolbar-title>
        </v-app-bar>

        <v-content>
            <router-view>

            </router-view>
        </v-content>
    </v-app>
</template>

<script>

    import axios from "axios";

    export default {
            props: {
                    source: String,
            },
            data: () => ({
                    drawer: null,
            }),
            computed: {
                loggedIn: {
                    get() {
                        return this.$store.state.currentUser.loggedIn;
                    }
                },
                currentUser: {
                    get() {
                        return this.$store.state.currentUser.user;
                    }
                }
            },
            methods: {
                logout() {
                    this.$store.dispatch('currentUser/logoutUser');
                },
            },
            created() {
                if (localStorage.hasOwnProperty("kbc_token")) {
                    axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("kbc_token");
                    this.$store.dispatch('currentUser/getUser');
                } else {
                    window.location.replace("/login");
                }
            }
    }

</script>
