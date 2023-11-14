<template>
    <Head title="Monitoring" />
    <PageHeader :title="title" :items="items" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100 file-detail-content-scroll" data-simplebar>
                <Sidebar :counts="counts" :semester_year="semester_year" :dropdowns="dropdowns"/>
            </div>
         </div>

        <div class="file-manager-content p-3 pb-0 w-100" ref="myDiv">
             <!-- <button @click="getDivHeight">Get Div Height</button>
            <div class="card p-4 border shadow-none mb-4 mt-0">
                <div class="row g-0 text-center mt-n4 mb-n4">
                    <div class="col-sm-4 col-6" v-for="(list,index) in checking" v-bind:key="index">
                        <div class="p-3 border border-dashed border-start-0">
                            <h5 class="mb-1"><span class="text-success ms-1 fs-12">{{list.completed}}</span><span class="fs-12"> / {{list.count}}</span></h5>
                            <p class="text-muted mb-0">{{list.name}}  <i class="ri-question-fill" style="cursor: pointer;"></i></p>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <div class="col-lg">
                <form class="d-none d-md-block">
                    <div class="input-group mb-1">
                        <span class="input-group-text"><i class="ri-search-line search-icon"></i></span>
                        <input type="text" placeholder="Search Scholar" class="form-control" style="width: 30%;" id="search-options">
                        <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown" style="top: 38px; width: 100%;">
                            <!-- <SimpleBar data-simplebar style="max-height: height: calc(100vh/2 - 326px)"> -->
                                <div class="notification-list">
                                    <b-link  @click="view(list)" v-for="(list, index) of names" :key="index" class="d-flex dropdown-item notify-item py-2">
                                        <img :src="currentUrl+'/images/avatars/'+list.profile.avatar" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                        <div class="flex-1">
                                            <h6 class="m-0">{{ list.profile.name}}</h6>
                                            <span class="fs-11 mb-0 text-muted">{{list.program}}</span>
                                        </div>
                                    </b-link>
                                </div>
                            <!-- </SimpleBar> -->
                        </div>
                        <span @click="showBatch()"  class="input-group-text" style="cursor: pointer;" v-b-tooltip.hover title="Update by batch">
                            <i class="ri-calendar-todo-line text-primary search-icon"></i>
                        </span>
                        <span @click="showStatus()"  class="input-group-text" style="cursor: pointer;" v-b-tooltip.hover title="Update Status">
                            <i class="ri-service-fill text-primary  search-icon"></i>
                        </span>
                        <span @click="refresh" class="input-group-text" style="cursor: pointer;" id="search-close-options" v-b-tooltip.hover title="Refresh">
                            <i class="bx bx-refresh text-primary  search-icon"></i>
                        </span>
                        <button @click="showFilter()" class="btn btn-primary btn-md" type="button">
                            <div class="btn-content"><i class="ri-search-eye-line align-bottom me-1"></i> Filter </div>
                        </button>
                    </div>
                </form>
                 <!-- <ul class="treding-keywords list-inline mb-0 mt-2 fs-11">
                    <li class="list-inline-item text-danger fw-semibold"><i
                            class="ri-search-eye-line align-middle"></i> Filters:</li>
                    <li class="list-inline-item">
                        <b-link href="#">Testing</b-link>
                    </li>
                </ul> -->
            </div>
            <hr class="text-muted"/>
                <!-- <span class="fw-semibold fs-12">Location Information</span>
            <hr class="text-muted"/> -->

            <div class="row mt-0 mb-4" style="--vz-gutter-x: 0.6rem;">    
                 <div class="col-sm-12 col-lg-12 mb-2">
                    <div class="p-2 border border-dashed rounded">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                        class="ri-calendar-fill"></i></div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted fs-11 mb-0">Academic Year :</p>
                                <h5 class="fs-16 text-success mb-0">2023-2024</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="p-2 border border-dashed rounded">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                        class="ri-calendar-2-line"></i></div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted fs-11 mb-1">Semester :</p>
                                <h5 class="fs-13 mb-0">First Semester</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="p-2 border border-dashed rounded">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                        class="ri-calendar-2-line"></i></div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted fs-11 mb-1">Trimester :</p>
                                <h5 class="fs-13 mb-0">First Quarter</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="p-2 border border-dashed rounded">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-primary fs-24"><i class="ri-calendar-2-line"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted fs-11 mb-1">Quarter Term :</p>
                                <h5 class="fs-13 mb-0">First Quarter</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="text-muted mt-n2"/>

            <!-- <b-col cols="6" xxl="3" class=" folder-card">
                <b-card no-body class="bg-light shadow-none" id="folder-1">
                  <b-card-body>
                    
                      

                    <div class="text-center">
                      <div class="mb-2">
                        <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                      </div>
                      <h6 class="fs-15 folder-name">testing</h6>
                    </div>
                    <div class="hstack mt-4 text-muted">
                      <span class="me-auto"><b>123</b> Files</span>
                      <span><b>12</b>GB</span>
                    </div>
                  </b-card-body>
                </b-card>
              </b-col> -->
            <!-- <div class="table-responsive">
                <table class="table table-nowrap align-middle">
                    <thead class="table-light fs-11">
                        <tr>
                            <th width="70%"><span style="margin-left: 40px;">Scholar</span></th>
                            <th width="20%" class="text-center">Status</th>
                            <th width="10%" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user,index) in lists" v-bind:key="index">
                            <td>
                                <div class="d-flex align-items-center ms-n2">
                                    <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                        <img :src="currentUrl+'/images/avatars/'+user.profile.avatar" class="rounded-circle avatar-xs" alt="">
                                        <span class="user-status" :style="(user.profile.sex == 'Male') ? 'background-color: #5cb0e5;' : 'background-color: #e55c7f;'"></span>
                                    </div>
                                    <div>
                                        <h5 class="fs-12 mb-0 text-dark">{{user.profile.name}}</h5>
                                        <p class="fs-11 text-muted mb-0">{{user.spas_id}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center fs-11">
                                <span :class="'badge '+user.status.color+' '+user.status.others">{{user.status.name}}</span>
                            </td>
                            <td class="text-end">
                                <b-button @click="showUpdate(user,'status',index,'ongoing')" variant="soft-warning" v-b-tooltip.hover title="Update Status" size="sm" class="remove-list me-1"><i class="ri-heart-fill align-bottom"></i></b-button>
                               <b-button @click="view(user)" variant="soft-primary" v-b-tooltip.hover title="View Scholar" size="sm" class="remove-list me-n2"><i class="ri-eye-fill align-bottom"></i></b-button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetchScholars" :lists="lists.length" :links="links" :pagination="meta" /> -->
        </div>

        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100 file-detail-content-scroll" data-simplebar>
                <Rightbar :statuses="statuses1" :released="released"/>
            </div>
         </div>
    </div>
    <Filter :regions="regions" :programs="programs" @status="subfilter" ref="filter"/>
    <View ref="view"/>
    <Status ref="status"/>
    <Update ref="update" :statuses="statuses" :dropdowns="dropdowns"/>
    <Batch ref="batch"/>
</template>
<script>
import Batch from './Modals/Batch.vue';
import Status from './Modals/Status.vue';
import View from './Modals/View.vue';
import Filter from './Modals/Filter.vue';
import Sidebar from './Sidebar.vue';
import Rightbar from './Rightbar.vue';
import Update from '../Scholars/Modals/Update.vue';
import { SimpleBar } from "simplebar-vue3";
import PageHeader from "@/Shared/Components/PageHeader.vue";
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { PageHeader, Pagination, SimpleBar, Sidebar, Rightbar, Filter, View, Status, Update, Batch },
    props: ['semester_year','dropdowns','regions', 'programs', 'dropdowns', 'statuses','statuses1','checking','released','counts'],
    data() {
        return {
            currentUrl: window.location.origin,
            title: "Monitoring",
            items: [{text: "Monitor", href: "/",},{text: "Dasboard",active: true,},],
            icons: ['ri-checkbox-circle-fill text-success','ri-question-line text-warning','ri-close-circle-fill text-danger','ri-error-warning-fill text-info'],
            names: [],
            subfilters: [],
            status: null,
            keyword: '',
            page: '',
            flag: null
        };
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.keyword = string;
            this.fetchScholars();
        }, 500),
        fetchScholars(page_url){
            page_url = page_url || '/monitoring';
            
            axios.get(page_url, {
                params: {
                    type: 'lists',
                    subfilters: this.subfilters,
                    // counts: ((window.innerHeight-500)/56),
                    status: this.status,
                    keyword: this.keyword
                }
            })
            .then(response => {
                this.names = response.data.data;
            })
            .catch(err => console.log(err));
        },
        updateStatus(status){
            this.status = status;
            this.fetchScholars();
        },
        view(user){
            this.$refs.view.show(user);
        },
        filterEducation(){
            this.$refs.education.set();
        },
        firstLetters(originalText) {
            const wordsToRemove = ["IN", "AND", "OF"];
            const excludedWords = ["BS", "BSE"];
            const words = originalText.split(" ");
            const initials = words.map(word => excludedWords.includes(word) ? word : word.charAt(0));
            const filteredWords = initials.filter(word => !wordsToRemove.includes(word.toUpperCase()));
            return filteredWords.join("");
        },
        subfilter(list){
            this.subfilters = list;
            this.subfilters = (Object.keys(this.subfilters).length == 0) ? '-' : JSON.stringify(this.subfilters);
            this.fetchScholars();
        },
        showFilter(){
            this.$refs.filter.show();
        },
        showStatus(){
            this.$refs.status.show();
        },
        showBatch(){
            this.$refs.batch.show();
        },
        showUpdate(data,type,index,sub){
            this.flag = type;
            this.index = index;
            this.$refs.update.show(data,type,sub);
        },
        view(user){
            this.$refs.view.show(user);
        },
        refresh(){
            this.subfilters = [];
            this.fetchScholars();
        },
        getDivHeight() {
           const myDivElement = this.$refs.myDiv;

        // Retrieve the height property
        const height = myDivElement.clientHeight;
         console.log('Height of the div:', height);
        },
        isCustomDropdown() {
            var searchOptions = document.getElementById("search-close-options");
            var dropdown = document.getElementById("search-dropdown");
            var searchInput = document.getElementById("search-options");

            searchInput.addEventListener("focus", () => {
                var inputLength = searchInput.value.length;
                if (inputLength > 0) {
                    dropdown.classList.add("show");
                    searchOptions.classList.remove("d-none");
                } else {
                    dropdown.classList.remove("show");
                    searchOptions.classList.add("d-none");
                }
            });

            searchInput.addEventListener("keyup", () => {
                var inputLength = searchInput.value.length;
                if (inputLength > 0) {
                    dropdown.classList.add("show");
                    searchOptions.classList.remove("d-none");
                    this.checkSearchStr(searchInput.value);
                } else {
                    dropdown.classList.remove("show");
                    searchOptions.classList.add("d-none");
                }
            });

            searchOptions.addEventListener("click", () => {
                searchInput.value = "";
                dropdown.classList.remove("show");
                searchOptions.classList.add("d-none");
            });

            document.body.addEventListener("click", (e) => {
                if (e.target.getAttribute("id") !== "search-options") {
                    dropdown.classList.remove("show");
                    searchOptions.classList.add("d-none");
                }
            });
        }
    },
    mounted() {
        this.isCustomDropdown();
    },
}
</script>
<style>
.file-manager-sidebar {
    min-width: 450px;
    max-width: 450px;
    height: calc(100vh - 180px);
}
</style>