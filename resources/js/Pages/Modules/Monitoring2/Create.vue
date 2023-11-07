<template>
    <Head title="Monitoring2" />
    <PageHeader :title="title" :items="items" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">

            </div>
         </div>

        <div class="file-manager-content p-3 w-100 pb-0" style="height: calc(100vh - 180px);" ref="box">
s
            <!-- <div class="row mb-3">
                <div class="col-sm-6 col-lg-3">
                    <div class="p-1 border border-dashed rounded">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                        class="ri-calendar-todo-line"></i></div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="fs-11 text-muted mb-1">Academic Year:</p>
                                <h6 class="text-success mb-0">2023-2024</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="p-1 border border-dashed rounded">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                        class="ri-file-copy-2-fill"></i></div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="fs-11 text-muted mb-1">Semester :</p>
                                <h6 class="text-dark mb-0">First Semester</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="p-1 border border-dashed rounded">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-primary fs-24"><i class="ri-file-copy-2-fill"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="fs-11 text-muted mb-1">Trimester :</p>
                                <h6 class="text-dark mb-0">First Quarter</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="p-1 border border-dashed rounded">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2">
                                <div class="avatar-title rounded bg-transparent text-primary fs-24"><i
                                        class="ri-file-copy-2-fill"></i></div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="fs-11 text-muted mb-1">Quarter Term :</p>
                                <h6 class="text-dark mb-0">First Quarter</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


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
            </div>
        </div>
    </div>
</template>
<script>
import PageHeader from "@/Shared/Components/PageHeader.vue";
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { PageHeader, Pagination },
    data() {
        return {
            currentUrl: window.location.origin,
            title: "Monitoring",
            items: [{text: "Monitor", href: "/",},{text: "Dasboard",active: true,},],
            icons: ['ri-checkbox-circle-fill text-success','ri-question-line text-warning','ri-close-circle-fill text-danger','ri-error-warning-fill text-dark'],
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
</style>