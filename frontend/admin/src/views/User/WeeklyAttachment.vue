<template>
    <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item" role="presentation">
            <button @click="showFirstWeek" class="nav-link" :class="{active: validation.showFirstWeek}" type="button" role="tab">First Week</button>
        </li>
        <li class="nav-item" role="presentation">
            <button @click="showLastWeek" class="nav-link" :class="{active: validation.showLastWeek}"  type="button" role="tab">Last Week</button>
        </li>
    </ul>
    <div class="tab-content px-4 py-4">
        <div class="tab-pane fade show active" v-if="validation.showFirstWeek">
            <div v-if="weeklyAttachments?.length > 0" class="right_site_week_carousel_main">
                <div class="rs_week_items_all_carousel">
                    <div class="rswiac_header">
                        <h4><img src="@/assets/images/lock.png" alt="">{{ getToLocaleDateString(weeklyAttachments[weeklyAttachments.length - 1].created_at) }}</h4>
                    </div>
                    <carousel :settings="settings" :breakpoints="breakpoints">
                        <slide v-for="weekly_attachment_detail in weeklyAttachments[weeklyAttachments.length - 1].weekly_attachment_details" :key="weekly_attachment_detail">
                            <div class="rswi_item_single">
                                <div class="rswi_item_single_img">
                                    <div class="rswi_item_single_img_pos">
                                        <img :src="weekly_attachment_detail.url" alt="">
                                    </div>
                                </div>
                                <div class="rswi_item_single_contents">
                                    <p>{{ weekly_attachment_detail.description  }}</p>
                                </div>
                            </div>
                        </slide>
                        <template #addons>
                            <pagination />
                        </template>
                    </carousel>
                    <div class="rs_week_bottom_contents">
                        <h4>Week {{ weeklyAttachments[weeklyAttachments.length - 1].week_number }}</h4>
                        <div class="rswbc_parag">
                            <p>Weight: {{ weeklyAttachments[weeklyAttachments.length - 1].weight }}lbs</p>
                            <p>{{ weeklyAttachments[weeklyAttachments.length - 1].description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" v-if="validation.showLastWeek">
            <div v-if="weeklyAttachments?.length > 0" class="right_site_week_carousel_main">
                <div class="rs_week_items_all_carousel">
                    <div class="rswiac_header">
                        <h4><img src="@/assets/images/lock.png" alt="">{{ getToLocaleDateString(weeklyAttachments[0].created_at) }}</h4>
                    </div>
                    <carousel :settings="settings" :breakpoints="breakpoints">
                        <slide v-for="weekly_attachment_detail in weeklyAttachments[0].weekly_attachment_details" :key="weekly_attachment_detail">
                            <div class="rswi_item_single">
                                <div class="rswi_item_single_img">
                                    <div class="rswi_item_single_img_pos">
                                        <img :src="weekly_attachment_detail.url" alt="">
                                    </div>
                                </div>
                                <div class="rswi_item_single_contents">
                                    <p>{{ weekly_attachment_detail.description  }}</p>
                                </div>
                            </div>
                        </slide>
                        <template #addons>
                            <pagination />
                        </template>
                    </carousel>
                    <div class="rs_week_bottom_contents">
                        <h4>Week {{ weeklyAttachments[0].week_number }}</h4>
                        <div class="rswbc_parag">
                            <p>Weight: {{ weeklyAttachments[0].weight }}lbs</p>
                            <p>{{ weeklyAttachments[0].description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { userLocale } from '../../stores/index';
const localeStore = userLocale();

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

export default {
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation
    },
    data() {
        return {
            validation: {
                showFirstWeek: false,
                showLastWeek: false
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
    props: ['weeklyAttachments'],
    methods: {
        getToLocaleDateString(dateString: string) {
            if(!dateString) {
                return null;
            }

            localeStore.setToLocaleDateString(dateString);

            return localeStore.toLocaleDateString;
        },
        showFirstWeek() {
            this.validation.showFirstWeek = true;
            this.validation.showLastWeek = false;
        },
        showLastWeek() {
            this.validation.showLastWeek = true;
            this.validation.showFirstWeek = false;
        }
    }
}
</script>