<template>
    <nav class="mt-3 float-right">
        <ul class="pagination">
            <template v-for="(link, index) in meta.links" :key="index">
                <li class="page-item" :class="{ active: link.active, disabled: !link.url }">
                    <span v-if="link.active" class="sr-only">(current)</span>
                    <a @click="getPageNumberFromURLParam(link.url)" class="page-link" :class="{ active: link.active }" href="javascript:void(0)">
                        <span v-html="link.label"></span>
                    </a>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script lang="ts">

export default {
    methods: {
        getPageNumberFromURLParam(val: any) {
            if(val) {
                var url = new URL(val);
                var pageNumber = url.searchParams.get("page");
                this.$emit('currentPage', pageNumber);
            }
            return false;
        }
    },
    props: ['meta']
}
</script>