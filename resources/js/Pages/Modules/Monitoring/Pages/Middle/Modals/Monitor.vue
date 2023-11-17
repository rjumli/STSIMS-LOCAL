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
        <div class="table-responsive mt-2">
            <table class="table table-nowrap align-middle">
                <thead class="table-light fs-12">
                    <tr>
                        <th width="2%">
                             <input class="form-check-input fs-16" type="checkbox" value="option" />
                        </th>
                        <th width="33%">School</th>
                        <th width="20%" class="text-center">Semester</th>
                        <th width="15%" class="text-center">Start At</th>
                        <th width="15%" class="text-center">End At</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="5%"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="table-responsive mt-n3" style="height: 75vh; overflow: auto;">
            <table class="table table-nowrap align-middle">
                <tbody>
                    <tr v-for="(list,index) in schools" v-bind:key="index" :class="(list.semesters.length == 0) ? 'table-warning' : ''">
                        <td width="2%"><input type="checkbox" name="chk_child" class="form-check-input" /></td>
                        <td width="33%" class="fw-semibold">{{list.name}}</td>
                        <td width="20%"></td>
                        <td width="15%"></td>
                        <td width="15%"></td>
                        <td width="10%"></td>
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

