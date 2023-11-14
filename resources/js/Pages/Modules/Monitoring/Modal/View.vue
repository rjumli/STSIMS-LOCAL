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
                    <div class="row mt-n4 mb-4">
                        <div class="col-sm-6 col-lg-3">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                                class="ri-file-copy-2-fill"></i></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted fs-11 mb-1">Enrollment Status :</p>
                                        <h5 v-if="is_enrolled" class="fs-13 text-success mb-0">Enrolled</h5>
                                        <h5 v-else class="fs-13 text-warning mb-0">Not Enrolled</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                                class="ri-money-dollar-circle-fill"></i></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted fs-11 mb-1">Financial Status :</p>
                                        <h5 class="fs-13 mb-0">Continued</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-primary fs-24"><i class="ri-stack-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted fs-11 mb-1">GWA :</p>
                                        <h5 class="fs-13 mb-0">1.2</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="p-2 border border-dashed rounded">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <div class="avatar-title rounded bg-transparent text-primary fs-24">
                                            <i class="ri-wallet-3-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted fs-11 mb-1">Total Received :</p>
                                        <h5 class="fs-13 mb-0">{{calculateTotalSum()}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-n2">
                        <ul class="nav nav-pills nav-custom nav-custom-light small" role="tablist">
                            <li class="nav-item">
                                <b-link class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                    Home
                                </b-link>
                            </li>
                            <li class="nav-item">
                                <b-link class="nav-link" data-bs-toggle="tab" href="#enrollments" role="tab">
                                    Enrollments
                                </b-link>
                            </li>
                        </ul>
                    </div>
                    <hr class="text-muted mt-n1"/>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <table class="table tablez table-bordered table-nowrap align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="fs-11">
                                        <th class="text-center" width="20%">Academic Year</th>
                                        <th class="text-center" width="20%">Semester</th>
                                        <th class="text-center" width="20%">Enrolled</th>
                                        <th class="text-center" width="20%">Status</th>
                                    </tr>
                                </thead> 
                                <tbody class="text-center">
                                    <tr>
                                        <td rowspan="4">2023-2024</td>
                                    </tr>
                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>

                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>
                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>
                                </tbody>
                                 <tbody class="text-center">
                                    <tr>
                                        <td rowspan="4">2023-2024</td>
                                    </tr>
                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>

                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>
                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>
                                </tbody>
                                 <tbody class="text-center">
                                    <tr>
                                        <td rowspan="4">2023-2024</td>
                                    </tr>
                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>

                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>
                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>
                                </tbody>
                                 <tbody class="text-center">
                                    <tr>
                                        <td rowspan="4">2023-2024</td>
                                    </tr>
                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>

                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>
                                    <tr class="fs-12">
                                        <td>First Semester</td>
                                        <td>Second Semester</td>
                                        <td>Summer</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="enrollments" role="tabpanel">
                            <table class="table tablez table-bordered table-nowrap align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="fs-11">
                                        <th class="text-center" width="5%">#</th>
                                        <th class="text-center" width="20%">Academic Year</th>
                                        <th class="text-center" width="20%">Level</th>
                                        <th class="text-center" width="10%">No. of Fails</th>
                                        <th class="text-center" width="15%">Grades Submitted</th>
                                        <th class="text-center" width="15%">Benefits Received</th>
                                        <th class="text-center" width="15%">Status</th>
                                        <th></th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr class="font-size-11" v-for="(list,index) in enrollments" v-bind:key="index">
                                        <td class="text-center">{{index+1}}</td>
                                        <td class="text-center fs-12">{{list.semester.academic_year}} <span class="text-muted">| {{list.semester.semester.name}}</span></td>
                                        <td class="text-center fs-12">{{list.level}}</td>
                                        <td class="text-center fs-12">{{check(list.grades)}}</td>
                                        <td class="text-center fs-12">{{check3(list.grades)}}</td>
                                        <td class="text-center fs-12">{{check2(list.benefits)}}</td>
                                        <td class="text-center">
                                            <span v-if="!list.is_completed"><i class="text-danger ri-close-circle-fill" v-b-tooltip.hover title="Grades and Benefits not completed"></i></span>
                                            <span v-else><i class="text-success ri-checkbox-circle-fill" v-b-tooltip.hover title="Grades and Benefits completed"></i></span>
                                        </td>
                                        <td>
                                            <button @click="viewGrades(list)" class="btn btn-sm btn-label me-1" :class="(list.is_grades_completed == 1) ? 'btn-success' : 'btn-light' " type="button">
                                                <div class="btn-content"><i class="ri-eye-line label-icon align-middle fs-12 me-2"></i>Grades</div>
                                            </button>
                                            <button @click="viewBenefits(list)" class="btn btn-sm btn-label" :class="(list.is_benefits_released == 1) ? 'btn-success' : 'btn-light' " type="button">
                                                <div class="btn-content"><i class="ri-eye-line label-icon align-middle fs-12 me-2"></i>Benefits</div>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </b-modal>
    <Benefits ref="benefits"/>
    <Grades ref="grades"/>
</template>
<script>
import Benefits from '../Modal/Benefits.vue';
import Grades from '../Modal/Grades.vue';
export default {
    components : { Benefits, Grades },
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
            })
            .catch(err => console.log(err));
        },
        viewBenefits(list){
            this.$refs.benefits.show(list);
        },
        viewGrades(list){
            this.$refs.grades.show(list);
        },
        check(lists){
            const failed = lists.reduce((acc, val) => (val.is_failed == 1)  ? acc + 1 : acc, 0);
            return failed
        },
        check2(lists){
            const released = lists.reduce((acc, val) => (val.status_id == 13)  ? acc + 1 : acc, 0);
            return released +' of '+lists.length;
        },
        check3(lists){
            const count = lists.reduce((acc, val) => val.grade != null ? acc + 1 : acc, 0);
            return count +' of '+lists.length;
        },
        calculateTotalSum() {
            var total = 0;
            this.enrollments.map((list) => {
                list.benefits.map((list) => {
                    if(list.status_id == 13){
                    total = parseInt(total) + parseInt(list.amount);
                    }
                });
            });
            return this.formatMoney(total);
        },
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
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