<template>
    <div class="register_page_body">
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
                                            <div class="barpro" style="width: 111%;"></div>
                                        </div>
                                            <div class="bar-percentage" data-percentage="120"></div>

                                            <div class="qp_progress_text">
                                            <p>100%</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="questionair_main_contents_all_page">
                                    <div class="questionair_page_choose_gender personal_infor_all">
                                        <div class="ppcg_title">
                                            <h3>Other medical related information</h3>
                                        </div>
                                        <div class="qp_contents_all perinfor_pagem">
                                            <div class="medical_infor_contents">
                                                <div v-if="validation.errors" class="mt-4 mb-4 alert alert-danger alert-dismissible fade show" role="alert">
                                                    <p v-for="(error, key) in validation.errors" :key="key">
                                                        <strong>{{ error[0] }}</strong>
                                                    </p>
                                                    <button @click="validation.errors = null" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="mic_single">
                                                    <label for="mic_text1">Medication Suppliments</label>
                                                    <textarea id="mic_text1" v-model="input.medicationsSupplements"></textarea>
                                                </div>
                                                <div class="mic_single">
                                                    <label for="mic_text1">Injuries / Ilnesses</label>
                                                    <textarea id="mic_text1" v-model="input.injuriesIllnesses"></textarea>
                                                </div>
                                            </div>
                                            <div class="questionair_next_sub_all">
                                                <div class="questionair_next_sub">
                                                    <a href="javascript: void(0)" @click="this.$router.push({ name: 'stress-level' })">PREVIOUS</a>
                                                </div>
                                                <div class="questionair_next_sub form_next_btnmml">
                                                    <input v-if="!validation.loading" type="submit" value="NEXT" @click="next">
                                                    <button v-if="validation.loading" type="submit" disabled>
                                                        <span class="spinner-border spinner-border-large" role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
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
import axios from 'axios';
import { userToken, userProfile } from '../stores/index';

const tokenStore = userToken();
const userStore = userProfile();

let accessToken: any;
if(localStorage.getItem("access_token")) {
    accessToken = localStorage.getItem("access_token");
} else {
    accessToken = tokenStore.token;
}

import TheHeaderQuestionnaire from './TheHeaderQuestionnaire.vue'

export default {
    components: {
        TheHeaderQuestionnaire
    },
    data() {
        return {
            input: {
                medicationsSupplements: userStore.profile.medicationsSupplements,
                injuriesIllnesses: userStore.profile.injuriesIllnesses
            },
            validation: {
                loading: false,
                errors: null
            }
        }
    },
    methods: {
        next() {
            userStore.setMedicationsSupplements(this.input.medicationsSupplements);
            userStore.setInjuriesIllnesses(this.input.injuriesIllnesses);

            let self = this;

            self.validation.loading = true;

            axios.post(`${process.env.API_URL}/user-profiles`, {
                gender: userStore.profile.gender,
                age: userStore.profile.age,
                height: userStore.profile.height,
                current_weight: userStore.profile.currentWeight,
                desired_weight_goal: userStore.profile.desiredWeightGoal,
                gym_experience: userStore.profile.gymExperience,
                hours_of_sleep_at_night: userStore.profile.hoursOfSleepAtNight,
                stress_level_out_of_10: userStore.profile.stressLevelOutOf10,
                medications_supplements: userStore.profile.medicationsSupplements,
                injuries_illnesses: userStore.profile.injuriesIllnesses
            }, {
                headers: {
                    Authorization: `Bearer ${accessToken}`,
                }
            })
            .then(function (response) {
                self.$router.push({ name: 'home' });
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.errors = error.response.data.errors;
            });
        }
    }
}
</script>