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
                                            <div class="barpro" style="width: 50%;"></div>
                                        </div>
                                            <div class="bar-percentage" data-percentage="55"></div>

                                            <div class="qp_progress_text">
                                            <p>100%</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="questionair_main_contents_all_page">
                                    <div class="questionair_page_choose_gender personal_infor_all">
                                        <div class="ppcg_title">
                                            <h3>How Active Are You?</h3>
                                        </div>
                                        <div class="qp_contents_all perinfor_pagem">
                                            <div class="gym_experi_contents_main">
                                                <div class="gym_experi_cm_shoose">
                                                    <div class="gp_gender_vtwo_single">
                                                        <div class="qp_gender_vtwo_main gymp_vth_main">
                                                            <p class="gym_p">Choose</p>
                                                            <div class="gp_gender_vtwo_single gym_plabel" @click="input.howActiveAreYou = 'i dont exercise'">
                                                                <input v-model="input.howActiveAreYou" 
                                                                type="radio" value="i dont exercise" 
                                                                id="gym_radio1" class="input-hidden" :checked="input.howActiveAreYou === 'i dont exercise'"/>
                                                                <label for="gym_radio1">
                                                                    <span class="gpgvts_title">I don't exercise</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel" @click="input.howActiveAreYou = 'i exercise occasionally'">
                                                                <input v-model="input.howActiveAreYou" 
                                                                    type="radio" valuue="i exercise occasionally"
                                                                    id="gym_radio2" class="input-hidden" :checked="input.howActiveAreYou === 'i exercise occasionally'"/>
                                                                <label for="gym_radio2">
                                                                    <span class="gpgvts_title">I exercise occasionally</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel" @click="input.howActiveAreYou = 'i exercise frequently'">
                                                                <input v-model="input.howActiveAreYou" 
                                                                    type="radio" value="i exercise frequently"
                                                                    id="gym_radio3" class="input-hidden" :checked="input.howActiveAreYou === 'i exercise frequently'"/>
                                                                <label for="gym_radio3">
                                                                    <span class="gpgvts_title">I exercise frequently</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="questionair_next_sub_all">
                                                <div class="questionair_next_sub">
                                                    <a href="javascript: void(0)" @click="this.$router.push({ name: 'personal-information' })">PREVIOUS</a>
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
                howActiveAreYou: userStore.profile.howActiveAreYou
            }
        }
    },
    methods: {
        next() {
            userStore.setHowActiveAreYou(this.input.howActiveAreYou);

            this.$router.push({ name: 'hours-sleep' });
        }
    }
}
</script>