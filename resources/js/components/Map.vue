<template lang="">
    <div>
        <!-- แสดงแผนที่ -->
        <GMapMap
            v-for="(item, index) in infos.slice(0, 1)"
            :key="index"
            :id="index"
            :center="item.geometry.location"
            :zoom="15"
            map-type-id="terrain"
            style="width: 100%; height: 80vh"
        >
        <!-- แสดง Marker บนแผนที่ -->
            <GMapMarker
                :key="index"
                v-for="(item, index) in infos"
                :position="item.geometry.location"
            >
            <!-- แสดงข้อมูลบน Marker-->
                <GMapInfoWindow>
                    <div>{{ item.name }}<MyComponent /></div>
                </GMapInfoWindow>
            </GMapMarker>
        </GMapMap>
    </div>
</template>
<script>
export default {
    name: "Map",
    component: {},
    props: ["infos"],
};
</script>
<style lang=""></style>
