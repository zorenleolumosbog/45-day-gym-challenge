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
                                            <form action="stress-level.html">
                                                <div class="gym_experi_contents_main">
                                                    <div class="gym_experi_cm_shoose">
                                                        <div class="gp_gender_vtwo_single">
                                                            <div class="qp_gender_vtwo_main gymp_vth_main">
                                                                <p class="gym_p">Choose</p>
                                                                <div class="gp_gender_vtwo_single gym_plabel">
                                                                    <input 
                                                                    type="radio" name="emotion" 
                                                                    id="hs_id1" class="input-hidden" checked />
                                                                    <label for="hs_id1">
                                                                        <span class="gpgvts_title">4-6 Hours</span>
                                                                    </label>
                                                                </div>
                                                                <div class="gp_gender_vtwo_single gym_plabel">
                                                                    <input 
                                                                        type="radio" name="emotion"
                                                                        id="hs_id2" class="input-hidden" />
                                                                    <label for="hs_id2">
                                                                        <span class="gpgvts_title">7-8 hours</span>
                                                                    </label>
                                                                </div>
                                                                <div class="gp_gender_vtwo_single gym_plabel">
                                                                    <input 
                                                                        type="radio" name="emotion"
                                                                        id="hs_id3" class="input-hidden" />
                                                                    <label for="hs_id3">
                                                                        <span class="gpgvts_title">8 hours Above</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="questionair_next_sub_all">
                                                    <div class="questionair_next_sub">
                                                        <a href="gym-experience">PREVIOUS</a>
                                                    </div>
                                                    <!-- <div class="qp_previews">
                                                        <input type="submit" value="PREVIOUS">
                                                    </div> -->
                                                    <div class="questionair_next_sub form_next_btnmml">
                                                        <input type="submit" value="NEXT">
                                                    </div>
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