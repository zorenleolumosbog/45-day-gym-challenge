<template>
    <div class="register_page_body">
        <div class="register_page_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="register_page">
                            <div class="register_page_header">
                                <div class="register_page_header_title">
                                    <h4>Count Down Until Next Group</h4>
                                </div>
                                <div class="rstremaining_treml_time register_page_countdown">
                                    <div id="countdown">
                                        <div class="countdown_single">
                                            <div class="countdown" id="days">00</div>
                                            <div class="rs_countdown_text_pos">
                                                <p>Days</p>
                                            </div>
                                        </div>
                                        <div class="countdown_single">
                                            <div class="countdown" id="hours">00</div>
                                            <div class="rs_countdown_text_pos">
                                                <p>Hours</p>
                                            </div>
                                        </div>
                                        <div class="countdown_single">
                                            <div class="countdown" id="minutes">00</div>
                                            <div class="rs_countdown_text_pos">
                                                <p>Minutes</p>
                                            </div>
                                        </div>
                                        <div class="countdown_single">
                                            <div class="countdown" id="seconds">00</div>
                                            <div class="rs_countdown_text_pos">
                                                <p>Seconds</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="register_page_form_sec">
                                <div class="register_page_form_header">
                                    <a href="#"><img src="@/assets/images/logo.png" alt=""></a>
                                    <h3>Login for the 45 day contest</h3>
                                </div>
                                <div class="register_page_form">
                                    <div v-if="validation.error" class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>The user credentials were incorrect.</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="rp_form_single">
                                        <label for="rpfs2">Email Address</label>
                                        <input type="email" v-model="input.email" placeholder="Enter Email Address">
                                    </div>
                                    <div class="rp_form_single">
                                        <label for="rpfs3">Password</label>
                                        <input type="password" v-model="input.password" placeholder="Enter Password">
                                    </div>
                                    <div class="register_page_checkbox">
                                        <div class="hrh2_send_notif_des">
                                            <input type="checkbox" v-model="input.rememberMe">
                                            <label for="html"></label>
                                        </div>
                                        <div class="rpc_lbl">
                                            <label for="html">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="register_page_form_btn">
                                        <input v-if="!validation.loading" type="submit" @click="login" value="Login Now!">
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
</template>

<script lang="ts">
import axios from 'axios';

export default {
    data() {
        return {
            input: {
                email: '',
                password: '',
                rememberMe: true
            },
            validation: {
                loading: false,
                error: false
            }
        }
    },
    methods: {
        login() {
            let self = this;

            self.validation.loading = true;
            axios.post(`${process.env.API_URL}/oauth/token`, {
                grant_type: process.env.OAUTH_GRANT_TYPE,
                client_id: process.env.OAUTH_CLIENT_ID,
                client_secret:process.env.OAUTH_SECRET,
                username: self.input.email,
                password: self.input.password,
                scope: process.env.OAUTH_SCOPE,
            })
            .then(function (response) {
                localStorage.setItem("access_token", response.data.access_token);
                self.validation.error = false;

                self.$router.push({ name: 'gender' });
            })
            .catch(function (error) {
                console.log(error);
                self.validation.loading = false;
                self.validation.error = true;
            });
        }
    }
}
</script>