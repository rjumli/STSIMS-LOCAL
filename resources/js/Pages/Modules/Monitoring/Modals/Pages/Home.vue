<template>

<!-- <hr class="text-muted mt-n1"/> -->
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
                    <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                            class="ri-inbox-archive-fill"></i></div>
                </div>
                <div class="flex-grow-1">
                    <p class="text-muted fs-11 mb-1">Total Received :</p>
                    <h5 class="fs-13 mb-0">{{calculateTotalSum()}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="mb-4">
 <ul class="nav nav-pills nav-justified nav-custom nav-custom-light" role="tablist">
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
</div> -->
<hr class="text-muted mt-n1"/>
    <table class="table tablez table-bordered table-nowrap align-middle mb-0">
        <thead class="table-light">
            <tr class="fs-11">
                <th class="text-center" width="4%">#</th>
                <th width="20%">Academic Year</th>
                <th class="text-center" width="20%">Level</th>
                <th class="text-center" width="10%">No. of Fails</th>
                <th class="text-center" width="15%">Grades Submitted</th>
                <!-- <th class="text-center" width="15%">Enrollment Status</th> -->
                <th class="text-center" width="15%">Benefits Received</th>
                <th class="text-center" width="15%">Status</th>
                <!-- <th class="text-center" width="15%">Benefit Status</th> -->
                <th></th>
            </tr>
        </thead> 
        <tbody>
            <tr class="font-size-11" v-for="(list,index) in enrollments" v-bind:key="index">
                <td class="text-center">{{index+1}}</td>
                <td class="fs-12">{{list.semester.academic_year}} <span class="text-muted">| {{list.semester.semester.name}}</span></td>
                <td class="text-center fs-12">{{list.level}}</td>
                <td class="text-center fs-12">{{check(list.grades)}}</td>
                <td class="text-center fs-12">{{check3(list.grades)}}</td>
                <!-- <td class="text-center">
                    <span v-if="!list.is_clear" class="badge bg-danger">Incomplete</span>
                    <span v-else class="badge bg-success">Cleared</span>
                </td> -->
                <td class="text-center fs-12">{{check2(list.benefits)}}</td>
                <td class="text-center">
                    <span v-if="!list.is_completed"><i class="text-danger ri-close-circle-fill" v-b-tooltip.hover title="Grades and Benefits not completed"></i></span>
                    <span v-else><i class="text-success ri-checkbox-circle-fill" v-b-tooltip.hover title="Grades and Benefits completed"></i></span>
                </td>
                <td>
                    <button @click="viewGrades(list)" class="btn btn-sm btn-label me-1" :class="(list.is_grades_completed == 1) ? 'btn-success' : 'btn-light' " type="button">
                        <div class="btn-content"><i class="ri-list-check label-icon align-middle fs-12 me-2"></i>View Grades</div>
                    </button>
                    <button @click="viewBenefits(list)" class="btn btn-sm btn-label" :class="(list.is_benefits_released == 1) ? 'btn-success' : 'btn-light' " type="button">
                        <div class="btn-content"><i class="ri-eye-line label-icon align-middle fs-12 me-2"></i>View Benefits</div>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <Benefits ref="benefits"/>
    <Grades ref="grades"/>
</template>
<script>
import Benefits from '../Benefits.vue';
import Grades from '../Grades';
export default {
    components : { Benefits, Grades },
    props: ['is_enrolled'],
    data(){
        return {
            enrollments: [],
            checks: []
        }
    },
    methods: {
        set(data){
            this.enrollments = data;
        },
        check(lists){
            const failed = lists.reduce((acc, val) => (val.is_failed == 1)  ? acc + 1 : acc, 0);
            return failed
        },
        check2(lists){
            // const count = lists.reduce((acc, val) => val.benefit_id == 1 ? acc + 1 : acc, 0);
            // const released = lists.reduce((acc, val) => (val.benefit_id == 1 && val.status_id == 13)  ? acc + 1 : acc, 0);
            // return released +' of '+count;
            const released = lists.reduce((acc, val) => (val.status_id == 13)  ? acc + 1 : acc, 0);
            return released +' of '+lists.length;
        },
        check3(lists){
            const count = lists.reduce((acc, val) => val.grade != null ? acc + 1 : acc, 0);
            return count +' of '+lists.length;
        },
        viewBenefits(list){
            this.$refs.benefits.show(list);
        },
        viewGrades(list){
            this.$refs.grades.show(list);
        },
        formatMoney(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return '₱'+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
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
    }
}
</script>