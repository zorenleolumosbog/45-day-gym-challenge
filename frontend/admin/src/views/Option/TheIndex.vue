<template>
    <!--####################### Start Right Site #######################-->
    <div class="home_right_site">
        <div class="right_site_header">
            <h4>Manage Options</h4>
            <p>{{ getToLocaleDateNowString() }}</p>
        </div>
        <!-- Start Time Remaining Section -->
        <div class="right_site_time_remaining_main">
            <div class="right_site_remaining_bottom_contents">
                <div style="margin-left: -22px" v-if="input.startDateTime === '' || input.endDateTime === '' || input.currentWeek === ''">
                    <input-loader :width="676"></input-loader>
                </div>
                <div v-else class="rsrbc_form">
                    <div v-if="validation.success.message" class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ validation.success.message }}</strong>
                        <button @click="validation.success.message = null" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div v-if="validation.errors" class="mt-4 mb-4 alert alert-danger alert-dismissible fade show" role="alert">
                        <p v-for="(error, key) in validation.errors" :key="key">
                            <strong>{{ error[0] }}</strong>
                        </p>
                        <button @click="validation.errors = null" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="rsrbc_form_box">
                        <label for="start_datetime"><span>Start Date Time</span></label>
                        <div class="input_rtext">
                            <input type="datetime-local" v-model="input.startDateTime" id="start_datetime">
                        </div>
                    </div>
                    <div class="rsrbc_form_box">
                        <label for="end_datetime"><span>End Date Time</span></label>
                        <div class="input_rtext">
                            <input type="datetime-local" v-model="input.endDateTime" id="end_datetime">
                        </div>
                    </div>
                    <div class="rsrbc_form_box">
                        <label for="current_week"><span>Current Week</span></label>
                        <div class="input_rtext">
                            <input type="number" v-model="input.currentWeek" id="current_week">
                        </div>
                    </div>
                    <div class="rsrbc_form_btn w-25">
                        <input v-if="!validation.loading" type="submit" value="SAVE" @click="updateOption">
                        <button v-if="validation.loading" type="submit" disabled>
                            <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--####################### End Right Site #######################-->
</template>

<script lang="ts">

import axios from 'axios';
import { userAuth, userLocale } from '../../stores/index';
const authStore = userAuth();
const localeStore = userLocale();

import InputLoader from '../../components/InputLoader.vue';

export default {
    components: {
        InputLoader
    },
    data() {
        return {
            input: {
                startDateTime: '',
                endDateTime: '',
                currentWeek:''
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
    mounted() {
        let self = this;

        Promise.all([self.getStartDatetime(), self.getEndDatetime(), self.getCurrentWeek()])
        .then(function ([startDateTime, endDateTime, currentWeek]) {
            self.input.startDateTime = startDateTime.data.data.attributes.value;
            self.input.endDateTime = endDateTime.data.data.attributes.value;
            self.input.currentWeek = currentWeek.data.data.attributes.value;
        });
    },
    methods: {
        getStartDatetime() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name?name=start_datetime`, {
                        headers: {
                            Authorization: `Bearer ${authStore.accessToken}`,
                        },
                    });
        },
        getEndDatetime() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name?name=end_datetime`, {
                        headers: {
                            Authorization: `Bearer ${authStore.accessToken}`,
                        },
                    });
        },
        getCurrentWeek() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name?name=current_week`, {
                        headers: {
                            Authorization: `Bearer ${authStore.accessToken}`,
                        },
                    });
        },
        getToLocaleDateNowString() {
            localeStore.setToLocaleDateNowString();

            return localeStore.toLocaleDateNowString;
        },
        getToLocaleDateString(dateString: string) {
            localeStore.setToLocaleDateString(dateString);

            return localeStore.toLocaleDateString;
        },
        updateOption() {
            let self = this;
            self.validation.loading = true;

            Promise.all([this.updateStartDatetime(), this.updateEndDatetime(), this.updateCurrentWeek()])
            .then(function ([startDateTime, endDateTime, currentWeek]) {
                self.validation.loading = false;
                self.validation.success.message = 'Successfully updated!'
            })
            .catch(error => {
                self.validation.loading = false;
                self.validation.errors = error.response.data.errors;
            });
        },
        updateStartDatetime() {
            let self = this;
            return axios.patch(`${process.env.API_URL}/option-update-value-by-name`, {
                        name: "start_datetime",
                        value: self.input.startDateTime
                    }, {
                        headers: {
                            Authorization: `Bearer ${authStore.accessToken}`,
                        },
                    });
        },
        updateEndDatetime() {
            let self = this;
            return axios.patch(`${process.env.API_URL}/option-update-value-by-name`, {
                        name: "end_datetime",
                        value: self.input.endDateTime
                    }, {
                        headers: {
                            Authorization: `Bearer ${authStore.accessToken}`,
                        },
                    });
        },
        updateCurrentWeek() {
            let self = this;
            return axios.patch(`${process.env.API_URL}/option-update-value-by-name`, {
                        name: "current_week",
                        value: self.input.currentWeek
                    }, {
                        headers: {
                            Authorization: `Bearer ${authStore.accessToken}`,
                        },
                    });
        },
    }
}
</script>