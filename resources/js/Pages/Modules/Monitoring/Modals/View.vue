<template>
    <b-modal v-model="showModal" hide-footer class="v-modal-custom" modal-class="zoomIn" fullscreen>
        <template v-slot:header>
            <b-row class="mb-n4">
                <b-col md>
                  <b-row class="align-items-center g-3">
                    <b-col md="auto">
                        <b-img class="img-thumbnail rounded-circle avatar-md" alt="200x200" src="/images/avatars/avatar.jpg" data-holder-rendered="true"></b-img>
                    </b-col>
                    <b-col md>
                        <div>
                            <h4 class="fw-bold">{{user.profile.name}}</h4>
                            <div class="hstack gap-3 flex-wrap">
                                <div class="text-muted">Spas ID :
                                    <span class="text-body fw-medium">{{user.spas_id}}</span>
                                </div>
                                <div class="vr"></div>
                                <div class="text-muted">Program : 
                                    <span class="text-body fw-medium">{{user.program}}</span>
                                </div>
                                <div class="vr"></div>
                                <div class="text-muted">Subprogram : 
                                    <span class="text-body fw-medium">{{user.subprogram}}</span>
                                </div>
                                <div class="vr"></div>
                                <div class="text-muted">Awarded Year : 
                                    <span class="text-body fw-medium">{{user.awarded_year}}</span>
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
                <div class="row">
                    <div class="col-md-12 mt-0">
                        <!-- <hr class="text-muted"/> -->
                        <span class="fw-semibold fs-12">Scholar Information</span>
                        <hr class="text-muted"/>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-0">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-service-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Status :</p> <span :class="'badge '+user.status.color+' '+user.status.others">{{user.status.name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-building-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">School :</p><h6 class="text-truncate mb-0"> {{user.education.school.name}} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="mdi mdi-school"></i></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Course :</p> <h6 class="text-truncate mb-0"> {{user.education.course.name}} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-calendar-fill"></i></div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Level :</p> <h6 class="text-truncate mb-0"> {{user.education.level.name}} <span class="text-muted fs-11">({{user.education.level.others}})</span></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <hr class="text-muted"/>
                    <span class="fw-semibold fs-12">Location Information</span>
                    <hr class="text-muted"/>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex mt-0">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-map-pin-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Address :</p>  <h6 class="text-truncate mb-0"> {{(user.address.address) ? user.address.address : 'n/a'}} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-pushpin-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Municipality :</p>  <h6 class="text-truncate mb-0"> {{user.address.municipality.name}} </h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-road-map-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Province :</p>  <h6 class="text-truncate mb-0"> {{user.address.province.name}} </h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-12">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                    <i class="ri-earth-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1 fs-12 text-muted">Region :</p> <h6 class="text-truncate mb-0"> {{user.address.region.name}} </h6>
                            </div>
                        </div>
                    </div>
                </div>
                
               
            </div> 
            <div class="col-md-9">
                <div class="border-start p-4 h-100 d-flex flex-column">
                    <Home :is_enrolled="user.education.school.is_enrolled" ref="home"/>
               
                        <!-- <ul class="nav nav-pills nav-justified nav-custom nav-custom-light mb-3 mt-n3" role="tablist">
                            <li class="nav-item">
                                <b-link class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                    Home
                                </b-link>
                            </li>
                            <li class="nav-item">
                                <b-link class="nav-link" data-bs-toggle="tab" href="#benefits" role="tab">
                                    Financial Benefits
                                </b-link>
                            </li>
                            <li class="nav-item">
                                <b-link class="nav-link" data-bs-toggle="tab" href="#enrollments" role="tab">
                                    Enrollments
                                </b-link>
                            </li>
                            <li class="nav-item">
                                <b-link class="nav-link" data-bs-toggle="tab" href="#nav-light-messages" role="tab">
                                    Employment History
                                </b-link>
                            </li>
                        </ul>
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <Home ref="home"/>
                            </div>
                            <div class="tab-pane" id="benefits" role="tabpanel">
                            </div>
                            <div class="tab-pane" id="enrollments" role="tabpanel">
                            </div>
                        </div> -->
                    
                
                </div>
                
            </div>
        </div>
    </b-modal>
</template>
<script>
import Home from './Pages/Home.vue';
import Benefits from './Pages/Benefits.vue';
import Enrollments from './Pages/Enrollments.vue';
export default {
    components: {Home, Benefits, Enrollments},
    data(){
        return {
            currentUrl: window.location.origin,
            showModal: false,
            user: {
                profile: {},
                status: {},
                education: {
                    school: {},
                    course: {},
                    level: {},
                    info: {}
                },
                addresses: [],
                address: { municipality: '', province: '', region: ''}
            },
            enrollments: [],
            prospectuses: [],
            enrollment: 0,
            listE: []
        }
    },
    methods: {
        show(user){
            this.user = user;
            this.prospectuses = this.user.education.info.prospectus;
            this.user.address = this.user.addresses[0];
            this.fetch();
            this.showModal = true;
        },
        hide(){
            this.showModal = false;
        },
        fetch(){
            axios.get(this.currentUrl+'/monitoring', {
                params: {
                    id: this.user.id,
                    type: 'monitoring'
                }
            })
            .then(response => {
                this.enrollments = response.data.data;
                this.$refs.home.set(this.enrollments);
            })
            .catch(err => console.log(err));
        },
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        viewFull(){
            this.$refs.view.show(this.monitoring);
        },
        viewGrades(){
            this.$refs.grades.show(this.monitoring);
        }
    }
}
</script>
<style>
    table .unselectablez {
        background-color: #f9f9f9;
        cursor: not-allowed;
    }
    .tablez td {
        padding: 0.55rem 0.55rem;
    }
</style>