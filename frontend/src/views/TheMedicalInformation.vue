<template>
    <div class="register_page_body">
        <div class="questionair_page_main">
            <div class="questionair_page_header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="qp_logo">
                                <a href="#"><img src="assets/images/logo.png" alt=""></a>
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
                                            <form action="#">
                                                <div class="medical_infor_contents">
                                                    <div class="mic_single">
                                                        <label for="mic_text1">Medication Suppliments</label>
                                                        <textarea id="mic_text1"></textarea>
                                                    </div>
                                                    <div class="mic_single">
                                                        <label for="mic_text1">Injuries / Ilnesses</label>
                                                        <textarea id="mic_text1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="questionair_next_sub_all">
                                                    <div class="questionair_next_sub">
                                                        <a href="stress-level">PREVIOUS</a>
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