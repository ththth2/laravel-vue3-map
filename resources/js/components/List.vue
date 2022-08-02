<template lang="">
    <div>
        <!-- แสดง component Item -->
        <Item
            :infos="infos"
            v-for="(item, index) in infos"
            :key="index"
            :id="index"
            :name="item.name"
            :address="item.formatted_address"
            :photo="item.photos"
        />
    </div>
</template>
<script>
import Item from "./Item.vue";
export default {
    name: "List",
    components: {
        Map,
        Item,
    },
    props: ["infos"],
};
</script>
<style lang=""></style>
