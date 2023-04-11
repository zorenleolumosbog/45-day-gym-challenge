<template>
    <the-main-header></the-main-header>
    <div class="home_page_main_section_parent">
        <div class="px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="home_page_section_main">
                        <the-main-sidebar></the-main-sidebar>
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import TheMainHeader from './TheMainHeader.vue'
import TheMainSidebar from './TheMainSidebar.vue'

export default {
    components: {
        TheMainHeader,
        TheMainSidebar
    }
}
</script>