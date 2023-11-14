<template>
    <b-modal v-model="showModal" title="Monitor Schools" hide-footer header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop fullscreen>    
         <ul class="nav nav-pills nav-justified nav-custom nav-custom-light small" role="tablist">
            <li class="nav-item">
                <b-link class="nav-link active" data-bs-toggle="tab" href="#semester" role="tab">
                    Semester
                </b-link>
            </li>
            <li class="nav-item">
                <b-link class="nav-link" data-bs-toggle="tab" href="#trimester" role="tab">
                    Trimester
                </b-link>
            </li>
             <li class="nav-item">
                <b-link class="nav-link" data-bs-toggle="tab" href="#quarter" role="tab">
                    Quarter Term
                </b-link>
            </li>
        </ul>
        <div class="table-responsive mt-2">
            <table class="table table-nowrap align-middle">
                <thead class="table-light fs-11">
                    <tr>
                        <th width="35%">School</th>
                        <th width="20%" class="text-center">Semester</th>
                        <th width="15%" class="text-center">Start At</th>
                        <th width="15%" class="text-center">End At</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="5%"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="create('ok')" variant="primary" :disabled="final != key" block>Save</b-button>
        </template> -->
    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            showModal: false,
            settings: ''
        }
    },
    methods : {
        show(settings) {
            this.settings = settings;
            this.showModal = true;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>
