<template>
    <Head title="Monitoring" />
    <PageHeader :title="title" :items="items" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100 file-detail-content-scroll" data-simplebar>
                <Left :counts="counts" :settings="settings" :dropdowns="dropdowns"/>
            </div>
         </div>
        <div class="file-manager-content p-3 pb-0 w-100" ref="myDiv">
            <Middle :settings="settings" :dropdowns="dropdowns" :terms="terms"/>
        </div>
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100 file-detail-content-scroll" data-simplebar>
               <Right :statuses="count_status" :released="count_released"/>
            </div>
         </div>
    </div>
</template>
<script>
import Left from './Pages/Left/Index.vue';
import Right from './Pages/Right/Index.vue';
import Middle from './Pages/Middle/Index.vue';
import PageHeader from "@/Shared/Components/PageHeader.vue";
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { PageHeader, Pagination, Left, Right, Middle },
    props: ['settings','dropdowns','regions', 'programs', 'dropdowns', 'statuses', 'terms', 'count_status','count_checking','count_released','counts'],
    data() {
        return {
            currentUrl: window.location.origin,
            title: "Monitoring",
            items: [{text: "Monitor", href: "/",},{text: "Dasboard",active: true,},],
        };
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