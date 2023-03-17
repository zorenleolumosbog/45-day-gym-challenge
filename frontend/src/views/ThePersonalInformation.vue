<template>
    <div class="register_page_body">
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
                                            <form action="gym-experience.html">
                                                <div class="personal_inf_contents_main">
                                                    <div class="pi_content_single">
                                                        <label for="">Age</label>
                                                        <input type="text" placeholder="Enter Age">
                                                    </div>
                                                    <div class="pi_content_single">
                                                        <label for="">Height</label>
                                                        <input type="text" placeholder="Enter Height">
                                                        <div class="pi_content_single_text">
                                                            <p>cm</p>
                                                        </div>
                                                    </div>
                                                    <div class="pi_content_single">
                                                        <label for="">Current Weight</label>
                                                        <input type="text" placeholder="Enter Weight">
                                                        <div class="pi_content_single_text">
                                                            <p>lbs</p>
                                                        </div>
                                                    </div>
                                                    <div class="pi_content_single">
                                                        <label for="">Desired Weight Goal</label>
                                                        <input type="text" placeholder="Enter Weight">
                                                        <div class="pi_content_single_text">
                                                            <p>lbs</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="questionair_next_sub_all">
                                                    <div class="questionair_next_sub">
                                                        <a href="gender">PREVIOUS</a>
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