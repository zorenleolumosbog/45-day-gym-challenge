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
                                        <li><a @click="toggleDropdown(); setProfile();" data-toggle="modal" data-target="#profileModal" class="dropdown-item text-left" href="javascript:void(0)">Profile</a></li>
                                        <li><a @click="toggleDropdown" data-toggle="modal" data-target="#changePasswordModal" class="dropdown-item text-left" href="javascript:void(0)">Change Password</a></li>
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
                <div class="header_telegram_main">
                    <div class="header_telegram">
                        <p>Push Your Self to new heights with others</p>
                        <!-- <a href="#"><i class="fab fa-telegram-plane"></i>TELEGRAM</a> -->
                    </div>
                    <div class="header_tele_btn">
                        <a target="_blank" :href="user?.telegram_link ? user?.telegram_link.link  : user?.telegram_link_url"><img src="@/assets/images/telegram-btn.png" alt=""></a>
                    </div>
                </div>
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
                            <input :disabled="input.currentPassword === '' || input.newPassword === ''" v-if="!validation.loading" type="submit" @click="saveNewPassword" value="Update">
                            <button v-if="validation.loading" type="submit" disabled>
                                <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                        <div class="register_page_form_btn cancel">
                            <input type="submit" data-dismiss="modal" value="Close">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </teleport>
        <teleport to="body">
            <!-- Modal -->
            <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle" >Profile</h4>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Name</label>
                                                    <input type="text" v-model="input.name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Email</label>
                                                    <input type="text" readonly :value="user?.email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Gender</label>
                                                    <select v-model="input.gender">
                                                        <option v-for="gender in selectOptions.gender" :key="gender" :value="gender">
                                                            {{ gender }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Height(ft)</label>
                                                    <input type="text" v-model="input.height">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Current Weight(lbs)</label>
                                                    <input type="number" v-model="input.currentWeight">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Desired Weight Goal(lbs)</label>
                                                    <input type="number" v-model="input.desiredWeightGoal">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Stress Level</label>
                                                    <select v-model="input.stressLevelOutOf10">
                                                        <option v-for="stressLevelOutOf10 in selectOptions.stressLevelOutOf10" :key="stressLevelOutOf10" :value="stressLevelOutOf10">
                                                            {{ stressLevelOutOf10 }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Hours of Sleep at Night</label>
                                                    <select v-model="input.hoursOfSleepAtNight">
                                                        <option v-for="hoursOfSleepAtNight in selectOptions.hoursOfSleepAtNight" :key="hoursOfSleepAtNight" :value="hoursOfSleepAtNight">
                                                            {{ hoursOfSleepAtNight }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rp_form_single mb-4">
                                                    <label for="rpfs3">Gym Experience</label>
                                                    <select v-model="input.gymExperience">
                                                        <option v-for="gymExperience in selectOptions.gymExperience" :key="gymExperience" :value="gymExperience">
                                                            {{ gymExperience }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mic_single mb-4">
                                                    <label for="rpfs3">Medications Supplements</label>
                                                    <textarea v-model="input.medicationsSupplements"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mic_single mb-4">
                                                    <label for="rpfs3">Injuries Illnesses</label>
                                                    <textarea v-model="input.injuriesIllnesses"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="register_page_form_btn">
                                <input v-if="!validation.loading" type="submit" @click="update" value="Update">
                                <button v-if="validation.loading" type="submit" disabled>
                                    <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>
                            <div class="register_page_form_btn cancel">
                                <input type="submit" data-dismiss="modal" value="Close">
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
    data() {
        return {
            input: {
                currentPassword: '',
                newPassword: '',
                newPasswordConfirmation: '',
                name: '',
                gender: '',
                age: '',
                height: '',
                currentWeight: '',
                desiredWeightGoal: '',
                gymExperience: '',
                hoursOfSleepAtNight: '',
                stressLevelOutOf10: '',
                medicationsSupplements: '',
                injuriesIllnesses: ''
            },
            selectOptions : {
                gender: ['male', 'female'],
                stressLevelOutOf10: [1,2,3,4,5,6,7,8,9,10],
                hoursOfSleepAtNight: ['4-6 hours', '7-8 hours', '8 hours above'],
                gymExperience: ['less than 12 months', '12-36 months', '36 months and over']
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
                self.validation.success.message = 'Password changed successfully!'

                self.input.currentPassword = '';
                self.input.newPassword = '';
                self.input.newPasswordConfirmation = '';
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.success.message = null;
                self.validation.errors = error.response.data.errors;
            });
        },
        setProfile() {
            this.input.name = this.user?.name;
            this.input.gender = this.user?.profile.gender;
            this.input.age = this.user?.profile.age;
            this.input.height = this.user?.profile.height;
            this.input.currentWeight = this.user?.profile.current_weight;
            this.input.desiredWeightGoal = this.user?.profile.desired_weight_goal;
            this.input.gymExperience = this.user?.profile.gym_experience;
            this.input.hoursOfSleepAtNight = this.user?.profile.hours_of_sleep_at_night;
            this.input.stressLevelOutOf10 = this.user?.profile.stress_level_out_of_10;
            this.input.medicationsSupplements = this.user?.profile.medications_supplements;
            this.input.injuriesIllnesses = this.user?.profile.injuries_illnesses
        },
        update() {
            let self = this;

            self.validation.loading = true;
            self.validation.errors = null;
            
            Promise.all([self.updateUser(), self.updateUserProfile()])
            .then(function ([user, userProfile]) {
                if(userProfile && !self.validation.errors) {
                    self.validation.loading = false;
                    self.validation.errors = null;
                    self.validation.success.message = 'Profile changed successfully!';
                    
                    $("#profileModal").scrollTop(0);
                }
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.success.message = null;
                self.validation.errors = error.response.data.errors;
                    
                $("#profileModal").scrollTop(0);
            });
        },
        updateUser() {
            let self = this;
            return axios.put(`${process.env.API_URL}/users/${self.user.id}`, {
                    name: self.input.name
                }, {
                    headers: {
                        Authorization: `Bearer ${authStore.accessToken}`,
                    }
                });
        },
        updateUserProfile() {
            let self = this;
            return axios.put(`${process.env.API_URL}/user-profiles/${self.user.profile.id}`, {
                    gender: self.input.gender,
                    age: self.input.age,
                    height: self.input.height,
                    current_weight: self.input.currentWeight,
                    desired_weight_goal: self.input.desiredWeightGoal,
                    gym_experience: self.input.gymExperience,
                    hours_of_sleep_at_night: self.input.hoursOfSleepAtNight,
                    stress_level_out_of_10: self.input.stressLevelOutOf10,
                    medications_supplements: self.input.medicationsSupplements,
                    injuries_illnesses: self.input.injuriesIllnesses
                }, {
                    headers: {
                        Authorization: `Bearer ${authStore.accessToken}`,
                    }
                });
        },
        toggleMenuIcon() {
            $('.home_page_main_left_site').slideToggle(300)
		    $('.header_mobile_menu').toggleClass('menu_icon_fixed')
            $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').toggleClass('open')
        },
        toggleDropdown() {
		    $('.dropdown-toggle').toggleClass('show')
            $('.dropdown-menu').toggleClass('show')

            this.validation.errors = null;
            this.validation.success.message = null;
        }
    }
}
</script>