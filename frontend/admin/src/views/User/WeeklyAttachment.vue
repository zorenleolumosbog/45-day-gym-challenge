<template>
    <input-loader :width="300" v-if="validation.loading"></input-loader>
    <template v-else>
        <div v-for="weeklyAttachment in weeklyAttachments?.data" :key="weeklyAttachment" class="right_site_week_carousel_main">
            <div class="rs_week_items_all_carousel">
                <div class="rswiac_header">
                    <h4 :class="{ 'mb-3' : !weeklyAttachment.lock, 'ml-2' : !weeklyAttachment.lock }">
                        <img v-if="weeklyAttachment.lock" src="@/assets/images/lock.png" alt="">
                        {{ getToLocaleDateString(weeklyAttachment.created_at) }}
                    </h4>
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
    <the-pagination class="mt-5 mb-3" v-if="weeklyAttachments?.data.length > 0" :meta="weeklyAttachments.meta" @currentPage="currentPage"></the-pagination>
</template>
<script lang="ts">
import axios from 'axios';
import { userAuth, userLocale } from '../../stores/index';
const authStore = userAuth();
const localeStore = userLocale();

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

import InputLoader from '../../components/InputLoader.vue';
import ThePagination from '../../components/ThePagination.vue';

export default {
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
        ThePagination,
        InputLoader
    },
    data() {
        return {
            weeklyAttachments: null,
            pagination: {
                current: 1,
                limit: 1
            },
            validation: {
                loading: false
            },
            // carousel settings
            settings: {
                itemsToShow: 2.4,
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
                    itemsToShow: 2.4,
                    snapAlign: 'start',
                },
            },
        }
    },
    props: ['selectedRecord'],
    mounted() {
        this.validation.loading = true;
        this.getUserWeeklyAttachments();
    },
    methods: {
        currentPage(val: number) {
            this.validation.loading = true;
            this.pagination.current = val;
            this.getUserWeeklyAttachments();
        },
        getToLocaleDateString(dateString: string) {
            if(!dateString) {
                return null;
            }

            localeStore.setToLocaleDateString(dateString);

            return localeStore.toLocaleDateString;
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
                    user_id: self.selectedRecord?.id
                }
            })
            .then(response => {
                self.weeklyAttachments = response.data;
                self.validation.loading = false;
            })
        }
    }
}
</script>