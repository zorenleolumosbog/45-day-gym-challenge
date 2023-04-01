<template>
    <!--####################### Start Right Site #######################-->
    <div class="home_right_site">
        <div class="right_site_header">
            <h4>Manage Options</h4>
            <p>{{ getToLocaleDateNowString() }}</p>
        </div>
        <!-- Start Time Remaining Section -->
        <div class="right_site_time_remaining_main">
            <div class="right_site_remaining_bottom_contents pt-4">
                <div style="margin-left: -22px" v-if="input.start_datetime === '' || input.end_datetime === '' || input.current_week === ''">
                    <input-loader :width="400"></input-loader>
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
                    <div class="row">
                        <div class="col-md-3 mb-5">
                            <h4>Current Timer</h4>
                            <div class="rsrbc_form_box">
                                <label for="start_datetime"><span>Start Date Time</span></label>
                                <div class="input_rtext">
                                    <input type="date" v-model="input.start_datetime" id="start_datetime">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="end_datetime"><span>End Date Time</span></label>
                                <div class="input_rtext">
                                    <input type="date" v-model="input.end_datetime" id="end_datetime">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="current_week"><span>Start of Week</span></label>
                                <div class="input_rtext">
                                    <input type="number" v-model="input.current_week" id="current_week">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="end_of_week"><span>End of Week</span></label>
                                <div class="input_rtext">
                                    <input type="number" v-model="input.end_of_week" id="end_of_week">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-5">
                            <h4>Weeks Description</h4>
                            <div class="rsrbc_form_box">
                                <label for="week1_description"><span>Week 1</span></label>
                                <div class="input_rtext">
                                    <input type="text" v-model="input.week1_description" id="week1_description">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="week2_description"><span>Week 2</span></label>
                                <div class="input_rtext">
                                    <input type="text" v-model="input.week2_description" id="week2_description">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="week3_description"><span>Week 3</span></label>
                                <div class="input_rtext">
                                    <input type="text" v-model="input.week3_description" id="week3_description">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="week4_description"><span>Week 41</span></label>
                                <div class="input_rtext">
                                    <input type="text" v-model="input.week4_description" id="week4_description">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="week5_description"><span>Week 5</span></label>
                                <div class="input_rtext">
                                    <input type="text" v-model="input.week5_description" id="week5_description">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="week6_description"><span>Week 6</span></label>
                                <div class="input_rtext">
                                    <input type="text" v-model="input.week6_description" id="week6_description">
                                </div>
                            </div>
                            <div class="rsrbc_form_box">
                                <label for="week7_description"><span>Week 7</span></label>
                                <div class="input_rtext">
                                    <input type="text" v-model="input.week7_description" id="week7_description">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Links</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="rsrbc_form_box">
                                        <label for="link_weekly_photos"><span>Weekly Photos</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_weekly_photos" id="link_weekly_photos">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_daily_routine"><span>Daily Routine</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_daily_routine" id="link_daily_routine">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_weight_calculator"><span>Weight Calculator</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_weight_calculator" id="link_weight_calculator">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_telegram"><span>Telegram</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_telegram" id="link_telegram">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_blog"><span>Blog</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_blog" id="link_blog">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_about"><span>About</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_about" id="link_about">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="rsrbc_form_box">
                                        <label for="link_faq"><span>Faq</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_faq" id="link_faq">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_facebook"><span>Facebook</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_facebook" id="link_facebook">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_twitter"><span>Twitter</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_twitter" id="link_twitter">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_youtube"><span>Youtube</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_youtube" id="link_youtube">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="link_linkedin"><span>Linkedin</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.link_linkedin" id="link_linkedin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="rsrbc_form_btn w-25 float-right">
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
                start_datetime: '',
                end_datetime: '',
                current_week:'',
                end_of_week: '',
                week1_description:'',
                week2_description:'',
                week3_description:'',
                week4_description:'',
                week5_description:'',
                week6_description:'',
                week7_description:'',
                link_weekly_photos: '',
                link_daily_routine: '',
                link_weight_calculator: '',
                link_telegram: '',
                link_blog: '',
                link_about: '',
                link_faq: '',
                link_facebook: '',
                link_twitter: '',
                link_youtube: '',
                link_linkedin: ''
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

        axios.get(`${process.env.API_URL}/options`, {
            headers: {
                Authorization: `Bearer ${authStore.accessToken}`,
            },
        })
        .then(response => {
            self.setOptions(response.data.data);
            self.validation.loading = false;
        });
    },
    methods: {
        setOptions(data: any) {
            this.input.start_datetime = this.findRecord('name', data, 'start_datetime')?.value;
            this.input.end_datetime = this.findRecord('name', data, 'end_datetime')?.value;
            this.input.current_week = this.findRecord('name', data, 'current_week')?.value;
            this.input.end_of_week = this.findRecord('name', data, 'end_of_week')?.value;
            this.input.week1_description = this.findRecord('name', data, 'week1_description')?.value;
            this.input.week2_description = this.findRecord('name', data, 'week2_description')?.value;
            this.input.week3_description = this.findRecord('name', data, 'week3_description')?.value;
            this.input.week4_description = this.findRecord('name', data, 'week4_description')?.value;
            this.input.week5_description = this.findRecord('name', data, 'week5_description')?.value;
            this.input.week6_description = this.findRecord('name', data, 'week6_description')?.value;
            this.input.week7_description = this.findRecord('name', data, 'week7_description')?.value;
            this.input.link_weekly_photos = this.findRecord('name', data, 'link_weekly_photos')?.value;
            this.input.link_daily_routine = this.findRecord('name', data, 'link_daily_routine')?.value;
            this.input.link_weight_calculator = this.findRecord('name', data, 'link_weight_calculator')?.value;
            this.input.link_telegram = this.findRecord('name', data, 'link_telegram')?.value;
            this.input.link_blog = this.findRecord('name', data, 'link_blog')?.value;
            this.input.link_about = this.findRecord('name', data, 'link_about')?.value;
            this.input.link_faq = this.findRecord('name', data, 'link_faq')?.value;
            this.input.link_facebook = this.findRecord('name', data, 'link_facebook')?.value;
            this.input.link_twitter = this.findRecord('name', data, 'link_twitter')?.value;
            this.input.link_youtube = this.findRecord('name', data, 'link_youtube')?.value;
            this.input.link_linkedin = this.findRecord('name', data, 'link_linkedin')?.value;
        },
        findRecord(key: string, heystack: any, needle: string) {
            let response = heystack.filter((el: any) => {
                return el[key] == needle;
            })[0];

            return response;
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
            let counter = 0;
            self.validation.loading = true;

            const object = self.input;
            for (const index in object) {
                axios.patch(`${process.env.API_URL}/option-update-value-by-name`, {
                        name: index,
                        value: object[index]
                    }, {
                    headers: {
                        Authorization: `Bearer ${authStore.accessToken}`,
                    },
                })
                .then(response => {
                    counter++;
                    if(counter === 22) {
                        self.validation.loading = false;
                        self.validation.success.message = 'Successfully updated!';

                        document.getElementById('app')?.scrollIntoView({ behavior: 'smooth' });
                    }
                })
                .catch(error => {
                    self.validation.loading = false;
                    self.validation.errors = error.response.data.errors;
                });
            }
        }
    }
}
</script>

<style scoped>
    .rsrbc_form_box input {
        width: 100%;
        height: 44px;
    }
</style>