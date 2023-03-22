<template>
    <div class="home_page_main_section_parent">
        <div class="container">
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
                                <div class="left_site_meter">
                                    <div class="left_site_meter_top">
                                        <h4>Weight Loss Goal</h4>
                                        <p>{{ currentWeeklyAttachment 
                                                ? currentWeeklyAttachment?.attributes.weight
                                                : user?.attributes.weekly_attachments[0]?.weight 
                                                ? user?.attributes.weekly_attachments[0]?.weight : user?.attributes.profile.current_weight }}lbs <span>/ {{ user?.attributes.profile.desired_weight_goal }}lbs</span></p>
                                    </div>
                                    <div class="left_site_meter_progress">
                                        <!-- <div class="left_site_meter_progress_img">
                                            <img src="@/assets/images/meter.png" alt="">
                                        </div> -->
                                        <div class="wrapper_main">
                                            <div class="wrapper">  
                                                <div class="circle-out">
                                                    <!-- 180deg is 0% -->
                                                    <!-- 360deg is 100% -->
                                                    <div id="bar" class="circle" v-bind:style="{transform: 'rotate(' + getDesiredWeightGoalPercentage(360) + 'deg)'}"></div>
                                                    <span class="text">Hello</span>
                                                </div>
                                            </div>
                                            <!-- 0deg is 0% -->
                                            <!-- 190deg is 100% -->
                                            <div class="wrapper_meter" v-bind:style="{transform: 'rotate(' + getDesiredWeightGoalPercentage(190) + 'deg)'}">
                                                <img src="@/assets/images/meter-bar.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="getDesiredWeightGoalPercentage(100) >= 95" class="left_site_meter_content">
                                        <p><i class="far fa-check-circle"></i>Good Work, You are on track to weight loss goal.</p>
                                    </div>
                                </div>

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
                                            <li><a href="#">
                                                <span class="lsmmw">
                                                    <img src="@/assets/images/daily.png" alt="">
                                                    <span>Daily Routine</span>
                                                </span>
                                            </a></li>
                                            <li><a href="#">
                                                <span class="lsmmw">
                                                    <img src="@/assets/images/weight.png" alt="">
                                                    <span>Weigh Calculator</span>
                                                </span>
                                            </a></li>
                                            <li><a href="#">
                                                <span class="lsmmw">
                                                    <img src="@/assets/images/telegram.png" alt="">
                                                    <span>Telegram</span>
                                                </span>
                                            </a></li>
                                            <li><a href="#">
                                                <span class="lsmmw">
                                                    <img src="@/assets/images/blog.png" alt="">
                                                    <span>BLog</span>
                                                </span>
                                            </a></li>
                                        </ul>
                                    </div>

                                    <div class="left_site_items_all">
                                        <div class="left_site_item_single">
                                            <span><img src="@/assets/images/healthy.png" alt=""></span>
                                            <p>Healthy Diet Plan</p>
                                        </div>
                                        <div class="left_site_item_single lsis2">
                                            <span><img src="@/assets/images/fitness.png" alt=""></span>
                                            <p>Fitness Habit Tracker</p>
                                        </div>
                                        <div class="left_site_item_single lsis3">
                                            <span><img src="@/assets/images/wake.png" alt=""></span>
                                            <p>Wake up Alarm</p>
                                        </div>
                                        <div class="left_site_item_single lsis4">
                                            <span><img src="@/assets/images/daily2.png" alt=""></span>
                                            <p>Daily Sleep Schedule</p>
                                        </div>
                                        <div class="left_site_item_single lsis5">
                                            <span><img src="@/assets/images/water.png" alt=""></span>
                                            <p>Water Intake Plan</p>
                                        </div>
                                        <div class="left_site_item_single lsis6">
                                            <span><img src="@/assets/images/health.png" alt=""></span>
                                            <p>Health Tips & Tricks</p>
                                        </div>
                                    </div>

                                    <div class="left_site_social_link_and_followus">
                                        <div class="left_site_social_links">
                                            <ul>
                                                <li><a href="#">About</a></li>
                                                <li><a target="_blank" :href="user?.attributes.telegram_link ? user?.attributes.telegram_link.link  : user?.attributes.telegram_link_url">Telegram Link</a></li>
                                                <li><a href="#">Blog</a></li>
                                                <li><a href="#">Faq</a></li>
                                            </ul>
                                        </div>

                                        <div class="left_site_follow_us_main">
                                            <div class="left_site_follow_us">
                                                <p>Follow Us</p>
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
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
                            <template v-if="validation.displayPosting">
                                <template v-if="parseInt(currentWeek?.attributes.value) > parseInteger(user?.attributes.weekly_attachments[0]?.week_number) 
                                                && parseInt(currentWeek?.attributes.value) > parseInteger(currentWeeklyAttachment?.attributes.week_number)">
                                    <div class="right_site_header">
                                        <h4>This Week’s Post</h4>
                                        <p>{{ getToLocaleDateNowString() }}</p>
                                    </div>
                                    <!-- Start Time Remaining Section -->
                                    <div class="right_site_time_remaining_main">
                                        <div class="rstremaining_time_remaining">
                                            <div class="rstremaining_trem_left">
                                                <div class="rstremaining_treml_text">
                                                    <h4>You Have  </h4>
                                                </div>
                                                <div class="rstremaining_treml_time">
                                                    <the-countdown-timer @displayPosting="(val) => validation.displayPosting = val"></the-countdown-timer>
                                                </div>
                                            </div>
                                            <div class="rstremaining_trem_right">
                                                <h4>remaining until this post Locks</h4>
                                            </div>
                                        </div>

                                        <div class="right_site_upload_photo">
                                            <div class="rsup_title">
                                                <h4>Upload Your Photo</h4>
                                            </div>
                                            <div class="rsup_items_all">
                                                <div class="rsup_item_single">
                                                    <div class="rsup_item_single_img">
                                                        <div class="rsup_item_single_img_pos">
                                                            <img v-if="input.files.frontPhoto.src" :src="input.files.frontPhoto.src">
                                                            <img v-else src="@/assets/images/people1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="rsup_item_single_upload" @click="$refs.front.click()">
                                                        <p>Upload Your <span>Front Photo</span></p>
                                                        <div class="cnasfu_upload">
                                                            <input @change="handleFileFrontPhotoAttachment" type="file" ref="front" id="file" accept="image/png, image/gif, image/jpeg">
                                                            <label for="file"><span><img src="@/assets/images/upload.png" alt=""></span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rsup_item_single">
                                                    <div class="rsup_item_single_img">
                                                        <div class="rsup_item_single_img_pos">
                                                            <img v-if="input.files.sidePhoto.src" :src="input.files.sidePhoto.src">
                                                            <img v-else src="@/assets/images/people2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="rsup_item_single_upload" @click="$refs.side.click()">
                                                        <p>Upload Your <span>Side Photo</span></p>
                                                        <div class="cnasfu_upload">
                                                            <input @change="handleFileSidePhotoAttachment" type="file" ref="side" id="file2" accept="image/png, image/gif, image/jpeg">
                                                            <label for="file2"> <span><img src="@/assets/images/upload.png" alt=""></span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rsup_item_single">
                                                    <div class="rsup_item_single_img">
                                                        <div class="rsup_item_single_img_pos">
                                                            <img v-if="input.files.backPhoto.src" :src="input.files.backPhoto.src">
                                                            <img v-else src="@/assets/images/people3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="rsup_item_single_upload" @click="$refs.back.click()">
                                                        <p>Upload Your <span>Back Photo</span></p>
                                                        <div class="cnasfu_upload">
                                                            <input @change="handleFileBackPhotoAttachment" type="file" ref="back" id="file3" accept="image/png, image/gif, image/jpeg">
                                                            <label for="file3"> <span><img src="@/assets/images/upload.png" alt=""></span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>      
                                        </div>
                                        <div class="right_site_remaining_bottom_contents">
                                            <div class="rsrbc_header">
                                                <h4>Week {{ currentWeek?.attributes.value }}</h4>
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
                                                        <input v-model="input.weight" type="number" id="rsrtc1">
                                                        <p>lbs</p>
                                                    </div>
                                                </div>
                                                <div class="rsrbc_form_box">
                                                    <label for="rsrtc2">Write Notes</label>
                                                    <div class="input_rtext input_rtext2">
                                                        <input v-model="input.description" type="text" id="rsrtc2">
                                                    </div>
                                                </div>
                                                <div class="rsrbc_form_btn">
                                                    <input v-if="!validation.loading" :disabled="input.weight === '' 
                                                            || input.description === '' 
                                                            || input.files.frontPhoto.src === ''
                                                            || input.files.sidePhoto.src === ''
                                                            || input.files.backPhoto.src === ''" @click="storeWeeklyAttachments" type="submit" value="POST">
                                                    <button v-if="validation.loading" type="submit" disabled>
                                                        <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Time Remaining Section -->
                                </template>
                            </template>
                            
                            <div v-if="validation.success.message" class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ validation.success.message }}</strong>
                                <button @click="validation.success.message = null" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!-- <div v-if="!user" class="d-flex mt-5 justify-content-center">
                                <div class="spinner-grow" style="width: 6rem; height: 6rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div> -->

                            <!-- Start Current Upload Section -->
                            <div v-if="currentWeeklyAttachment" class="right_site_week_carousel_main">
                                <div class="rs_week_items_all_carousel">
                                    <div class="rswiac_header">
                                        <h4><img src="@/assets/images/lock.png" alt="">{{ getToLocaleDateString(currentWeeklyAttachment?.attributes.created_at) }}</h4>
                                    </div>
                                    <carousel :settings="settings" :breakpoints="breakpoints">
                                        <slide v-for="weeklyAttachmentDetails in currentWeeklyAttachmentDetails" :key="weeklyAttachmentDetails">
                                            <div class="rswi_item_single">
                                                <div class="rswi_item_single_img">
                                                    <div class="rswi_item_single_img_pos">
                                                        <img :src="weeklyAttachmentDetails?.attributes.url" alt="">
                                                    </div>
                                                </div>
                                                <div class="rswi_item_single_contents">
                                                    <p>{{ weeklyAttachmentDetails?.attributes.description  }}</p>
                                                    <ul>
                                                        <li><a href="#"><i class="far fa-heart"></i>2</a></li>
                                                        <li><a href="#"><i class="far fa-comment-alt"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </slide>
                                        <template #addons>
                                            <pagination />
                                        </template>
                                    </carousel>
                                    <div class="rs_week_bottom_contents">
                                        <h4>Week {{ currentWeeklyAttachment?.attributes.week_number }}</h4>
                                        <div class="rswbc_parag">
                                            <p>Weight: {{ currentWeeklyAttachment?.attributes.weight }}lbs</p>
                                            <p>{{ currentWeeklyAttachment?.attributes.description }}</p>
                                            <a href="#">More...</a>
                                        </div>
                                        <div class="rswbc_share">
                                            <span><a href="#"><i class="fas fa-share"></i>Share</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Current Upload Section -->

                            <!-- Start Week Carousel Section -->
                            <div v-for="weekly_attachment in user?.attributes.weekly_attachments" :key="weekly_attachment" class="right_site_week_carousel_main">
                                <div class="rs_week_items_all_carousel">
                                    <div class="rswiac_header">
                                        <h4><img src="@/assets/images/lock.png" alt="">{{ getToLocaleDateString(weekly_attachment.created_at) }}</h4>
                                    </div>
                                    <carousel :settings="settings" :breakpoints="breakpoints">
                                        <slide v-for="weekly_attachment_detail in weekly_attachment.weekly_attachment_details" :key="weekly_attachment_detail">
                                            <div class="rswi_item_single">
                                                <div class="rswi_item_single_img">
                                                    <div class="rswi_item_single_img_pos">
                                                        <img :src="weekly_attachment_detail.url" alt="">
                                                    </div>
                                                </div>
                                                <div class="rswi_item_single_contents">
                                                    <p>{{ weekly_attachment_detail.description  }}</p>
                                                    <ul>
                                                        <li><a href="#"><i class="far fa-heart"></i>2</a></li>
                                                        <li><a href="#"><i class="far fa-comment-alt"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </slide>
                                        <template #addons>
                                            <pagination />
                                        </template>
                                    </carousel>
                                    <div class="rs_week_bottom_contents">
                                        <h4>Week {{ weekly_attachment.week_number }}</h4>
                                        <div class="rswbc_parag">
                                            <p>Weight: {{ weekly_attachment.weight }}lbs</p>
                                            <p>{{ weekly_attachment.description }}</p>
                                            <a href="#">More...</a>
                                        </div>
                                        <div class="rswbc_share">
                                            <span><a href="#"><i class="fas fa-share"></i>Share</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Week Carousel Section -->
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
import TheCountdownTimer from './TheCountdownTimer.vue'

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import axios from 'axios';
import { userToken, userLocale } from '../stores/index';
const tokenStore = userToken();
const localeStore = userLocale();

