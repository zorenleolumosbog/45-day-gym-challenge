<template>
    <teleport to="body">
        <!-- Modal -->
        <div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="informationModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="informationModalLabel">Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="h1">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4" v-html="information"></div>
                </div>
            </div>
        </div>
    </teleport>
</template>

<script lang="ts">

export default {
    props: ['information']
}
</script>