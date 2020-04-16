<template>
    <div id="pointsTable">
        <div class="text-center ">
            <h4 class="pt-5">Working on it...</h4>
            <div id='swipeme'>
                swipe me
            </div>

        </div>
    </div>
</template>

<script>

    export default {
        name: "PointsTable",

        mounted() {
            var route = this.$router;
            $(function () {
                $("#pointsTable").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction == 'right'){
                            route.replace('stats');
                        }
                    }, allowPageScroll: "auto"
                });
            });
        },

        methods: {


        },
        // mixins : [swipeMixin],

    }
</script>

<style scoped>
    #swipeme {
        width:100%;
        height:100%;
        background-color:lightgray;
        color:black;
        text-align:center;
        padding-top:20%;
        padding-bottom:20%;
    }
</style>
