<template>
    <header class="header_main">
        <div class="px-5">
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
                                        <li><a @click="changePassword" data-toggle="modal" data-target="#changePasswordModal" class="dropdown-item text-left" href="javascript:void(0)">Change Password</a></li>
                                        <li><a @click="logout" class="d-flex dropdown-item text-left" href="javascript:void(0)" style="color: #e82222;">Log Out</a></li>
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
            </div>
        </div>
        <teleport to="body">
            <!-- Modal -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle" >Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="h1">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="register_page_form mx-4">
                            <div v-if="validation.success.message" class="alert alert-success alert-dismissible fade show" role="alert">
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
                            <div class="rp_form_single">
                                <label for="rpfs2">Current Password</label>
                                <input type="password" v-model="input.currentPassword" placeholder="Current Password">
                            </div>
                            <div class="rp_form_single">
                                <label for="rpfs3">New Password</label>
                                <input type="password" v-model="input.newPassword" placeholder="New Password">
                            </div>
                            <div class="rp_form_single">
                                <label for="rpfs3">Confirm New Password</label>
                                <input type="password" v-model="input.newPasswordConfirmation" placeholder="Confirm New Password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="register_page_form_btn">
                            <input :disabled="input.currentPassword === '' || input.newPassword === ''" v-if="!validation.loading" type="submit" @click="saveNewPassword" value="Save">
                            <button v-if="validation.loading" type="submit" disabled>
                                <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                        <div class="register_page_form_btn cancel">
                            <input type="submit" data-dismiss="modal" value="Cancel">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </teleport>
    </header>
</template>

<script lang="ts">
import $ from 'jquery'
import axios from 'axios';
import { userAuth } from '../stores/index';
const authStore = userAuth();

export default {
    components: {
    },
    data() {
        return {
            input: {
                currentPassword: '',
                newPassword: '',
                newPasswordConfirmation: '',
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
    methods:{
        toggleMenuIcon() {
            $('.home_page_main_left_site').slideToggle(300)
		    $('.header_mobile_menu').toggleClass('menu_icon_fixed')
            $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').toggleClass('open')
        },
        toggleDropdown() {
		    $('.dropdown-toggle').toggleClass('show')
            $('.dropdown-menu').toggleClass('show')
        },
        logout() {
            let self = this;

            self.$router.push({ name: 'login' });
            
            axios.get(`${process.env.API_URL}/logout`, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
            .then(response => {
                localStorage.clear();
            })
        },
        changePassword() {
            $('.dropdown-toggle').removeClass('show')
            $('.dropdown-menu').removeClass('show')
        },
        saveNewPassword() {
		    let self = this;

            self.validation.loading = true;
            axios.patch(`${process.env.API_URL}/users/${self.user.id}`, {
                current_password: self.input.currentPassword,
                new_password: self.input.newPassword,
                new_password_confirmation: self.input.newPasswordConfirmation,
            }, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                }
            })
            .then(function (response) {
                self.validation.loading = false;
                self.validation.errors = null;
                self.validation.success.message = 'Password changed successfully!.'

                self.input.currentPassword = '';
                self.input.newPassword = '';
                self.input.newPasswordConfirmation = '';
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.success.message = null;
                self.validation.errors = error.response.data.errors;
            });
        }
    }
}
</script>