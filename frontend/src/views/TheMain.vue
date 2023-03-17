<template>
    <the-header></the-header>
    <div class="home_page_main_section_parent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home_page_section_main">
                        <!--####################### Start Left Site #######################-->
                        <div class="home_page_main_left_site">
                            <div class="home_left_site">
                                <div class="left_site_meter">
                                    <div class="left_site_meter_top">
                                        <h4>Weigh Loss Goal</h4>
                                        <p>30lb <span>/ 24lb</span></p>
                                    </div>
                                    <div class="left_site_meter_progress">
                                        <!-- <div class="left_site_meter_progress_img">
                                            <img src="@/assets/images/meter.png" alt="">
                                        </div> -->
                                        <div class="wrapper_main">
                                            <div class="wrapper">  
                                                <div class="circle-out">
                                                    <div id="bar" class="circle" style="transform: rotate(-72deg);"></div>
                                                    <span class="text">Hello</span>
                                                </div>
                                            </div>
                                            <div class="wrapper_meter">
                                                <img src="@/assets/images/meter-bar.png" alt="">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="left_site_meter_content">
                                        <p><i class="far fa-check-circle"></i>Good Work, You are on track to to lose 30kb</p>
                                    </div>
                                </div>

                                <div class="left_site_bottom_conts">
                                    <div class="left_site_menu">
                                        <ul>
                                            <li><a href="#" class="lsm_active">
                                                <span class="lsmmw">
                                                    <img src="@/assets/images/home.png" alt="">
                                                    <span>Home Alexa Snowe</span>
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
                                                <li><a href="#">Telegram Link</a></li>
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
                            <div class="right_site_header">
                                <h4>This Week’s Post</h4>
                                <p>March 6, 2023</p>
                            </div>
                            <!-- Start Time Remaining Section -->
                            <div class="right_site_time_remaining_main">
                                <div class="rstremaining_time_remaining">
                                    <div class="rstremaining_trem_left">
                                        <div class="rstremaining_treml_text">
                                            <h4>You Have  </h4>
                                        </div>
                                        <div class="rstremaining_treml_time">
                                            <div id="countdown">
                                                <div class="countdown_single">
                                                    <div class="countdown" id="days">00</div>
                                                    <div class="rs_countdown_text_pos">
                                                        <p>Days</p>
                                                    </div>
                                                </div>
                                                <div class="countdown_single">
                                                    <div class="countdown" id="hours">00</div>
                                                    <div class="rs_countdown_text_pos">
                                                        <p>Hours</p>
                                                    </div>
                                                </div>
                                                <div class="countdown_single">
                                                    <div class="countdown" id="minutes">00</div>
                                                    <div class="rs_countdown_text_pos">
                                                        <p>Minutes</p>
                                                    </div>
                                                </div>
                                                <div class="countdown_single">
                                                    <div class="countdown" id="seconds">00</div>
                                                    <div class="rs_countdown_text_pos">
                                                        <p>Seconds</p>
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <img src="@/assets/images/people1.png" alt="">
                                                </div>
                                            </div>
                                            <div class="rsup_item_single_upload">
                                                <p>Upload Your <span>Front Photo</span></p>
                                                <div class="cnasfu_upload">
                                                        <input type="file" id="file">
                                                        <label for="file"> <span><img src="@/assets/images/upload.png" alt=""></span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rsup_item_single">
                                            <div class="rsup_item_single_img">
                                                <div class="rsup_item_single_img_pos">
                                                    <img src="@/assets/images/people2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="rsup_item_single_upload">
                                                <p>Upload Your <span>Side Photo</span></p>
                                                <div class="cnasfu_upload">
                                                        <input type="file" id="file2">
                                                        <label for="file2"> <span><img src="@/assets/images/upload.png" alt=""></span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rsup_item_single">
                                            <div class="rsup_item_single_img">
                                                <div class="rsup_item_single_img_pos">
                                                    <img src="@/assets/images/people3.png" alt="">
                                                </div>
                                            </div>
                                            <div class="rsup_item_single_upload">
                                                <p>Upload Your <span>Back Photo</span></p>
                                                <div class="cnasfu_upload">
                                                        <input type="file" id="file3">
                                                        <label for="file3"> <span><img src="@/assets/images/upload.png" alt=""></span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                                <div class="right_site_remaining_bottom_contents">
                                    <div class="rsrbc_header">
                                        <h4>Week 3</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                    <div class="rsrbc_form">
                                        <form>
                                            <div class="rsrbc_form_box">
                                                <label for="rsrtc1">Enter Current Weight <span>(Pounds/lb)</span></label>
                                                <div class="input_rtext">
                                                    <input type="text" id="rsrtc1">
                                                    <p>lb</p>
                                                </div>
                                            </div>
                                            <div class="rsrbc_form_box">
                                                <label for="rsrtc2">Wirte Notes</label>
                                                <div class="input_rtext input_rtext2">
                                                    <input type="text" id="rsrtc2">
                                                </div>
                                            </div>
                                            <div class="rsrbc_form_btn">
                                                <input type="submit" value="POST">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Time Remaining Section -->

                            <!-- Start Week Carousel Section -->
                            <div class="right_site_week_carousel_main">
                                <div class="rs_week_items_all_carousel">
                                    <div class="rswiac_header">
                                        <h4><img src="@/assets/images/lock.png" alt="">Feb 27, 2023</h4>
                                    </div>
                                    <carousel :settings="settings" :breakpoints="breakpoints">
                                        <slide v-for="slide in 3" :key="slide">
                                            <div class="rswi_item_single">
                                                <div class="rswi_item_single_img">
                                                    <div class="rswi_item_single_img_pos">
                                                        <img src="https://i.postimg.cc/WbvY0Yp8/female1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="rswi_item_single_contents">
                                                    <p>Front</p>
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
                                        <h4>Week 2</h4>
                                        <div class="rswbc_parag">
                                            <p>Weight: 34LB</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            <a href="#">More...</a>
                                        </div>
                                        <div class="rswbc_share">
                                            <span><a href="#"><i class="fas fa-share"></i>Share</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Week Carousel Section -->

                            <!-- Start Week Carousel Section -->
                            <div class="right_site_week_carousel_main">
                                <div class="rs_week_items_all_carousel">
                                    <div class="rswiac_header">
                                        <h4><img src="@/assets/images/lock.png" alt="">Feb 20, 2023</h4>
                                    </div>
                                    <carousel :settings="settings" :breakpoints="breakpoints">
                                        <slide v-for="slide in 5" :key="slide">
                                            <div class="rswi_item_single">
                                                <div class="rswi_item_single_img">
                                                    <div class="rswi_item_single_img_pos">
                                                        <img src="https://i.postimg.cc/WbvY0Yp8/female1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="rswi_item_single_contents">
                                                    <p>Front</p>
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
                                        <h4>Week 1</h4>
                                        <div class="rswbc_parag">
                                            <p>Weight: 34LB</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

import TheHeader from './TheHeader.vue'
export default {
    components: {
        TheHeader,
        Carousel,
        Slide,
        Pagination,
        Navigation
    },
    data() {
        return {
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
    }
}
</script>