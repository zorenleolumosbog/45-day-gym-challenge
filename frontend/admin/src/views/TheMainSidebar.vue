<template>
    <!--####################### Start Left Site #######################-->
    <div class="home_page_main_left_site">
        <div class="home_left_site">
            <div class="left_site_bottom_conts">
                <div class="left_site_menu">
                    <ul>
                        <li>
                            <router-link to="/users" @click="setComponent('the-user')">
                                <span class="lsmmw">
                                    <img src="@/assets/images/Profile.png" alt="">
                                    <span>Users</span>
                                </span> 
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/telegram-links" @click="setComponent('the-telegram-link')">
                                <span class="lsmmw">
                                    <img src="@/assets/images/telegram.png" alt="">
                                    <span>Telegram Links</span>
                                </span>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/options" @click="setComponent('the-option')">
                                <span class="lsmmw">
                                    <img src="@/assets/images/weight.png" alt="">
                                    <span>Options</span>
                                </span>
                            </router-link>
                        </li>
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
import $ from 'jquery'

export default {
    mounted() {
        switch (this.$route.name) {
            case 'users':
                this.$emit('component', 'the-user');
                break;
            case 'telegram-links':
                this.$emit('component', 'the-telegram-link');
                break;
            case 'options':
                this.$emit('component', 'the-option');
                break;
        
            default:
                break;
        }
    },
    methods: {
        setComponent(selectedComponent: string) {
            $('.home_page_main_left_site').slideToggle(300)
		    $('.header_mobile_menu').toggleClass('menu_icon_fixed')
            $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').toggleClass('open')

            this.$emit('component', selectedComponent);
        }
    }
}
</script>