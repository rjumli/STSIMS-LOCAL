<template>
    <b-modal v-model="showModal" hide-footer class="v-modal-custom" modal-class="zoomIn" fullscreen>
        <template v-slot:header>
            <b-row class="mb-n4">
                <b-col md>
                  <b-row class="align-items-center g-3">
                    <b-col md>
                        <div>
                            <h4 class="fw-bold">Ongoing Scholars</h4>
                            <div class="hstack gap-3 flex-wrap">
                                <div class="text-muted">Spas ID :
                                    <span class="text-body fw-medium">131231</span>
                                </div>
                                <div class="vr"></div>
                                <div class="text-muted">Program : 
                                    <span class="text-body fw-medium">123131</span>
                                </div>
                                <div class="vr"></div>
                                <div class="text-muted">Subprogram : 
                                    <span class="text-body fw-medium">3123131</span>
                                </div>
                            </div>
                        </div>
                    </b-col>
                  </b-row>
                </b-col>
              </b-row>
            <i @click="showModal=false" class="ri-close-circle-fill float-end" style="cursor:pointer; font-size: 40px; margin-top: -10px; margin-bottom: -20px;"></i>
        </template>
        <div class="row">
            <div class="col-md-12"><hr /></div>
            <div class="col-md-3">
                
            </div>
        </div>
    </b-modal>
</template>

<script>
import DatePicker from 'vue-datepicker-next';
import 'vue-datepicker-next/index.css';
export default {
    components: { DatePicker }, 
    data() {
        return {
            currentUrl: window.location.origin,
            showModal: false,
            option: null,
            year: ''
        }
    },
    methods: {
        show() {
            this.showModal = true;
            this.fetch();
        },
        fetch(){
            axios.get(this.currentUrl+'/monitoring', {
                params: {
                    type: 'batch',
                }
            })
            .then(response => {
                
            })
            .catch(err => console.log(err));
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>
