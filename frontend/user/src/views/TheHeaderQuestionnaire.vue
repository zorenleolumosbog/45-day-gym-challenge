<template>
    <div class="questionair_page_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="qp_logo">
                        <a href="#"><img src="@/assets/images/logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import axios from 'axios';
import { userAuth } from '../stores/index';
const authStore = userAuth();

export default {
    mounted() {
        let self = this;
            
        axios.get(`${process.env.API_URL}/login`, {
            headers: {
                Authorization: `Bearer ${authStore.accessToken}`,
            },
        })
        .then(response => {
            if(response.data.data.profile) {
                self.$router.push({ name: 'home' });
            } else {
                if(self.$route.name === 'gender') {
                    self.$router.push({name: 'gender'});
                }
            }
        })
        .catch(error => {
            self.$router.push({ name: 'login' });
        });
    }
}
</script>