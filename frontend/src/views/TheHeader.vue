<template>
    <header class="header_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <div class="header_mobile_menu">
                            <div id="nav-icon4" class="menu_icon" @click="toggleMenuIcon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="header_logo">
                            <a href="#"><img src="@/assets/images/logo.png" alt=""></a>
                        </div>
                        <div class="header_top_main">
                            <div class="header_top">
                                <div class="header_top_link">
                                    <ul>
                                        <li><a href="mailto:info@epictransformation.com"><i class="fas fa-envelope"></i>info@epictransformation.com</a></li>
                                        <li><a href="#"><i class="fab fa-telegram"></i>epictransformationchallenge</a></li>
                                    </ul>
                                </div>
                                <div class="header_top_dropdown">
                                    <ul>
                                        <li><a href="#"><img src="@/assets/images/notification.png" alt=""></a></li>
                                        <!-- <li><a href="#"><img src="@/assets/images/profile.png" alt=""></a></li> -->
                                    </ul>
                                </div>
                                <div class="dropdown htdropdown">
                                    <button class="btn btn-secondary dropdown-toggle" @click="toggleDropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- Dropdown button -->
                                    <img src="@/assets/images/profile.png" alt=""><i class="fas fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">item 1</a></li>
                                    <li><a class="dropdown-item" href="#">item 2</a></li>
                                    <li><a class="dropdown-item" href="#" style="color: #e82222;">log out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom">
            <div class="container">
                <div class="header_telegram_main">
                    <div class="header_telegram">
                        <p>Push Your Self to new heights with others</p>
                        <!-- <a href="#"><i class="fab fa-telegram-plane"></i>TELEGRAM</a> -->
                    </div>
                    <div class="header_tele_btn">
                        <a href="#"><img src="@/assets/images/telegram-btn.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script lang="ts">
import $ from 'jquery'

export default {
    components: {
    },
    data() {
        return
    },
    methods:{
        toggleMenuIcon() {
            $('.home_page_main_left_site').slideToggle(300)
		    $('.header_mobile_menu').toggleClass('menu_icon_fixed')
            $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').toggleClass('open')
        },
        toggleDropdown() {
		    $('.dropdown-toggle').toggleClass('show')
            $('.dropdown-menu').toggleClass('show')
        }
    }
}
</script>