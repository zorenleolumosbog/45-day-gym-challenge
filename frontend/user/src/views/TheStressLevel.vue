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
                                            <div class="barpro" style="width: 78%;"></div>
                                        </div>
                                            <div class="bar-percentage" data-percentage="88"></div>

                                            <div class="qp_progress_text">
                                            <p>100%</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="questionair_main_contents_all_page">
                                    <div class="questionair_page_choose_gender personal_infor_all">
                                        <div class="ppcg_title">
                                            <h3>Stress Level</h3>
                                        </div>
                                        <div class="qp_contents_all perinfor_pagem">
                                            <div class="gym_experi_contents_main">
                                                <div class="gym_experi_cm_shoose stress_pchoose">
                                                    <div class="gp_gender_vtwo_single">
                                                        <div class="qp_gender_vtwo_main gymp_vth_main stress_vth_main">
                                                            <div class="stress_toptext">
                                                                <p>Choose from 1 - 10</p>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '1'">
                                                                <input v-model="input.stressLevelOutOf10"
                                                                type="radio" value="1" 
                                                                id="hs_id1" class="input-hidden" :checked="input.stressLevelOutOf10 === '1'"/>
                                                                <label for="hs_id1">
                                                                    <span class="gpgvts_title">1</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '2'">
                                                                <input v-model="input.stressLevelOutOf10" 
                                                                    type="radio" value="2"
                                                                    id="hs_id2" class="input-hidden" :checked="input.stressLevelOutOf10 === '2'"/>
                                                                <label for="hs_id2">
                                                                    <span class="gpgvts_title">2</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '3'">
                                                                <input v-model="input.stressLevelOutOf10"
                                                                    type="radio" value="3"
                                                                    id="hs_id3" class="input-hidden" :checked="input.stressLevelOutOf10 === '3'"/>
                                                                <label for="hs_id3">
                                                                    <span class="gpgvts_title">3</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '4'">
                                                                <input v-model="input.stressLevelOutOf10" 
                                                                    type="radio" value="4"
                                                                    id="hs_id4" class="input-hidden" :checked="input.stressLevelOutOf10 === '4'"/>
                                                                <label for="hs_id4">
                                                                    <span class="gpgvts_title">4</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '5'">
                                                                <input v-model="input.stressLevelOutOf10" 
                                                                    type="radio" value="5"
                                                                    id="hs_id5" class="input-hidden" :checked="input.stressLevelOutOf10 === '5'"/>
                                                                <label for="hs_id5">
                                                                    <span class="gpgvts_title">5</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '6'">
                                                                <input v-model="input.stressLevelOutOf10" 
                                                                    type="radio" value="6"
                                                                    id="hs_id6" class="input-hidden" :checked="input.stressLevelOutOf10 === '6'"/>
                                                                <label for="hs_id6">
                                                                    <span class="gpgvts_title">6</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '7'">
                                                                <input v-model="input.stressLevelOutOf10" 
                                                                    type="radio" value="7"
                                                                    id="hs_id7" class="input-hidden" :checked="input.stressLevelOutOf10 === '7'"/>
                                                                <label for="hs_id7">
                                                                    <span class="gpgvts_title">7</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '8'">
                                                                <input v-model="input.stressLevelOutOf10" 
                                                                    type="radio" value="8"
                                                                    id="hs_id8" class="input-hidden" :checked="input.stressLevelOutOf10 === '8'"/>
                                                                <label for="hs_id8">
                                                                    <span class="gpgvts_title">8</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '9'">
                                                                <input v-model="input.stressLevelOutOf10" 
                                                                    type="radio" value="9"
                                                                    id="hs_id9" class="input-hidden" :checked="input.stressLevelOutOf10 === '9'"/>
                                                                <label for="hs_id9">
                                                                    <span class="gpgvts_title">9</span>
                                                                </label>
                                                            </div>
                                                            <div class="gp_gender_vtwo_single gym_plabel stress_plabel" @click="input.stressLevelOutOf10 = '10'">
                                                                <input v-model="input.stressLevelOutOf10" 
                                                                    type="radio" value="10"
                                                                    id="hs_id10" class="input-hidden" :checked="input.stressLevelOutOf10 === '10'"/>
                                                                <label for="hs_id10">
                                                                    <span class="gpgvts_title">10</span>
                                                                </label>
                                                            </div>
                                                            <div class="stress_bottext">
                                                                <p>Lowest</p>
                                                                <p>HIghest</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="questionair_next_sub_all">
                                                <div class="questionair_next_sub">
                                                    <a href="javascript: void(0)" @click="this.$router.push({ name: 'hours-sleep' })">PREVIOUS</a>
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
                stressLevelOutOf10: userStore.profile.stressLevelOutOf10
            }
        }
    },
    methods: {
        next() {
            userStore.setStressLevelOutOf10(this.input.stressLevelOutOf10);

            this.$router.push({ name: 'medical-information' });
        }
    }
}
</script>