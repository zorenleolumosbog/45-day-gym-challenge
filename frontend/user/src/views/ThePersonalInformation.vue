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
                                            <div class="barpro" style="width: 31%;"></div>
                                        </div>
                                            <div class="bar-percentage" data-percentage="33"></div>

                                            <div class="qp_progress_text">
                                            <p>100%</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="questionair_main_contents_all_page">
                                    <div class="questionair_page_choose_gender personal_infor_all">
                                        <div class="ppcg_title">
                                            <h3>Personal Information</h3>
                                        </div>
                                        <div class="qp_contents_all perinfor_pagem">
                                            <div v-if="validation.error" class="mb-5 alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>All fields are required.</strong>
                                                <button @click="validation.error = false" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="personal_inf_contents_main">
                                                <div class="pi_content_single">
                                                    <label for="">Age</label>
                                                    <input v-model="input.age" type="number" placeholder="Enter Age">
                                                </div>
                                                <div class="pi_content_single">
                                                    <label for="">Height</label>
                                                    <input v-model="input.height" type="text" placeholder="Enter Height">
                                                    <div class="pi_content_single_text">
                                                        <p>ft</p>
                                                    </div>
                                                </div>
                                                <div class="pi_content_single">
                                                    <label for="">Current Weight</label>
                                                    <input v-model="input.currentWeight" type="number" placeholder="Enter Weight">
                                                    <div class="pi_content_single_text">
                                                        <p>lbs</p>
                                                    </div>
                                                </div>
                                                <div class="pi_content_single">
                                                    <label for="">Desired Weight Goal</label>
                                                    <input v-model="input.desiredWeightGoal" type="number" placeholder="Enter Weight">
                                                    <div class="pi_content_single_text">
                                                        <p>lbs</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="questionair_next_sub_all">
                                                <div class="questionair_next_sub">
                                                    <a href="javascript: void(0)" @click="this.$router.push({ name: 'gender' })">PREVIOUS</a>
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
                age: userStore.profile.age,
                height: userStore.profile.height,
                currentWeight: userStore.profile.currentWeight,
                desiredWeightGoal: userStore.profile.desiredWeightGoal
            },
            validation: {
                error: false
            }
        }
    },
    methods: {
        next() {
            if (this.input.age === '' || this.input.height === '' || this.input.currentWeight === '' || this.input.desiredWeightGoal === '') {
                this.validation.error = true;
            } else {
                userStore.setAge(this.input.age);
                userStore.setHeight(this.input.height);
                userStore.setCurrentWeight(this.input.currentWeight);
                userStore.setDesiredWeightGoal(this.input.desiredWeightGoal);

                this.$router.push({ name: 'gym-experience' });
            }
        }
    }
}
</script>