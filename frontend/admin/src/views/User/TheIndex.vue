<template>
    <!--####################### Start Right Site #######################-->
    <div class="home_right_site">
        <div class="right_site_header">
            <h4>Manage Users</h4>
            <p>{{ getToLocaleDateNowString() }}</p>
        </div>
        <!-- Start Time Remaining Section -->
        <div class="right_site_time_remaining_main">
            <div class="right_site_remaining_bottom_contents">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 rp_form_single mb-4 d-flex align-items-center">
                                <label for="rpfs3" class="mr-3 mt-3 w-50">Date From</label>
                                <input type="date" v-model="inputFilter.dateFrom">
                            </div>
                            <div class="col-md-6 rp_form_single mb-4 d-flex align-items-center">
                                <label for="rpfs3" class="mr-3 mt-3 w-50">Date To</label>
                                <input type="date" v-model="inputFilter.dateTo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rp_form_single mb-4 d-flex align-items-center">
                            <label for="rpfs3" class="mr-3 mt-3">Search</label>
                            <input type="text" placeholder="Search" v-model="inputFilter.search">
                            <div style="margin-left:-50px">
                                <img class="pe-auto" src="@/assets/images/telegram.png" @click="search">
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="validation.showTableLoader" style="margin-top: -22px; margin-left: -22px">
                    <table-loader></table-loader>
                </div>
                <div class="table-responsive mt-4">
                    <table v-if='!validation.showTableLoader && records' class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telegram Link</th>
                                <th scope="col">Last Login</th>
                                <th scope="col">Date Registered</th>
                                <th scope="col">View</th>
                                <th scope="col">Edit Tel. Link</th>
                                <!-- <th scope="col">Delete</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="record in records.data" :key="record">
                                <tr v-if="!record.attributes.is_admin">
                                    <th scope="row">{{ record.id }}</th>
                                    <td>{{ record.attributes.name }}</td>
                                    <td>{{ record.attributes.email }}</td>
                                    <td>
                                        <a target="_blank" class="telegram-link" :href="record.attributes.telegram_link ? record.attributes.telegram_link.link : null">
                                            {{ record.attributes.telegram_link?.link}}
                                        </a>
                                    </td>
                                    <td>{{ getToLocaleDateString(record.attributes.logged_in_at) }}</td>
                                    <td>{{ getToLocaleDateString(record.attributes.created_at) }}</td>
                                    <td>
                                        <button @click="getRecord(record.id); validation.showProfile = true;" type="submit" class="action-btn" data-toggle="modal">View</button>
                                    </td>
                                    <td>
                                        <button @click="getRecord(record.id)" type="submit" class="action-btn" data-toggle="modal" data-target="#addUserModal">Edit</button>
                                    </td>
                                    <!-- <td>
                                        <button @click="getRecord(record.id)" type="submit" class="action-btn" data-toggle="modal" data-target="#userDeleteModal">Delete</button>
                                    </td> -->
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <the-pagination class="mt-3 mb-3" v-if="records" :meta="records.meta" @currentPage="currentPage"></the-pagination>
                </div>
            </div>
        </div>
    </div>
    <!--####################### End Right Site #######################-->
    <teleport to="body">
        <!-- Modal -->
        <div v-if="validation.showProfile" class="modal fade show profile" style="display: block; overflow: scroll;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">View User Profile</h4>
                        <button @click="validation.showProfile = false" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="h1">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="register_page_form mx-4">
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Name</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Email</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Telegram Link</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.telegram_link?.link">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Gender</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.profile?.gender">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Height</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.profile?.height">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Current Weight</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.profile?.current_weight">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Desired Weight Goal</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.profile?.desired_weight_goal">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Stress Level</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.profile?.stress_level_out_of_10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Hours of Sleep at Night</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.profile?.hours_of_sleep_at_night">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rp_form_single mb-4">
                                                <label for="rpfs3">Gym Experience</label>
                                                <input type="text" readonly :value="selectedRecord?.attributes.profile?.gym_experience">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mic_single mb-4">
                                                <label for="rpfs3">Medications Supplements</label>
                                                <textarea readonly :value='selectedRecord?.attributes.profile?.medications_supplements'></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mic_single mb-4">
                                                <label for="rpfs3">Injuries Illnesses</label>
                                                <textarea readonly :value="selectedRecord?.attributes.profile?.injuries_illnesses"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <keep-alive>
                                        <weekly-attachment :weeklyAttachments="selectedRecord?.attributes.weekly_attachments"></weekly-attachment>
                                    </keep-alive>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="register_page_form_btn cancel">
                            <input @click="validation.showProfile = false" type="submit" data-dismiss="modal" value="Close">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
    <teleport to="body">
        <!-- Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User Telegram Link</h4>
                        <button @click="resetRecord" type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                            <div class="rp_form_single mb-4">
                                <label for="rpfs3">Name</label>
                                <input type="text" readonly :value="selectedRecord?.attributes.name">
                            </div>
                            <div class="rp_form_single mb-4">
                                <label for="rpfs3">Email</label>
                                <input type="text" readonly :value="selectedRecord?.attributes.email">
                            </div>
                            <div class="rp_form_single mb-4">
                                <label for="rpfs3">Enter Telegram Link</label>
                                <select v-model="input.telegramLinkId">
                                    <option :value="telegramRecord.id" v-for="telegramRecord in telegramRecords?.data" :key="telegramRecord">{{ telegramRecord.attributes.link }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="register_page_form_btn">
                            <input :disabled="input.telegramLinkId === ''" v-if="!validation.loading && selectedRecord" type="submit" @click="updateRecord" value="Update">
                            <button v-if="validation.loading" type="submit" disabled>
                                <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                        <div class="register_page_form_btn cancel">
                            <input @click="resetRecord" type="submit" data-dismiss="modal" value="Cancel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
    <teleport to="body">
        <!-- Modal -->
        <div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete User</h4>
                        <button @click="resetRecord" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="h1">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                        <div class="register_page_form mx-4">
                            <div class="rp_form_single mb-4">
                                <p>Are you sure you want to delete <strong>{{ selectedRecord?.attributes.name }}</strong>?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="register_page_form_btn">
                            <input v-if="!validation.loading && selectedRecord" type="submit" @click="deleteRecord" value="Delete">
                            <button v-if="validation.loading" type="submit" disabled>
                                <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                        <div class="register_page_form_btn cancel">
                            <input @click="resetRecord" type="submit" data-dismiss="modal" value="Cancel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
</template>

<script lang="ts">
import $ from 'jquery'
import axios from 'axios';
import { userAuth, userLocale, userSelectedRecord } from '../../stores/index';
const authStore = userAuth();
const selectedRecordStore = userSelectedRecord();
const localeStore = userLocale();

import WeeklyAttachment from './WeeklyAttachment.vue';

import TableLoader from '../../components/TableLoader.vue';
import InputLoader from '../../components/InputLoader.vue';
import ThePagination from '../../components/ThePagination.vue';

export default {
    components: {
        WeeklyAttachment,
        TableLoader,
        InputLoader,
        ThePagination
    },
    data() {
        return {
            input: {
                telegramLinkId: ''
            },
            inputFilter: {
                dateFrom: '',
                dateTo: '',
                search: ''
            },
            records: null,
            telegramRecords: null,
            selectedRecord: null,
            pagination: {
                current: 1,
                limit: 10
            },
            validation: {
                showProfile: false,
                loading: false,
                showTableLoader: false,
                success: {
                    message: null
                },
                errors: null
            }
        }
    },
    mounted() {
        this.getRecords();
        this.getTelegramRecords();
    },
    watch: {
        'inputFilter.dateFrom'(newVal, oldVal) {
            if(newVal !== oldVal) {
                this.getRecords();
            }
        },
        'inputFilter.dateTo'(newVal, oldVal) {
            if(newVal !== oldVal) {
                this.getRecords();
            }
        }
    },
    methods: {
        currentPage(val: number) {
            this.pagination.current = val;
            this.getRecords();
        },
        getToLocaleDateNowString() {
            localeStore.setToLocaleDateNowString();

            return localeStore.toLocaleDateNowString;
        },
        getToLocaleDateString(dateString: string) {
            if(!dateString) {
                return '';
            }

            const event = new Date(dateString);
            
            return event.toLocaleDateString(undefined, {  
                year: 'numeric', 
                month: 'short', 
                day: 'numeric' 
            });
        },
        resetRecord() {
            this.input.telegramLinkId = '';
            this.validation.success.message = null;
            this.validation.errors = null;
            this.selectedRecord = null;
        },
        getRecord(id: number) {
            selectedRecordStore.findRecord('id', this.records.data, id);
            this.selectedRecord = selectedRecordStore.record;
            this.input.telegramLinkId = this.selectedRecord?.attributes.telegram_link?.id;
        },
        getRecords() {
            let self = this;

            self.validation.showTableLoader = true;
            axios.get(`${process.env.API_URL}/users`, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
                params: {
                    page: self.pagination.current,
                    limit: self.pagination.limit,
                    date_from: self.inputFilter.dateFrom,
                    date_to: self.inputFilter.dateTo,
                    search: self.inputFilter.search
                }
            })
            .then(function (response) {
                self.records = response.data;
                self.validation.success.message = null;
                self.validation.errors = null;
                self.validation.showTableLoader = false;

                $("[data-dismiss='modal']").trigger({ type: "click" });
            });
        },
        getTelegramRecords() {
            let self = this;

            axios.get(`${process.env.API_URL}/telegram-links`, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                }
            })
            .then(function (response) {
                self.telegramRecords = response.data;
            });
        },
        updateRecord() {
            let self = this;
            self.validation.loading = true;
            
            axios.put(`${process.env.API_URL}/users/${self.selectedRecord.id}`, {
                telegram_link_id: self.input.telegramLinkId
            }, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                }
            })
            .then(function (response) {
                self.validation.loading = false;
                self.validation.success.message = 'Successfully updated!'
                self.validation.errors = null;

                self.getRecords();
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.errors = error.response.data.errors;
                self.validation.success.message = null;
            });
        },
        deleteRecord() {
            let self = this;
            self.validation.loading = true;
            
            axios.delete(`${process.env.API_URL}/users/${self.selectedRecord.id}`, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                }
            })
            .then(function (response) {
                self.validation.loading = false;
                self.validation.success.message = 'Successfully deleted!'
                self.validation.errors = null;

                self.getRecords();
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.errors = error.response.data.errors;
                self.validation.success.message = null;
            });
        },
        search() {
            this.getRecords();
        }
    }
}
</script>

<style scoped>
a.telegram-link {
    display: block;
    white-space: nowrap; 
    width: 124px; 
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>