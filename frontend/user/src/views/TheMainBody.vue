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
                        <the-main-sidebar :user="user" :currentWeeklyAttachment="weeklyAttachments?.data[0]"></the-main-sidebar>
                        
                        <!--####################### Start Right Site #######################-->
                        <div class="home_right_site">
                            <!-- Start Time Remaining Section -->
                            <div class="right_site_header">
                                <h4>This Week’s Post</h4>
                                <p>{{ getToLocaleDateNowString() }}</p>
                            </div>
                            <div id="posting" class="right_site_time_remaining_main mb-4">
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
                            </div>
                            <!-- End Time Remaining Section -->
                            
                            <div v-if="validation.success.message" class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
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

                            <!-- Start Posting Section -->
                            <template v-if="validation.displayPosting">
                                <template v-if="parseInt(currentWeek?.value) > parseInteger(user?.latest_weekly_attachments?.week_number) 
                                                && parseInt(currentWeek?.value) > parseInteger(weeklyAttachments?.data[0].week_number)
                                                || validation.editPosting">
                                    <div class="right_site_time_remaining_main">
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
                                                <h4>Week {{ currentWeek?.value }}</h4>
                                                <p>{{ currentWeekDescription?.value }}</p>
                                            </div>
                                            <div class="rsrbc_form">
                                                <div class="rsrbc_form_box">
                                                    <label for="rsrtc1">Enter Current Weight</label>
                                                    <div class="input_rtext">
                                                        <input v-model="input.weight" type="text" id="rsrtc1">
                                                        <p>lbs</p>
                                                    </div>
                                                </div>
                                                <div class="rsrbc_form_box">
                                                    <label for="rsrtc2">How did you feel this week? (Journal any notes about your journey here)</label>
                                                    <div class="input_rtext input_rtext2">
                                                        <input v-model="input.description" type="text" id="rsrtc2">
                                                    </div>
                                                </div>
                                                <div v-if="validation.editPosting" class="rsrbc_form_btn">
                                                    <div class="row">
                                                        <div class="col-md-8 pb-4">
                                                            <input v-if="!validation.loading" :disabled="input.weight === '' 
                                                                    || input.description === '' 
                                                                    || input.files.frontPhoto.src === ''
                                                                    || input.files.sidePhoto.src === ''
                                                                    || input.files.backPhoto.src === ''" @click="updateWeeklyAttachments" type="submit" value="UPDATE">
                                                            <button v-if="validation.loading" type="submit" disabled>
                                                                <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                                                                Loading...
                                                            </button>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input @click='cancelEditPosting' style="background: #f52e62 !important;" type="submit" value="CANCEL">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-else class="rsrbc_form_btn">
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
                                </template>
                            </template>
                            <!-- End Posting Section -->

                            <!-- Start Week Carousel Section -->
                            <template v-for="weeklyAttachment in weeklyAttachments?.data" :key="weeklyAttachment">
                                <template v-if="selectedWeeklyAttachmentId != weeklyAttachment.id">
                                    <div class="right_site_week_carousel_main">
                                        <div class="rs_week_items_all_carousel">
                                            <div class="rswiac_header">
                                                <div class="d-flex justify-content-between">
                                                    <h4 :class="{ 'mb-3' : !weeklyAttachment.lock, 'ml-2' : !weeklyAttachment.lock }">
                                                        <img v-if="weeklyAttachment.lock" src="@/assets/images/lock.png" alt="">
                                                        {{ getToLocaleDateString(weeklyAttachment.created_at) }}
                                                    </h4>
                                                    <div class="rsrbc_form_btn mt-0 mb-4" style="width: 100px;" v-if="!weeklyAttachment.lock && validation.displayPosting">
                                                        <button @click="editWeeklyAttachment(weeklyAttachment.id)" class="float-right" style="height: 40px;" type="submit">
                                                            {{ validation.loading ? 'Loading...' : 'Edit' }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <carousel :settings="settings" :breakpoints="breakpoints">
                                                <slide v-for="weeklyAttachmentDetail in weeklyAttachment.weekly_attachment_details" :key="weeklyAttachmentDetail">
                                                    <div class="rswi_item_single">
                                                        <div class="rswi_item_single_img">
                                                            <div class="rswi_item_single_img_pos">
                                                                <img :src="weeklyAttachmentDetail.url" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="rswi_item_single_contents">
                                                            <p>{{ weeklyAttachmentDetail.description  }}</p>
                                                        </div>
                                                    </div>
                                                </slide>
                                                <template #addons>
                                                    <pagination />
                                                </template>
                                            </carousel>
                                            <div class="rs_week_bottom_contents">
                                                <h4>Week {{ weeklyAttachment.week_number }}</h4>
                                                <div class="rswbc_parag">
                                                    <p>Weight: {{ weeklyAttachment.weight }}lbs</p>
                                                    <p>{{ weeklyAttachment.description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </template>
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
import TheMainSidebar from './TheMainSidebar.vue'
import TheCountdownTimer from './TheCountdownTimer.vue'

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import axios from 'axios';
import { userAuth, userLocale } from '../stores/index';
const authStore = userAuth();
const localeStore = userLocale();

export default {
    components: {
        ContentLoader,
        TheMainSidebar,
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
                        id: '',
                        src: '',
                        description: 'Front',
                        file: null
                    },
                    sidePhoto: {
                        id: '',
                        src: '',
                        description: 'Side',
                        file: null
                    },
                    backPhoto: {
                        id: '',
                        src: '',
                        description: 'Back',
                        file: null
                    },
                }
            },
            currentWeek: null,
            currentWeekDescription: null,
            weeklyAttachments: null,
            selectedWeeklyAttachmentId: '',
            validation: {
                editPosting: false,
                displayPosting: true,
                loading: false,
                success: {
                    message: null
                },
                errors: null
            },
            pagination: {
                current: 1,
                limit: 10
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
        this.getUserWeeklyAttachments();
    },
    methods: {
        getCurrentWeek() {
            let self = this;
            
            axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: 'current_week' 
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
            .then(response => {
                self.currentWeek = response.data.data;
                self.getCurrentWeekDescription(self.currentWeek);
            });
        },
        getCurrentWeekDescription(currentWeek: any) {
            let self = this;
            
            axios.get(`${process.env.API_URL}/option-get-value-by-name`, {
                params: { 
                    name: `week${currentWeek.value}_description`
                }, 
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
            })
            .then(response => {
                self.currentWeekDescription = response.data.data;
            });
        },
        getUserWeeklyAttachments() {
            let self = this;

            axios.get(`${process.env.API_URL}/user-weekly-attachments`, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
                params: {
                    page: self.pagination.current,
                    limit: self.pagination.limit,
                    user_id: authStore.userId
                }
            })
            .then(response => {
                self.weeklyAttachments = response.data;
            })
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
                week_number: self.currentWeek.value,
                weight: self.input.weight,
                description: self.input.description
            }, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                }
            })
            .then(function (response) {
                self.storeWeeklyAttachmentDetails(response.data.data);
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.errors = error.response.data.errors;
                    
                document.getElementById('app')?.scrollIntoView({ behavior: 'smooth' });
            });
        },
        storeWeeklyAttachmentDetails(weeklyAttachment: any) {
            let counter: number = 0;
            let newWeeklyAttachment = weeklyAttachment;

            let self = this;
            
            const formData = new FormData();
            const object = this.input.files;
            for (const file in object) {
                formData.append('user_weekly_attachment_id', weeklyAttachment.id);
                formData.append('file_weekly_photo', object[file].file);
                formData.append('description', object[file].description);

                axios.post(`${process.env.API_URL}/user-weekly-attachment-details`, formData, {
                    headers: {
                        Authorization: `Bearer ${authStore.accessToken}`,
                    }
                })
                .then(function (response) {
                    newWeeklyAttachment.weekly_attachment_details.push(response.data.data);

                    counter++;
                    if(counter === 3) {
                        self.validation.editPosting = false;
                        self.validation.loading = false;
                        self.validation.errors = null;
                        self.validation.success.message = 'Successfully added!'

                        self.weeklyAttachments.data.unshift(newWeeklyAttachment);

                        document.getElementById('app')?.scrollIntoView({ behavior: 'smooth' });
                    }
                })
                .catch(function (error) {
                    self.validation.loading = false;
                    self.validation.success.message = null;
                    self.validation.errors = error.response.data.errors;
                });
            }
        },
        findWeeklyAttachmentDetailsRecord(key: string, heystack: any, needle: string) {
            let response = heystack.filter((el: any) => {
                return el[key] == needle;
            })[0];

            return response;
        },
        editWeeklyAttachment(id: number) {
            this.validation.errors = null;
            this.validation.success.message = null;
            this.validation.displayPosting = true;
            this.validation.editPosting = true;

            let selectedWeeklyAttachment = this.findWeeklyAttachmentDetailsRecord('id', this.weeklyAttachments.data, id);
            this.selectedWeeklyAttachmentId = selectedWeeklyAttachment.id;
            this.input.weight = selectedWeeklyAttachment.weight;
            this.input.description = selectedWeeklyAttachment.description;
            
            let weeklyAttachmentDetails = selectedWeeklyAttachment.weekly_attachment_details;

            let selectedFrontPhoto = this.findWeeklyAttachmentDetailsRecord('description', weeklyAttachmentDetails, 'Front');
            this.input.files.frontPhoto.id = selectedFrontPhoto.id;
            this.input.files.frontPhoto.src = selectedFrontPhoto.url;

            let selectedSidePhoto = this.findWeeklyAttachmentDetailsRecord('description', weeklyAttachmentDetails, 'Side');
            this.input.files.sidePhoto.id = selectedSidePhoto.id;
            this.input.files.sidePhoto.src = selectedSidePhoto.url;

            let selectedBackPhoto = this.findWeeklyAttachmentDetailsRecord('description', weeklyAttachmentDetails, 'Back');
            this.input.files.backPhoto.id = selectedBackPhoto.id;
            this.input.files.backPhoto.src = selectedBackPhoto.url;

            document.getElementById('posting')?.scrollIntoView({ behavior: 'smooth' });
        },
        cancelEditPosting() {
            this.validation.editPosting = false;
            this.selectedWeeklyAttachmentId = '';

            document.getElementById('app')?.scrollIntoView({ behavior: 'smooth' });
        },
        updateWeeklyAttachments() {
            let self = this;

            self.validation.loading = true;

            axios.put(`${process.env.API_URL}/user-weekly-attachments/${self.selectedWeeklyAttachmentId}`, {
                week_number: self.currentWeek.value,
                weight: self.input.weight,
                description: self.input.description
            }, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                }
            })
            .then(function (response) {
                //Remove the object on the array via id key
                let index = self.weeklyAttachments?.data.findIndex(obj => obj.id === response.data.data.id);
                if (index !== -1) {
                    self.weeklyAttachments?.data.splice(index, 1);
                }

                self.updateWeeklyAttachmentDetails(response.data.data);
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.errors = error.response.data.errors;
                    
                document.getElementById('app')?.scrollIntoView({ behavior: 'smooth' });
            });
        },
        updateWeeklyAttachmentDetails(weeklyAttachment: any) {
            let counter: number = 0;
            let newWeeklyAttachment = weeklyAttachment;
            newWeeklyAttachment.weekly_attachment_details = [];

            let self = this;
            
            const formData = new FormData();
            const object = this.input.files;
            for (const file in object) {
                
                formData.append('_method', 'PUT');
                formData.append('user_weekly_attachment_id', weeklyAttachment.id);
                if(object[file].file) {
                    formData.append('file_weekly_photo', object[file].file);
                }
                formData.append('description', object[file].description);

                axios.post(`${process.env.API_URL}/user-weekly-attachment-details/${object[file].id}`, formData, {
                    headers: {
                        Authorization: `Bearer ${authStore.accessToken}`,
                    }
                })
                .then(function (response) {
                    newWeeklyAttachment.weekly_attachment_details.push(response.data.data);

                    counter++;
                    if(counter === 3) {
                        self.validation.editPosting = false;
                        self.validation.loading = false;
                        self.validation.errors = null;
                        self.validation.success.message = 'Successfully updated!'

                        self.weeklyAttachments.data.unshift(newWeeklyAttachment);
                        self.selectedWeeklyAttachmentId = '';

                        document.getElementById('app')?.scrollIntoView({ behavior: 'smooth' });
                    }
                })
                .catch(function (error) {
                    self.validation.loading = false;
                    self.validation.success.message = null;
                    self.validation.errors = error.response.data.errors;
                    
                    document.getElementById('app')?.scrollIntoView({ behavior: 'smooth' });
                });
            }
        }
    }
}
</script>