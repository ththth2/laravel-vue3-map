<template lang="">
    <div>
        <div class="card">
            <h5 class="card-header">{{ name }}</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h5 class="card-title">Address</h5>
                    </div>
                </div>
                <p class="card-text">
                    {{ address }}
                </p>
            </div>
        </div>
        <h3></h3>
    </div>
</template>
<script>
export default {
    name: "Item",
    components: {},
    props: ["name", "address", "photo"],
    methods: {
        //ตรวจสอบค่าที่อยู่ของรูป
        photolink() {
            const part1 = this.photo;
            console.log(part1);

            if (part1 === undefined) {
                const undefine =
                    "https://img.lovepik.com/free-png/20211126/lovepik-cartoon-triangle-watermelon-png-image_401146082_wh1200.png";
                console.log(undefine);
                return undefine;
            } else {
                const part2 = this.photo[0].photo_reference;
                const url1 =
                    "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=";
                const url2 =
                    "&sensor=false&key=AIzaSyD3KIHgynG4jULm9FEWISLvYiv1cMcfheI";
                const photos = url1 + part2 + url2;
                console.log(photos);
                return photos;
            }
        },
    },
};
</script>
<style lang=""></style>
