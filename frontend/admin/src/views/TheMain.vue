<template>
    <the-main-header :user="datum.user"></the-main-header>
    <the-main-body :user="datum.user"></the-main-body>
</template>

<script lang="ts">
import axios from 'axios';
import { userToken } from '../stores/index';
const tokenStore = userToken();

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

        if(tokenStore.accessToken) {
            axios.get(`${process.env.API_URL}/login`, {
                headers: {
                    Authorization: `Bearer ${tokenStore.accessToken}`,
                },
            })
            .then(response => {
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
                    Authorization: `Bearer ${tokenStore.accessToken}`,
                },
            })
            .then(response => {
                self.datum.user = response.data.data;
            });
        }
    }
}
</script>