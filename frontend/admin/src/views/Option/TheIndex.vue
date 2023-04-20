<template>
    <the-main-body>
        <template #default>
            <!--####################### Start Right Site #######################-->
            <div class="home_right_site">
                <div class="right_site_header">
                    <h4>Manage Options</h4>
                    <p><i @click="userGuideInformation = 'User options refer to the various settings that are available to a user when interacting with the system. These include weekly contest timer, content closing email sending schedule, weeks description for each week number and additional links to display on the user dashboard menus.'" class="fa-solid fa-circle-info ml-2" data-toggle="modal" data-target="#informationModal"></i></p>
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
                                <div class="col-md-12">
                                    <ul class="nav justify-content-center mb-5">
                                        <li class="nav-item">
                                            <router-link  class="nav-link" to="/options/weekly-contest">Weekly Contest</router-link>
                                        </li>
                                        <li class="nav-item">
                                            <router-link  class="nav-link" to="/options/weeks-description">Weeks Description</router-link>
                                        </li>
                                        <li class="nav-item">
                                            <router-link  class="nav-link" to="/options/links">Links</router-link>
                                        </li>
                                        <li class="nav-item">
                                            <router-link  class="nav-link" to="/options/closing-contest-email">Closing Contest Email</router-link>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-3 mb-5" v-if="$route.name === 'weekly-contest'">
                                    <h4>Weekly Contest</h4>
                                    <div class="rsrbc_form_box d-none">
                                        <label for="start_datetime"><span>Start of Week Date</span></label>
                                        <div class="input_rtext">
                                            <input type="date" v-model="input.start_datetime" id="start_datetime">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box d-none">
                                        <label for="end_datetime"><span>End of Week Date</span></label>
                                        <div class="input_rtext">
                                            <input type="date" v-model="input.end_datetime" id="end_datetime">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="current_week"><span>Current Week Number<i @click="userGuideInformation = 'The current week number refers to the numerical identification of a specific week within the contest. A 0 value will stop all the posting, and the value of this field will be incremented by 1 automatically by the system during first day of the week. It will stop incrementing when the value is not lesser than the end of the week number.'" class="fa-solid fa-circle-info ml-2" data-toggle="modal" data-target="#informationModal"></i></span></label>
                                        <div class="input_rtext">
                                            <input type="number" v-model="input.current_week" id="current_week">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="end_of_week"><span>End of Week Number<i @click="userGuideInformation = 'The end of week number refers to the numerical identification of a specific week for the closing of the contest.'" class="fa-solid fa-circle-info ml-2" data-toggle="modal" data-target="#informationModal"></i></span></label>
                                        <div class="input_rtext">
                                            <input type="number" v-model="input.end_of_week" id="end_of_week">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" v-if="$route.name === 'closing-contest-email'">
                                    <h4 class="mt-5" style="font-size: 16px;">Closing Contest Email
                                        <span class="h4">
                                            <i @click="userGuideInformation = 'The closing contest email is an email scheduling refers to the process of setting a specific weekday and hour for an email to be sent. This feature allows admin to compose an email and choose when it will be delivered, rather than sending it immediately.'" class="fa-solid fa-circle-info ml-2" data-toggle="modal" data-target="#informationModal">
                                            </i>
                                        </span>
                                    </h4>
                                    <div class="rsrbc_form_box">
                                        <label for="weekday_schedule"><span>Weekday Schedule</span></label>
                                        <div class="rp_form_single input_rtext" style="margin-top: 0px">
                                            <select v-model="input.closing_weekday_schedule" id="weekday_schedule">
                                                <option value="0">
                                                    Sunday
                                                </option>
                                                <option value="1">
                                                    Monday
                                                </option>
                                                <option value="2">
                                                    Tuesday
                                                </option>
                                                <option value="3">
                                                    Wednesday
                                                </option>
                                                <option value="4">
                                                    Thursday
                                                </option>
                                                <option value="5">
                                                    Friday
                                                </option>
                                                <option value="6">
                                                    Saturday
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="hour_schedule"><span>Hour Schedule</span></label>
                                        <div class="rp_form_single input_rtext" style="margin-top: 0px">
                                            <select v-model="input.closing_hour_schedule" id="hour_schedule">
                                                <option value="0">
                                                    12:00 a.m. Midnight
                                                </option>
                                                <option value="1">
                                                    1:00 a.m.
                                                </option>
                                                <option value="2">
                                                    2:00 a.m.
                                                </option>
                                                <option value="3">
                                                    3:00 a.m.
                                                </option>
                                                <option value="4">
                                                    4:00 a.m.
                                                </option>
                                                <option value="5">
                                                    5:00 a.m.
                                                </option>
                                                <option value="6">
                                                    6:00 a.m.
                                                </option>
                                                <option value="7">
                                                    7:00 a.m.
                                                </option>
                                                <option value="8">
                                                    8:00 a.m.
                                                </option>
                                                <option value="9">
                                                    9:00 a.m.
                                                </option>
                                                <option value="10">
                                                    10:00 a.m.
                                                </option>
                                                <option value="11">
                                                    11:00 a.m.
                                                </option>
                                                <option value="12">
                                                    12:00 p.m. Noon
                                                </option>
                                                <option value="13">
                                                    1:00 p.m.
                                                </option>
                                                <option value="14">
                                                    2:00 p.m.
                                                </option>
                                                <option value="15">
                                                    3:00 p.m.
                                                </option>
                                                <option value="16">
                                                    4:00 p.m.
                                                </option>
                                                <option value="17">
                                                    5:00 p.m.
                                                </option>
                                                <option value="18">
                                                    6:00 p.m.
                                                </option>
                                                <option value="19">
                                                    7:00 p.m.
                                                </option>
                                                <option value="20">
                                                    8:00 p.m.
                                                </option>
                                                <option value="21">
                                                    9:00 p.m
                                                </option>
                                                <option value="22">
                                                    10:00 p.m.
                                                </option>
                                                <option value="23">
                                                    11:00 p.m.
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="email_subject"><span>Email Subject</span></label>
                                        <div class="input_rtext">
                                            <input type="text" v-model="input.closing_email_subject" id="email_subject">
                                        </div>
                                    </div>
                                    <div class="rsrbc_form_box">
                                        <label for="email_body"><span>Email Body</span></label>
                                        <div class="input_rtext">
                                            <textarea v-model="input.closing_email_body" style="height: 226px;" id="email_body"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-5" v-if="$route.name === 'weeks-description'">
                                    <h4>Weeks Description
                                        <span class="h4">
                                            <i @click="userGuideInformation = 'A week description typically refers to an overview of the contest that occurred during a particular week number.'" class="fa-solid fa-circle-info ml-2" data-toggle="modal" data-target="#informationModal">
                                            </i>
                                        </span>
                                    </h4>
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
                                        <label for="week4_description"><span>Week 4</span></label>
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
                                <div class="col-md-12" v-if="$route.name === 'links'">
                                    <h4>Links
                                        <span class="h4">
                                            <i @click="userGuideInformation = 'Enter a valid hyperlink that will be linked to the user\'s left sidebar menu dashboard.'" class="fa-solid fa-circle-info ml-2" data-toggle="modal" data-target="#informationModal">
                                            </i>
                                        </span>
                                    </h4>
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
            <user-guide :information="userGuideInformation"></user-guide>
        </template>
    </the-main-body>
