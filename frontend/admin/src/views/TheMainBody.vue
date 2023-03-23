<template>
    <div class="home_page_main_section_parent">
        <div class="px-5">
            <div class="row">
                <div class="col-md-12">
                    <content-loader v-if="!user"
                        viewBox="0 0 476 124"
                        :speed="1"
                        primaryColor="#f3f3f3"
                        secondaryColor="#ecebeb"
                    >
                        <rect x="10" y="40" rx="0" ry="0" width="75" height="10" /> 
                        <rect x="10" y="60" rx="0" ry="0" width="75" height="10" /> 
                        <rect x="10" y="100" rx="0" ry="0" width="75" height="10" /> 
                        <rect x="10" y="80" rx="0" ry="0" width="75" height="10" /> 
                        <rect x="10" y="120" rx="0" ry="0" width="75" height="10" /> 
                        <rect x="110" y="40" rx="0" ry="0" width="370" height="125" /> 
                        <rect x="275" y="63" rx="0" ry="0" width="72" height="4" /> 
                        <rect x="430" y="5" rx="5" ry="5" width="75" height="20" /> 
                        <rect x="110" y="10" rx="0" ry="0" width="200" height="15" /> 
                        <rect x="10" y="5" rx="4" ry="4" width="75" height="20" /> 
                        <circle cx="493" cy="54" r="2" /> 
                        <circle cx="497" cy="47" r="7" /> 
                        <circle cx="497" cy="77" r="7" /> 
                        <circle cx="497" cy="107" r="7" />
                    </content-loader>
                    <div v-if="user" class="home_page_section_main">
                        <!--####################### Start Left Site #######################-->
                        <div class="home_page_main_left_site">
                            <div class="home_left_site">
                                <div class="left_site_bottom_conts">
                                    <div class="left_site_menu">
                                        <ul>
                                            <li><a href="#" class="lsm_active">
                                                <span class="lsmmw">
                                                    <img src="@/assets/images/home.png" alt="">
                                                    <span>Home {{ user?.attributes.name }}</span>
                                                </span>
                                            </a></li>
                                            <li><a href="#">
                                                <span class="lsmmw">
                                                    <img src="@/assets/images/weekly.png" alt="">
                                                    <span>Weekly Photos</span>
                                                </span>
                                            </a></li>
                                        </ul>
                                    </div>
                                    <div class="mt-5 left_site_social_link_and_followus">
                                        <div class="left_site_follow_us_main">
                                            <div class="left_site_copyright">
                                                <p>@epictranformationchallenge 2023. All rights reserved</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--####################### End Left Site #######################-->

                        <!--####################### Start Right Site #######################-->
                        <div class="home_right_site">
                            <div class="right_site_header">
                                <h4>This Week’s Post</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
 import { ContentLoader } from "vue-content-loader"

import 'vue3-carousel/dist/carousel.css'
import axios from 'axios';
import { userToken, userLocale } from '../stores/index';
const tokenStore = userToken();
const localeStore = userLocale();

export default {
    components: {
        ContentLoader
    },
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
    props: ['user'],
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