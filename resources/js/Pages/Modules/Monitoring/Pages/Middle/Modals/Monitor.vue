<template>
    <b-modal v-model="showModal" title="School Semesters" hide-footer header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop fullscreen>    

        <form class="d-none d-md-block fixed-div mt-n2">
            <div class="input-group mb-1">
                <span class="input-group-text"><i class="ri-search-line search-icon"></i></span>
                <input type="text" placeholder="Search School" class="form-control" style="width: 30%;" id="search-options">
                <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown" style="top: 38px; width: 100%;">
                    <div class="notification-list">
                        <b-link  @click="showScholar(list)" v-for="(list, index) of names" :key="index" class="d-flex dropdown-item notify-item py-2">
                            <img :src="currentUrl+'/images/avatars/'+list.profile.avatar" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                            <div class="flex-1">
                                <h6 class="m-0">{{ list.profile.name}}</h6>
                                <span class="fs-11 mb-0 text-muted">{{list.program}}</span>
                            </div>
                        </b-link>
                    </div>
                </div>
                <!-- <span @click="showBatch()"  class="input-group-text" style="cursor: pointer;" v-b-tooltip.hover title="Update by batch">
                    <i class="ri-calendar-todo-line text-primary search-icon"></i>
                </span>
                <span @click="showStatus()"  class="input-group-text" style="cursor: pointer;" v-b-tooltip.hover title="Update Status">
                    <i class="ri-service-fill text-primary  search-icon"></i>
                </span> -->
                <span @click="refresh" class="input-group-text" style="cursor: pointer;" id="search-close-options" v-b-tooltip.hover title="Refresh">
                    <i class="bx bx-refresh text-primary  search-icon"></i>
                </span>
                <button @click="showFilter()" class="btn btn-primary btn-md" type="button">
                    <div class="btn-content"><i class="ri-search-eye-line align-bottom me-1"></i> Filter </div>
                </button>
            </div>
        </form>

        <div class="row mt-3">
   
                     
    <div class="col-sm-6 col-lg-3">
        <div class="p-2 border border-dashed rounded">
            <div class="d-flex align-items-center">
                <div class="avatar-sm me-2">
                    <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                            class="ri-file-copy-2-fill"></i></div>
                </div>
                <div class="flex-grow-1">
                    <p class="text-muted fs-11 mb-1">Schools Status :</p>
                    <h5 class="fs-13 mb-0">{{schools.length}} <span class="text-success">open</span></h5>
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
                    <h5 class="fs-13 mb-0">21</h5>
                </div>
            </div>
        </div>
    </div>
</div>
        <hr class="text-muted"/>
        
        <div class="table-responsive mt-2">
            <table class="table table-nowrap align-middle">
                <thead class="table-light fs-12">
                    <tr>
                        <th width="3%" class="text-center">
                             <input class="form-check-input fs-16" type="checkbox" value="option" />
                        </th>
                        <th width="35%">School</th>
                        <th width="17%" class="text-center">Semester</th>
                        <th width="15%" class="text-center">Start At</th>
                        <th width="15%" class="text-center">End At</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="5%"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="table-responsive mt-n3" data-simplebar style="height: 62vh; overflow: auto;">
            <table class="table table-bordered table-nowrap align-middle">
                <tbody>
                    <!-- :class="(list.academic_year == '-') ? 'table-warning' : ''" -->
                    <tr v-for="(list,index) in schools" v-bind:key="index">
                        <td width="3%" class="text-center">
                            <input type="checkbox" name="chk_child" class="form-check-input" />
                        </td>
                        <td width="35%" class="fw-semibold">{{list.name}}</td>
                        <td width="17%" class="text-center">{{list.academic_year}}</td>
                        <td width="15%" class="text-center">{{list.start}}</td>
                        <td width="15%" class="text-center">{{list.end}}</td>
                        <td width="10%" class="text-center">
                            <b-badge v-if="list.status" variant="success">Open</b-badge>
                            <b-badge v-else variant="danger">Close</b-badge>
                        </td>
                        <td width="5%"></td>
                    </tr>
                </tbody>
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
            currentUrl: window.location.origin,
            showModal: false,
            settings: '',
            schools: []
        }
    },
    methods : {
        show(settings) {
            this.settings = settings;
            this.showModal = true;
            this.fetch();
        },
        fetch(){
            axios.get(this.currentUrl+'/monitoring', {
                params: {
                    type: 'schoolsemesters'
                }
            })
            .then(response => {
                this.schools = response.data.data;
            })
            .catch(err => console.log(err));
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>

