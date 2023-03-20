<template>
    <the-main-header :user="datum.user"></the-main-header>
    <the-main-body :user="datum.user"></the-main-body>
</template>

<script lang="ts">
import axios from 'axios';
import { userToken } from '../stores/index';
const tokenStore = userToken();

let accessToken: any;
if(localStorage.getItem("access_token")) {
    accessToken = localStorage.getItem("access_token");
} else {
    accessToken = tokenStore.token;
}

import TheMainHeader from './TheMainHeader.vue'
import TheMainBody from './TheMainBody.vue'

export default {
    components: {
        TheMainHeader,
        TheMainBody
    },
    data() {
        return {
            datum: {
                user: null
            }
        }
    },
    mounted() {
        let self = this;

        if(accessToken) {
            axios.get(`${process.env.API_URL}/login`, {
                headers: {
                    Authorization: `Bearer ${accessToken}`,
                },
            })
            .then(response => {
                if(!response.data.data.profile) {
                    self.$router.push({ name: 'gender' });
                }

                const userId = response.data.data.id;
                self.getUser(userId);
            })
            .catch(error => {
                self.$router.push({ name: 'login' });
            });
        } else {
            this.$router.push({ name: 'login' });
        }
    },
    methods: {
        getUser(userId: any) {
            let self = this;
            
            axios.get(`${process.env.API_URL}/users/${userId}`, {
                headers: {
                    Authorization: `Bearer ${accessToken}`,
                },
            })
            .then(response => {
                self.datum.user = response.data.data;
            })
            .catch(error => {
                alert(error.response.data.message)
            });
        }
    }
}
</script>