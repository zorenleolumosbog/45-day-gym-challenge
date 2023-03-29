<template>
    <!--####################### Start Left Site #######################-->
    <div class="home_page_main_left_site">
        <div class="home_left_site">
            <div class="left_site_meter">
                <div class="left_site_meter_top">
                    <h4>Weight Loss Goal</h4>
                    <p>{{ currentWeeklyAttachment 
                            ? currentWeeklyAttachment?.weight
                            : user?.latest_weekly_attachments?.weight 
                            ? user?.latest_weekly_attachments?.weight : user?.profile.current_weight }}lbs <span>/ {{ user?.profile.desired_weight_goal }}lbs</span></p>
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
                                <div id="bar" class="circle" v-bind:style="{transform: 'rotate(' + getDesiredWeightGoalPercentage(180, 360) + 'deg)'}"></div>
                                <span class="text">Hello</span>
                            </div>
                        </div>
                        <!-- 0deg is 0% -->
                        <!-- 220deg is 100% -->
                        <div class="wrapper_meter" v-bind:style="{transform: 'rotate(' + getDesiredWeightGoalPercentage(0, 220) + 'deg)'}">
                            <img src="@/assets/images/meter-bar.png" alt="">
                        </div>
                    </div>
                </div>
                <div v-if="getDesiredWeightGoalPercentage(0, 100) == 100" class="left_site_meter_content">
                    <p><i class="far fa-check-circle"></i>Good Work, You are on track to weight loss goal.</p>
                </div>
            </div>

            <div class="left_site_bottom_conts">
                <div class="left_site_menu">
                    <ul>
                        <li><a href="#" class="lsm_active">
                            <span class="lsmmw">
                                <img src="@/assets/images/home.png" alt="">
                                <span>Home</span>
                            </span>
                        </a></li>
                        <li><a :href="linkWeeklyPhotos">
                            <span class="lsmmw">
                                <img src="@/assets/images/weekly.png" alt="">
                                <span>Weekly Photos</span>
                            </span>
                        </a></li>
                        <li><a :href="linkDailyRoutine">
                            <span class="lsmmw">
                                <img src="@/assets/images/daily.png" alt="">
                                <span>Daily Routine</span>
                            </span>
                        </a></li>
                        <li><a :href="linkWeightCalculator">
                            <span class="lsmmw">
                                <img src="@/assets/images/weight.png" alt="">
                                <span>Weight Calculator</span>
                            </span>
                        </a></li>
                        <li><a :href="linkTelegram">
                            <span class="lsmmw">
                                <img src="@/assets/images/telegram.png" alt="">
                                <span>Telegram</span>
                            </span>
                        </a></li>
                        <li><a :href="linkBlog">
                            <span class="lsmmw">
                                <img src="@/assets/images/blog.png" alt="">
                                <span>Blog</span>
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
                            <li><a :href="linkAbout">About</a></li>
                            <li><a :href="linkTelegram">Telegram Link</a></li>
                            <li><a :href="linkBlog">Blog</a></li>
                            <li><a :href="linkFaq">Faq</a></li>
                        </ul>
                    </div>

                    <div class="left_site_follow_us_main">
                        <div class="left_site_follow_us">
                            <p>Follow Us</p>
                            <ul>
                                <li><a :href="linkFacebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a :href="linkTwitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a :href="linkYoutube"><i class="fab fa-youtube"></i></a></li>
                                <li><a :href="linkLinkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="left_site_copyright">
                            <p>&copy; {{ new Date().getFullYear() }}. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--####################### End Left Site #######################-->
</template>

<script lang="ts">
import axios from 'axios';
import { userAuth } from '../stores/index';
const authStore = userAuth();

export default {
    data() {
        return {
            linkWeeklyPhotos: '',
            linkDailyRoutine: '',
            linkWeightCalculator: '',
            linkTelegram: '',
            linkBlog: '',
            linkAbout: '',
            linkFaq: '',
            linkFacebook: '',
            linkTwitter: '',
            linkYoutube: '',
            linkLinkedin: ''
        }
    },
    props: ['user', 'currentWeeklyAttachment'],
    mounted() {
        let self = this;

        Promise.all([
            self.getLinkWeeklyPhotos(), 
            self.getLinkDailyRoutine(), 
            self.getLinkWeightCalculator(), 
            self.getLinkTelegram(), 
            self.getBlog(), 
            self.getAbout(), 
            self.getFaq(),
            self.getFacebook(),
            self.getTwitter(),
            self.getYoutube(),
            self.getLinkedin()
        ])
        .then(function ([
            linkWeeklyPhotos, 
            linkDailyRoutine, 
            linkWeightCalculator, 
            linkTelegram, 
            linkBlog, 
            linkAbout,
            linkFaq,
            linkFacebook,
            linkTwitter,
            linkYoutube,
            linkLinkedin
        ]) {
            self.linkWeeklyPhotos = linkWeeklyPhotos.data.data.value;
            self.linkDailyRoutine = linkDailyRoutine.data.data.value;
            self.linkWeightCalculator = linkWeightCalculator.data.data.value;
            self.linkTelegram = linkTelegram.data.data.value;
            self.linkBlog = linkBlog.data.data.value;
            self.linkAbout = linkAbout.data.data.value;
            self.linkFaq = linkFaq.data.data.value;
            self.linkFacebook = linkFacebook.data.data.value;
            self.linkTwitter = linkTwitter.data.data.value;
            self.linkYoutube = linkYoutube.data.data.value;
            self.linkLinkedin = linkLinkedin.data.data.value;
        });
    },
    methods: {
        getLinkWeeklyPhotos() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_weekly_photos' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getLinkDailyRoutine() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_daily_routine' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getLinkWeightCalculator() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_weight_calculator' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getLinkTelegram() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_telegram' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getBlog() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_blog' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getAbout() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_about' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getFaq() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_faq' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getFacebook() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_facebook' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getTwitter() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_twitter' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getYoutube() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_youtube' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getLinkedin() {
            return axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'link_linkedin' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
        },
        getDesiredWeightGoalPercentage(min: number, max: number) {
            let desiredWeightGoalPercentage = 0;
            if(this.currentWeeklyAttachment) {
                if(this.user.profile.desired_weight_goal > this.currentWeeklyAttachment.weight) {
                    return max;
                }
                desiredWeightGoalPercentage = parseFloat(this.currentWeeklyAttachment.desired_weight_goal_percentage);
            } else {
                if(this.user.profile.desired_weight_goal > this.user?.latest_weekly_attachments?.weight) {
                    return max;
                }
                desiredWeightGoalPercentage = parseFloat(this.user.desired_weight_goal_percentage);
            }

            return (desiredWeightGoalPercentage / 100) * (max - min) + min;
        }
    }
}
</script>