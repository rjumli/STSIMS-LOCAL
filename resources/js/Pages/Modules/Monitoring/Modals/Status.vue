<template>
    <b-modal v-model="showModal" title="Update Status" hide-footer header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered>    
        <div class="modal-body text-center">
             <div class="form-check mb-2 mt-0">
                <input class="form-check-input" type="radio" v-model="option" value="1" id="a1">
                <label class="form-check-label" for="a1">Update by scholar name</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" v-model="option" value="2" id="a2">
                <label class="form-check-label" for="a2">Update by year awarded</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" v-model="option" value="3" id="a3">
                <label class="form-check-label" for="a3">Update by school</label>
            </div>
        </div>
    </b-modal>
</template>

<script>
    export default {
        data() {
            return {
                currentUrl: window.location.origin,
                showModal: false,
                option: null
            }
        },
        methods: {
            show() {
                this.showModal = true;
            },
            hide(){
                this.showModal = false;
            }
        }
    }
</script>