</template>

<script lang="ts">

import axios from 'axios';
import { userAuth, userLocale } from '../../stores/index';
const authStore = userAuth();
const localeStore = userLocale();

import TheMainBody from '../TheMainBody.vue';

import InputLoader from '../../components/InputLoader.vue';
import UserGuide from '../../components/UserGuide.vue';

export default {
    components: {
        TheMainBody,
        InputLoader,
        UserGuide
    },
    data() {
        return {
            input: {
                start_datetime: '',
                end_datetime: '',
                current_week:'',
                end_of_week: '',
                closing_weekday_schedule: '',
                closing_hour_schedule: '',
                closing_email_subject: '',
                closing_email_body: '',
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
            userGuideInformation: '',
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
            this.input.closing_weekday_schedule = this.findRecord('name', data, 'closing_weekday_schedule')?.value;
            this.input.closing_hour_schedule = this.findRecord('name', data, 'closing_hour_schedule')?.value;
            this.input.closing_email_subject = this.findRecord('name', data, 'closing_email_subject')?.value;
            this.input.closing_email_body = this.findRecord('name', data, 'closing_email_body')?.value;
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
    .rsrbc_form_box input,
    .rsrbc_form_box select {
        width: 100%;
        height: 44px;
    }
    ul.nav.justify-content-center.mb-5 {
        border-bottom: 2px solid #501585;
    }
    .nav-link {
        padding: 11px 24px;
    }
    .left_site_menu ul li a:hover, .lsm_active, .router-link-active {
        background: #501585;
        color: #fff;
    }
    .left_site_menu ul li a:hover ::after, 
    .lsm_active::after, 
    .router-link-active::after {
        background: transparent;
    }
</style>