export default {
    components: {
        ContentLoader,
        TheCountdownTimer,
        Carousel,
        Slide,
        Pagination,
        Navigation
    },
    data() {
        return {
            input: {
                weight: '',
                description: '',
                files: {
                    frontPhoto: {
                        src: '',
                        description: 'Front',
                        file: null
                    },
                    sidePhoto: {
                        src: '',
                        description: 'Side',
                        file: null
                    },
                    backPhoto: {
                        src: '',
                        description: 'Back',
                        file: null
                    },
                }
            },
            currentWeek: null,
            currentWeeklyAttachment: null,
            currentWeeklyAttachmentDetails: [],
            validation: {
                displayPosting: true,
                loading: false,
                success: {
                    message: null
                },
                errors: null
            },
            // carousel settings
            settings: {
                itemsToShow: 3,
                snapAlign: 'start',
            },
            // breakpoints are mobile first
            // any settings not specified will fallback to the carousel settings
            breakpoints: {
                0: {
                    itemsToShow: 1.4,
                    snapAlign: 'start',
                },
                768: {
                    itemsToShow: 2.4,
                    snapAlign: 'start',
                },
                992: {
                    itemsToShow: 3,
                    snapAlign: 'start',
                },
            },
        }
    },
    props: ['user'],
    mounted() {        
        this.getCurrentWeek();
    },
    methods: {
        getCurrentWeek() {
            let self = this;
            
            axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'current_week' 
                }, 
                headers: {
                    Authorization: `Bearer ${tokenStore.accessToken}`,
                },
            })
            .then(response => {
                self.currentWeek = response.data.data;
            });
        },
        getDesiredWeightGoalPercentage(max: number) {
            let desiredWeightGoalPercentage = 0;
            if(this.currentWeeklyAttachment) {
                desiredWeightGoalPercentage = parseFloat(this.currentWeeklyAttachment.attributes.desired_weight_goal_percentage);
            } else {
                desiredWeightGoalPercentage = parseFloat(this.user.attributes.desired_weight_goal_percentage);
            }

            let product = max * desiredWeightGoalPercentage;

            return product / 100;
        },
        getToLocaleDateNowString() {
            localeStore.setToLocaleDateNowString();

            return localeStore.toLocaleDateNowString;
        },
        getToLocaleDateString(dateString: string) {
            localeStore.setToLocaleDateString(dateString);

            return localeStore.toLocaleDateString;
        },
        handleFileFrontPhotoAttachment(event: any) {
            const file = event.target.files[0];
            this.input.files.frontPhoto.src = URL.createObjectURL(file);
            this.input.files.frontPhoto.file = file;
        },
        handleFileSidePhotoAttachment(event: any) {
            const file = event.target.files[0];
            this.input.files.sidePhoto.src = URL.createObjectURL(file);
            this.input.files.sidePhoto.file = file;
        },
        handleFileBackPhotoAttachment(event: any) {
            const file = event.target.files[0];
            this.input.files.backPhoto.src = URL.createObjectURL(file);
            this.input.files.backPhoto.file = file;
        },
        parseInteger(weekNumber: any) {
            if(weekNumber) {
                return weekNumber
            }

            return 0;
        },
        storeWeeklyAttachments() {
            let self = this;

            self.validation.loading = true;

            axios.post(`${process.env.API_URL}/user-weekly-attachments`, {
                week_number: self.currentWeek.attributes.value,
                weight: self.input.weight,
                description: self.input.description
            }, {
                headers: {
                    Authorization: `Bearer ${tokenStore.accessToken}`,
                }
            })
            .then(function (response) {
                self.storeWeeklyAttachmentDetails(response.data.data);
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.errors = error.response.data.errors;
            });
        },
        storeWeeklyAttachmentDetails(weeklyAttachment: any) {
            var counter: number = 0;
            let self = this;
            
            const formData = new FormData();
            const object = this.input.files;
            for (const file in object) {
                formData.append('user_weekly_attachment_id', weeklyAttachment.id);
                formData.append('file_weekly_photo', object[file].file);
                formData.append('description', object[file].description);

                axios.post(`${process.env.API_URL}/user-weekly-attachment-details`, formData, {
                    headers: {
                        Authorization: `Bearer ${tokenStore.accessToken}`,
                    }
                })
                .then(function (response) {
                    self.currentWeeklyAttachmentDetails.push(response.data.data);

                    counter++;
                    if(counter === 3) {
                        self.validation.loading = false;
                        self.validation.errors = null;
                        self.validation.success.message = 'Successfully added!'

                        self.currentWeeklyAttachment = weeklyAttachment;

                        document.getElementById('app')?.scrollIntoView({ behavior: 'smooth' });
                    }
                })
                .catch(function (error) {
                    self.validation.loading = false;
                    self.validation.success.message = null;
                    self.validation.errors = error.response.data.errors;
                });
            }
        }
    }
}
</script>