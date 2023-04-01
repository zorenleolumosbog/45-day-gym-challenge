<template>
    <div class="register_page_body questionair_page_body">
        <div class="questionair_page_main">
            <the-header-questionnaire></the-header-questionnaire>
            <div class="questionair_page_contents_all">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="questionair_page_contents">
                                <div class="questionair_page_progressbar">
                                    <div class="wrap">
                                        <div class="bar-container">
                                            <div class="barpro" style="width: 70%;"></div>
                                        </div>
                                            <div class="bar-percentage" data-percentage="72"></div>

                                            <div class="qp_progress_text">
                                            <p>100%</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="questionair_main_contents_all_page">
                                    <div class="questionair_page_choose_gender personal_infor_all">
                                        <div class="ppcg_title">
                                            <h3>Hours of sleep per night?</h3>
                                        </div>
                                        <div class="qp_contents_all perinfor_pagem">
                                            <div class="gym_experi_contents_main">
                                                <div class="gym_experi_cm_shoose">
                                                    <div class="gp_gender_vtwo_single">
                                                        <div class="qp_gender_vtwo_main gymp_vth_main">
                                                            <p class="gym_p">Choose</p>
                                                            <div class="gp_gender_vtwo_single gym_plabel" @click="input.hoursOfSleepAtNight = '4-6 hours'">
                                                                <input v-model="input.hoursOfSleepAtNight"
                                                                type="radio" value="4-6 hours" 
                                                                id="hs_id1" class="input-hidden" :checked="input.hoursOfSleepAtNight === '4-6 hours'" />
                                                                <label for="hs_id1">
                                                                    <span class="gpgvts_title">4-6 Hours</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel" @click="input.hoursOfSleepAtNight = '7-8 hours'">
                                                                <input  v-model="input.hoursOfSleepAtNight"
                                                                    type="radio" value="7-8 hours"
                                                                    id="hs_id2" class="input-hidden" :checked="input.hoursOfSleepAtNight === '7-8 hours'"/>
                                                                <label for="hs_id2">
                                                                    <span class="gpgvts_title">7-8 hours</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel" @click="input.hoursOfSleepAtNight = '9+ hours'">
                                                                <input v-model="input.hoursOfSleepAtNight" 
                                                                    type="radio" value="9+ hours"
                                                                    id="hs_id3" class="input-hidden" :checked="input.hoursOfSleepAtNight === '9+ hours'"/>
                                                                <label for="hs_id3">
                                                                    <span class="gpgvts_title">9+ hours</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="questionair_next_sub_all">
                                                <div class="questionair_next_sub">
                                                    <a href="javascript: void(0)" @click="this.$router.push({ name: 'gym-experience' })">PREVIOUS</a>
                                                </div>
                                                <div class="questionair_next_sub form_next_btnmml">
                                                    <input type="submit" value="NEXT" @click="next">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { userProfile } from '../stores/index';
const userStore = userProfile();

import TheHeaderQuestionnaire from './TheHeaderQuestionnaire.vue'

export default {
    components: {
        TheHeaderQuestionnaire
    },
    data() {
        return {
            input: {
                hoursOfSleepAtNight: userStore.profile.hoursOfSleepAtNight
            }
        }
    },
    methods: {
        next() {
            userStore.setHoursOfSleepAtNight(this.input.hoursOfSleepAtNight);

            this.$router.push({ name: 'stress-level' });
        }
    }
}
</script>