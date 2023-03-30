<template>
    <!--####################### Start Right Site #######################-->
    <div class="home_right_site">
        <div class="right_site_header">
            <h4>Manage Sidebar Links</h4>
            <p>{{ getToLocaleDateNowString() }}</p>
        </div>
        <!-- Start Time Remaining Section -->
        <div class="right_site_time_remaining_main">
            <div class="right_site_remaining_bottom_contents">
                <div class="rsrbc_form_btn add-btn w-25 mb-5">
                    <input @click="resetRecord" type="submit" value="ADD" data-toggle="modal" data-target="#addSidebarLinkModal">
                </div>
                <div v-if="validation.showTableLoader" style="margin-top: -22px; margin-left: -22px">
                    <table-loader></table-loader>
                </div>
                <div class="table-responsive">
                    <table v-if='!validation.showTableLoader && records' class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Link</th>
                                <th scope="col">Bg Color</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="record in records?.data" :key="record">
                                <th scope="row">{{ record.id }}</th>
                                <td>{{ record.title }}</td>
                                <td>
                                    <a target="_blank" class="link" :href="record.link">
                                        {{ record.link}}
                                    </a>
                                </td>
                                <td>{{ record.bg_color }}</td>
                                <td><img :src="record.url" class="w-50"></td>
                                <td>{{ getToLocaleDateString(record.created_at) }}</td>
                                <td>
                                    <button @click="getRecord(record.id)" type="submit" class="action-btn" data-toggle="modal" data-target="#addSidebarLinkModal">Edit</button>
                                </td>
                                <td>
                                    <button @click="getRecord(record.id)" type="submit" class="action-btn" data-toggle="modal" data-target="#deleteTelegramLinkModal">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <the-pagination v-if="records?.data.length" :meta="records?.meta" @currentPage="currentPage"></the-pagination>
                </div>
            </div>
        </div>
    </div>
    <!--####################### End Right Site #######################-->
    <teleport to="body">
        <!-- Modal -->
        <div class="modal fade" id="addSidebarLinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-if="selectedRecord">Edit Sidebar Link</h4>
                        <h4 class="modal-title" v-else>Add Sidebar Link</h4>
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
                                <label for="rpfs3">Enter Title</label>
                                <input type="text" v-model="input.title" placeholder="Title">
                            </div>
                            <div class="rp_form_single mb-4">
                                <label for="rpfs3">Enter Link (http/https)</label>
                                <input type="text" v-model="input.link" placeholder="Link">
                            </div>
                            <div class="rp_form_single mb-4">
                                <label for="rpfs3">Enter Bg Color</label>
                                <input type="color" v-model="input.bg_color" placeholder="Bg Color">
                            </div>
                            <div class="rp_form_single mb-4">
                                <label for="rpfs3">Upload Icon (max 80x80)</label>
                                <input  @change="handleFileIcon" type="file" ref="front" id="file" accept="image/png, image/gif, image/jpeg" class="form-control form-control-lg pt-3">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="register_page_form_btn">
                            <input :disabled="input.title === '' || input.link === '' || input.bg_color === '' || input.file.icon === null" v-if="!validation.loading && !selectedRecord" type="submit" @click="saveRecord" value="Save">
                            <input ::disabled="input.title === '' || input.link === '' || input.bg_color === '' || input.file.icon === null" v-if="!validation.loading && selectedRecord" type="submit" @click="updateRecord" value="Update">
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
        <div class="modal fade" id="deleteTelegramLinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Telegram Link</h4>
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
                                <p>Are you sure you want to delete <strong>{{ selectedRecord?.title }}</strong>?</p>
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

import TableLoader from '../../components/TableLoader.vue';
import InputLoader from '../../components/InputLoader.vue';
import ThePagination from '../../components/ThePagination.vue';

export default {
    components: {
        TableLoader,
        InputLoader,
        ThePagination
    },
    data() {
        return {
            input: {
                title: '',
                link: '',
                bg_color: '',
                file: {
                    src: '',
                    icon: null
                },
            },
            records: null,
            selectedRecord: null,
            pagination: {
                current: 1,
                limit: 10
            },
            validation: {
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
    },
    methods: {
        currentPage(val: number) {
            this.pagination.current = val;
            this.getRecords();
        },
        handleFileIcon(event: any) {
            const file = event.target.files[0];
            this.input.file.src = URL.createObjectURL(file);
            this.input.file.icon = file;
        },
        getToLocaleDateNowString() {
            localeStore.setToLocaleDateNowString();

            return localeStore.toLocaleDateNowString;
        },
        getToLocaleDateString(dateString: string) {
            localeStore.setToLocaleDateString(dateString);

            return localeStore.toLocaleDateString;
        },
        resetRecord() {
            this.input.title = '';
            this.input.link = '';
            this.input.bg_color = '';
            this.input.file.src = '';
            this.input.file.icon = null;
            this.validation.success.message = null;
            this.validation.errors = null;
            this.selectedRecord = null;
        },
        getRecord(id: number) {
            selectedRecordStore.findRecord('id', this.records.data, id);
            this.selectedRecord = selectedRecordStore.record;
            this.input.title = this.selectedRecord?.title;
            this.input.link = this.selectedRecord?.link;
            this.input.bg_color = this.selectedRecord?.bg_color;
            this.input.file.src = this.selectedRecord?.url;
        },
        getRecords() {
            let self = this;

            self.validation.showTableLoader = true;
            axios.get(`${process.env.API_URL}/sidebar-links`, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                },
                params: {
                    page: this.pagination.current,
                    limit: this.pagination.limit
                }
            })
            .then(response => {
                self.records = response.data;
                self.validation.success.message = null;
                self.validation.errors = null;
                self.validation.showTableLoader = false;

                $("[data-dismiss='modal']").trigger({ type: "click" });
            });
        },
        saveRecord() {
            let self = this;
            self.validation.loading = true;

            const formData = new FormData();
            formData.append('title', self.input.title);
            formData.append('link', self.input.link);
            formData.append('bg_color', self.input.bg_color);
            formData.append('file_icon', self.input.file.icon);

            axios.post(`${process.env.API_URL}/sidebar-links`, formData, {
                headers: {
                    Authorization: `Bearer ${authStore.accessToken}`,
                }
            })
            .then(function (response) {
                self.validation.loading = false;
                self.validation.success.message = 'Successfully added!'
                self.validation.errors = null;
                
                self.input.title = '';
                self.input.link = '';
                self.input.bg_color = '';
                self.input.file.src = '';
                self.input.file.icon = null;

                self.getRecords();
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.errors = error.response.data.errors;
                self.validation.success.message = null;
            });
        },
        updateRecord() {
            let self = this;
            self.validation.loading = true;
            
            const formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('title', self.input.title);
            formData.append('link', self.input.link);
            formData.append('bg_color', self.input.bg_color);
            if(self.input.file.icon) {
                formData.append('file_icon', self.input.file.icon);
            }

            axios.post(`${process.env.API_URL}/sidebar-links/${self.selectedRecord.id}`, formData, {
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
            
            axios.delete(`${process.env.API_URL}/sidebar-links/${self.selectedRecord.id}`, {
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
        }
    }
}
</script>

<style scoped>
a.link {
    display: block;
    white-space: nowrap; 
    width: 124px; 
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>