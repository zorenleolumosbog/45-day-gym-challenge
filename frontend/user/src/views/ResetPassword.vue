<template>
    <div class="register_page_body">
        <div class="register_page_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="register_page">
                            <div class="register_page_form_sec">
                                <div class="register_page_form_header">
                                    <a href="#"><img src="@/assets/images/logo.png" alt=""></a>
                                    <h3>Reset Password</h3>
                                </div>
                                <div class="register_page_form">
                                    <div v-if="validation.success.message" class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ validation.success.message }}</strong>
                                        <button @click="validation.success.message = null" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div v-if="validation.error.message" class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ validation.error.message }}</strong>
                                        <button @click="validation.error.message = null" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="rp_form_single">
                                        <label for="rpfs3">Enter New Password</label>
                                        <input type="password" v-model="input.password" placeholder="Enter New Password">
                                    </div>
                                    <div class="register_page_form_btn">
                                        <input :disabled="input.password === ''" v-if="!validation.loading" type="submit" @click="submit" value="Submit">
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
                password: '',
                token: ''
            },
            validation: {
                loading: false,
                success: {
                    message: null
                },
                error: {
                    message: null
                }
            }
        }
    },
    methods: {
        submit() {
            let self = this;

            self.validation.loading = true;
            axios.post(`${process.env.API_URL}/reset-password`, {
                password: self.input.password,
                token: self.input.token
            })
            .then(function (response) {
                self.validation.loading = false;
                self.validation.success.message = 'Password changed successfully!.';
                self.validation.error.message = null;
            })
            .catch(function (error) {
                self.validation.loading = false;
                self.validation.success.message = null;
                self.validation.error.message = error.response.data.message;
            });
        }
    }
}
</script>