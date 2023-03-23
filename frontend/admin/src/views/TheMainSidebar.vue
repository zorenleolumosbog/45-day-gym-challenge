<template>
    <!--####################### Start Left Site #######################-->
    <div class="home_page_main_left_site">
        <div class="home_left_site">
            <div class="left_site_bottom_conts">
                <div class="left_site_menu">
                    <ul>
                        <li><a href="#" class="lsm_active">
                            <span class="lsmmw">
                                <img src="@/assets/images/home.png" alt="">
                                <span>Home</span>
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
    data() {
        return {

        }
    },
}
</script>