<template>
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
                                            <form action="personal-information.html">
                                                <div class="qp_gender_vtwo_main">
                                                    <div class="gp_gender_vtwo_single">
                                                        <h4>Male</h4>
                                                        <input 
                                                        type="radio" name="emotion" 
                                                        id="sad" class="input-hidden" checked />
                                                        <label for="sad">
                                                            <!-- <span class="gpgvts_title"></span> -->
                                                            <span class="gpgvts_img"><img src="@/assets/images/male.png" alt=""></span>
                                                        </label>
                                                    </div>
                                                    <div class="gp_gender_vtwo_single">
                                                        <h4>Female</h4>
                                                        <input 
                                                            type="radio" name="emotion"
                                                            id="happy" class="input-hidden" />
                                                        <label for="happy">
                                                            <span class="gpgvts_img"><img src="@/assets/images/female.png" alt=""></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- <div class="questionair_gender">
                                                    <div class="questionair_gender_single qp_gender_male">
                                                        <div class="qpg_sinlge_title">
                                                            <h4>Male</h4>
                                                        </div>
                                                        <div class="qpg_gender_choose qpg_gc_male qp_gender_male_borderm">
                                                            <img src="@/assets/images/male.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="questionair_gender_single qp_gender_female">
                                                        <div class="qpg_sinlge_title">
                                                            <h4>Female</h4>
                                                        </div>
                                                        <div class="qpg_gender_choose qpg_gc_female">
                                                            <img src="@/assets/images/female.png" alt="">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="questionair_next_btn">
                                                    <a href="#">NEXT</a>
                                                </div> -->
                                                <div class="questionair_next_sub">
                                                    <input type="submit" value="NEXT">
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
        </div>
    </div>
</template>

<script lang="ts">

export default {
}
</script>