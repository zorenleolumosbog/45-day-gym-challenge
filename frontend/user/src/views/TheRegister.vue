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
                                    <h3>Register Now for the 45 day contest</h3>
                                </div>
                                <div class="register_page_form">
                                    <form>
                                        <div class="rp_form_single">
                                            <label for="rpfs1">Full Name</label>
                                            <input type="text" id="rpfs1" placeholder="Enter full Name">
                                        </div>
                                        <div class="rp_form_single">
                                            <label for="rpfs2">Email Address</label>
                                            <input type="email" id="rpfs2" placeholder="Enter Email Address">
                                        </div>
                                        <div class="rp_form_single">
                                            <label for="rpfs3">Password</label>
                                            <input type="password" id="rpfs3" value="password">
                                        </div>
                                        <div class="rp_form_single">
                                            <label for="rpfs3">Confirm Password</label>
                                            <input type="password" id="rpfs3" value="password">
                                        </div>
                                        <div class="register_page_checkbox">
                                            <div class="hrh2_send_notif_des">
                                                <input type="checkbox" id="html">
                                                <label for="html"></label>
                                            </div>
                                            <div class="rpc_lbl">
                                                <label for="html">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </label>
                                            </div>
                                        </div>
                                        <div class="register_page_form_btn">
                                            <input type="submit" value="Register NOw!">
                                        </div>
                                    </form>
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

export default {
}
</script>