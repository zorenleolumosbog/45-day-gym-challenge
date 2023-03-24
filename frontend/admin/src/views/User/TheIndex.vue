<template>
    <!--####################### Start Right Site #######################-->
    <div class="home_right_site">
        <div class="right_site_header">
            <h4>Manage Users</h4>
            <p>{{ getToLocaleDateNowString() }}</p>
        </div>
        <!-- Start Time Remaining Section -->
        <div class="right_site_time_remaining_main">
            <div class="right_site_remaining_bottom_contents">
                <div class="rsrbc_header">
                    <h4>Week 1</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="rsrbc_form">
                    <div v-if="validation.errors" class="mt-4 mb-4 alert alert-danger alert-dismissible fade show" role="alert">
                        <p v-for="(error, key) in validation.errors" :key="key">
                            <strong>{{ error[0] }}</strong>
                        </p>
                        <button @click="validation.errors = null" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="rsrbc_form_box">
                        <label for="rsrtc1">Enter Current Weight <span>(Pounds/lbs)</span></label>
                        <div class="input_rtext">
                            <input type="number" id="rsrtc1">
                            <p>lbs</p>
                        </div>
                    </div>
                    <div class="rsrbc_form_box">
                        <label for="rsrtc2">Write Notes</label>
                        <div class="input_rtext input_rtext2">
                            <input type="text" id="rsrtc2">
                        </div>
                    </div>
                    <div class="rsrbc_form_btn">
                        <input v-if="!validation.loading" type="submit" value="POST">
                        <button v-if="validation.loading" type="submit" disabled>
                            <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div v-if="validation.success.message" class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ validation.success.message }}</strong>
            <button @click="validation.success.message = null" type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <!--####################### End Right Site #######################-->
</template>

<script lang="ts">

import axios from 'axios';
import { userAuth, userLocale } from '../../stores/index';
const authStore = userAuth();
const localeStore = userLocale();

export default {
    data() {
        return {
            input: {
            },
            validation: {
                loading: false,
                success: {
                    message: null
                },
                errors: null
            }
        }
    },
    methods: {
        getToLocaleDateNowString() {
            localeStore.setToLocaleDateNowString();

            return localeStore.toLocaleDateNowString;
        },
        getToLocaleDateString(dateString: string) {
            localeStore.setToLocaleDateString(dateString);

            return localeStore.toLocaleDateString;
        }
    }
}
</script>