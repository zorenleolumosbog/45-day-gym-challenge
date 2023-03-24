<template>
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

export default {
    props: ['user', 'currentWeeklyAttachment'],
    methods: {
        getDesiredWeightGoalPercentage(min: number, max: number) {
            let desiredWeightGoalPercentage = 0;
            if(this.currentWeeklyAttachment) {
                if(this.user.attributes.profile.desired_weight_goal > this.currentWeeklyAttachment.attributes.weight) {
                    return max;
                }
                desiredWeightGoalPercentage = parseFloat(this.currentWeeklyAttachment.attributes.desired_weight_goal_percentage);
            } else {
                if(this.user.attributes.profile.desired_weight_goal > this.user?.attributes.weekly_attachments[0]?.weight) {
                    return max;
                }
                desiredWeightGoalPercentage = parseFloat(this.user.attributes.desired_weight_goal_percentage);
            }

            return (desiredWeightGoalPercentage / 100) * (max - min) + min;
        }
    }
}
</script>