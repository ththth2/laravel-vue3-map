<template>
    <div class="p-4">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-1 col-sm-2">
                    <label class="form-label text-uppercase fw-bold"
                        >Restaurant</label
                    >
                </div>
                <div class="col-xl-8">
                    <input
                        class="form-control"
                        id="txtsearch"
                        type="text"
                        name="choice"
                    />
                </div>
                <div class="col-1 mb-2">
                    <!-- เรียกใช้ function ดึงข้อมูล -->
                    <button class="btn btn-primary mt-2" v-on:click="getData()">
                        Submit
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-xl-none w-auto">
                <button
                    @click="toggleVisible"
                    class="btn bg-secondary bg-opacity-50 my-2"
                >
                    List
                </button>
            </div>
            <transition name="fade">
                <div
                    v-show="isVisible"
                    class="col-12 col-xl-5 pt-3 overflow-auto bg-secondary bg-opacity-50 heightList"
                >
                    <!-- List component -->
                    <List :infos="infos" />
                </div>
            </transition>
            <div class="col-12 col-xl-7 my-auto">
                <div class="mt-4">
                    <!-- Map component -->
                    <Map :infos="infos" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import Map from "./Map.vue";
import List from "./List.vue";
export default {
    name: "app",
    components: {
        Map,
        List,
    },
    mounted() {
        this.getData();
    },
    methods: {
        //ดึงค่าจาก api
        getData() {
            var topMenuChoice = document.getElementById("txtsearch").value;
            const article = { title: topMenuChoice };
            axios.post("/api/ping", article).then((response) => {
                this.infos = response.data;
            });
        },
        //function ซ่อนข้อมูล
        toggleVisible() {
            this.isVisible = !this.isVisible;
        },
    },
    data() {
        return {
            infos: [],
            isVisible: true,
        };
    },
};
</script>
<style scoped>
.heightList {
    height: 89vh;
}
.fade-enter-active {
    transition: all 0.8s ease-in-out;
}

.fade-leave-active {
    transition: all 0.8s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
    transform: translateX(-20px);
    opacity: 0;
}
</style>
