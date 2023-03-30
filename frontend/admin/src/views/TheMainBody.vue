<template>
    <div class="home_page_main_section_parent">
        <div class="px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="home_page_section_main">
                        <the-main-sidebar @component="(val) => component = val"></the-main-sidebar>
                        <keep-alive>
                            <component :is="component" />
                        </keep-alive>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import TheMainSidebar from './TheMainSidebar.vue'
import TheUser from './User/TheIndex.vue'
import TheTelegramLink from './TelegramLink/TheIndex.vue'
import TheSidebarLink from './SidebarLink/TheIndex.vue'
import TheOption from './Option/TheIndex.vue'

export default {
    components: {
        TheMainSidebar,
        TheUser,
        TheTelegramLink,
        TheSidebarLink,
        TheOption
    },
    data() {
        return {
            component: 'the-user'
        }
    },
    props: ['user']
}
</script>