<template>
    <Head title="Monitoring" />
    <PageHeader :title="title" :items="items" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
                <Sidebar :counts="counts" :semester_year="semester_year" :dropdowns="dropdowns"/>
            </div>
         </div>

        <div class="file-manager-content p-3 pb-0" style="height: calc(100vh - 180px); width: 720px;" ref="box">
            <div class="card p-4 border shadow-none mb-4 mt-0">
                <div class="row g-0 text-center mt-n4 mb-n4">
                    <div class="col-sm-4 col-6" v-for="(list,index) in checking" v-bind:key="index">
                        <div class="p-3 border border-dashed border-start-0">
                            <h5 class="mb-1"><span class="text-success ms-1 fs-12">{{list.completed}}</span><span class="fs-12"> / {{list.count}}</span></h5>
                            <p class="text-muted mb-0">{{list.name}}  <i class="ri-question-fill" style="cursor: pointer;"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="input-group mb-1">
                    <span class="input-group-text"><i class="ri-search-line search-icon"></i></span>
                    <input type="text" placeholder="Search Scholar" v-model="keyword" class="form-control" style="width: 30%;">
                     <span @click="showBatch()"  class="input-group-text" style="cursor: pointer;" v-b-tooltip.hover title="Update by batch">
                        <i class="ri-calendar-todo-line text-primary search-icon"></i>
                    </span>
                    <span @click="showStatus()"  class="input-group-text" style="cursor: pointer;" v-b-tooltip.hover title="Update Status">
                        <i class="ri-service-fill text-primary  search-icon"></i>
                    </span>
                    <span @click="refresh" class="input-group-text" style="cursor: pointer;" v-b-tooltip.hover title="Refresh">
                        <i class="bx bx-refresh text-primary  search-icon"></i>
                    </span>
                    <button @click="showFilter()" class="btn btn-primary btn-md" type="button">
                        <div class="btn-content"><i class="ri-search-eye-line align-bottom me-1"></i> Filter </div>
                    </button>
                </div>
                 <ul class="treding-keywords list-inline mb-0 mt-2 fs-11">
                    <li class="list-inline-item text-danger fw-semibold"><i
                            class="ri-search-eye-line align-middle"></i> Filters:</li>
                    <li class="list-inline-item">
                        <b-link href="#">Testing</b-link>
                    </li>
                </ul>
            </div>
            <hr class="text-muted mb-0 mt-3"/>
            <div class="table-responsive">
                <table class="table table-slide table-nowrap align-middle">
                    <thead class="table-light fs-11">
                        <tr>
                            <th class="fixed-column" style="width: 1000px;">Name</th>
                            <th class="text-center" width="700px;">School</th>
                            <th class="text-center" width="700px;">Course</th>
                            <th class="text-center" width="700px;">Level</th>
                            <th class="text-center" width="700px;">Awarded Year</th>
                            <th class="text-center fixed-column" style="width: 500px;">Status</th>
                            <th class="text-center fixed-column" style="width: 500px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user,index) in lists" v-bind:key="index">
                            <td class="fixed-column">
                                 <div class="d-flex align-items-center">
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
                            <!-- <td>
                                <h5 class="fs-12 mb-0 text-dark">{{user.profile.name}}</h5>
                                <p class="fs-11 text-muted mb-0">{{user.spas_id}}</p>
                            </td> -->
                            <!-- <td class="text-center fs-12" style="cursor: default;">
                                <h5 class="fs-12 mb-0 text-dark" v-b-tooltip.hover :title="user.education.school.name">{{user.education.school.shortcut}}</h5>
                                <p class="fs-11 text-muted mb-0">{{user.education.course.name}}</p>
                            </td> -->
                            <td class="text-center fs-11">{{user.education.school.shortcut}}</td>
                            <td class="text-center fs-11">{{user.education.course.name}}</td>
                            <td class="text-center fs-11">{{(user.education.level != 'n/a') ? user.education.level.others : user.education.level}}</td>
                            <td class="text-center fs-11">{{user.awarded_year}}</td>
                            <!-- <td class="text-center fs-11">{{user.category}}</td>
                            <td class="text-center fs-11">{{user.program}}</td>
                            <td class="text-center fs-11">{{user.subprogram}}</td> -->
                            <td class="text-center fs-11">
                                <span :class="'badge '+user.status.color+' '+user.status.others">{{user.status.name}}</span>
                            </td>
                            <td class="text-end fixed-column">
                                <b-button @click="showUpdate(user,'status',index,'ongoing')" variant="soft-warning" v-b-tooltip.hover title="Update Status" size="sm" class="remove-list me-1"><i class="ri-heart-fill align-bottom"></i></b-button>
                               <b-button @click="view(user)" variant="soft-primary" v-b-tooltip.hover title="View Scholar" size="sm" class="remove-list me-1"><i class="ri-eye-fill align-bottom"></i></b-button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetchScholars" :lists="lists.length" :links="links" :pagination="meta" />
        </div>

        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
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
import PageHeader from "@/Shared/Components/PageHeader.vue";
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { PageHeader, Pagination, Sidebar, Rightbar, Filter, View, Status, Update, Batch },
    props: ['semester_year','dropdowns','regions', 'programs', 'dropdowns', 'statuses','statuses1','checking','released','counts'],
    data() {
        return {
            currentUrl: window.location.origin,
            title: "Monitoring",
            items: [{text: "Monitor", href: "/",},{text: "Dasboard",active: true,},],
            icons: ['ri-checkbox-circle-fill text-success','ri-question-line text-warning','ri-close-circle-fill text-danger','ri-error-warning-fill text-info'],
            lists: [],
            meta: {},
            links: {},
            subfilters: [],
            status: null,
            keyword: '',
            page: '',
            flag: null
        };
    },
    created(){
        this.fetchScholars();
    },
     watch: {
        keyword(newVal){
            this.checkSearchStr(newVal);
        }
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetchScholars();
        }, 300),
        fetchScholars(page_url){
            page_url = page_url || '/monitoring';
            
            axios.get(page_url, {
                params: {
                    type: 'lists',
                    subfilters: this.subfilters,
                    counts: ((window.innerHeight-500)/56),
                    status: this.status,
                    keyword: this.keyword
                }
            })
            .then(response => {
                this.lists = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
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
        }
    }
}
</script>
<style>
.file-manager-sidebar {
    min-width: 450px;
    max-width: 450px;
    height: calc(100vh - 180px);
}
.table-slide {
    border-collapse: separate;
    border-spacing: 0;
}
.table-slide th:first-child, .table td:first-child {
    position: sticky;
    left: 0;
}
.table-slide th:last-child, .table td:last-child {
    position: sticky;
    right: 0;
}
.table-slide td:first-child {
    position: sticky;
    left: 0;
    background-color: #ffffff;
}
.table-slide td:last-child {
    position: sticky;
    right: 0;
    background-color: #ffffff;
}

</style>