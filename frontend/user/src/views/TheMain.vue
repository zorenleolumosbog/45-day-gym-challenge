<template>
    <the-main-header :user="datum.user"></the-main-header>
    <the-main-body :user="datum.user"></the-main-body>
</template>

<script lang="ts">
import axios from 'axios';
import { userAuth } from '../stores/index';
const authStore = userAuth();

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
                user: null,
            }
        }
    },
    mounted() {
        let self = this;

        axios.get(`${process.env.API_URL}/users/${authStore.userId}`, {
            headers: {
                Authorization: `Bearer ${authStore.accessToken}`,
            },
        })
        .then(response => {
            if(!response.data.data.profile) {
                self.$router.push({ name: 'gender' });
            } else {
                self.datum.user = response.data.data;
            }
        })
        .catch(error => {
            self.$router.push({ name: 'login' });
        });
    }
}
</script>