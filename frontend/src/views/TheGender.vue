<template>
    <KeepAlive>
        <div class="register_page_body questionair_page_body">
            <div class="questionair_page_main">
                <div class="questionair_page_header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="qp_logo">
                                    <a href="#"><img src="@/assets/images/logo.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="questionair_page_contents_all">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="questionair_page_contents">
                                    <div class="questionair_page_progressbar">
                                        <div class="wrap">
                                            <div class="bar-container">
                                                <div class="barpro" style="width: 13%;"></div>
                                            </div>
                                                <div class="bar-percentage" data-percentage="15"></div>

                                                <div class="qp_progress_text">
                                                <p>100%</p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="questionair_main_contents_all_page">
                                        <div class="questionair_page_choose_gender">
                                            <div class="ppcg_title">
                                                <h3>Choose Your Gender</h3>
                                            </div>
                                            <div class="qp_contents_all">
                                                <div class="qp_gender_vtwo_main">
                                                    <div class="gp_gender_vtwo_single">
                                                        <h4>Male</h4>
                                                        <input v-model="input.gender" id="male"
                                                        type="radio" value="male" class="input-hidden" :checked="input.gender === 'male'" />
                                                        <label for="male" @click="input.gender = 'male'">
                                                            <span class="gpgvts_img"><img src="@/assets/images/male.png" alt=""></span>
                                                        </label>
                                                    </div>
                                                    <div class="gp_gender_vtwo_single">
                                                        <h4>Female</h4>
                                                        <input v-model="input.gender" id="female"
                                                            type="radio" value="female" class="input-hidden" :checked="input.gender === 'female'"/>
                                                        <label for="female" @click="input.gender = 'female'">
                                                            <span class="gpgvts_img"><img src="@/assets/images/female.png" alt=""></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="questionair_next_sub">
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
    </KeepAlive>
</template>

<script lang="ts">
import { userProfile } from '../stores/index';
const userStore = userProfile();

export default {
    data() {
        return {
            input: {
                gender: userStore.profile.gender
            }
        }
    },
    methods: {
        next() {
            userStore.setGender(this.input.gender);

            this.$router.push({ name: 'personal-information' });
        }
    }
}
</script>