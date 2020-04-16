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
            this.detectswipe('pointsTable',this.myfunction);
        },

        methods: {
            detectswipe(el, func) {
                var swipe_det;
                swipe_det = new Object();
                swipe_det.sX = 0;
                swipe_det.sY = 0;
                swipe_det.eX = 0;
                swipe_det.eY = 0;
                var min_x = 30;  //min x swipe for horizontal swipe
                var max_x = 30;  //max x difference for vertical swipe
                var min_y = 50;  //min y swipe for vertical swipe
                var max_y = 60;  //max y difference for horizontal swipe
                var direc = "";
                var ele = document.getElementById(el);
                ele.addEventListener('touchstart', function (e) {
                    var t = e.touches[0];
                    swipe_det.sX = t.screenX;
                    swipe_det.sY = t.screenY;
                }, false);
                ele.addEventListener('touchmove', function (e) {
                    e.preventDefault();
                    var t = e.touches[0];
                    swipe_det.eX = t.screenX;
                    swipe_det.eY = t.screenY;
                }, false);
                ele.addEventListener('touchend', function (e) {
                    //horizontal detection
                    if ((((swipe_det.eX - min_x > swipe_det.sX) || (swipe_det.eX + min_x < swipe_det.sX)) && ((swipe_det.eY < swipe_det.sY + max_y) && (swipe_det.sY > swipe_det.eY - max_y) && (swipe_det.eX > 0)))) {
                        if (swipe_det.eX > swipe_det.sX) {
                            direc = "r";
                        }

                        else direc = "l";
                    }
                    //vertical detection
                    else if ((((swipe_det.eY - min_y > swipe_det.sY) || (swipe_det.eY + min_y < swipe_det.sY)) && ((swipe_det.eX < swipe_det.sX + max_x) && (swipe_det.sX > swipe_det.eX - max_x) && (swipe_det.eY > 0)))) {
                        if (swipe_det.eY > swipe_det.sY) direc = "d";
                        else direc = "u";
                    }

                    if (direc != "") {
                        if (typeof func == 'function') func(el, direc);
                    }

                    direc = "";
                    swipe_det.sX = 0;
                    swipe_det.sY = 0;
                    swipe_det.eX = 0;
                    swipe_det.eY = 0;
                }, false);
            },

            myfunction(el,d) {
                if( d == 'r' ){
                    this.$router.replace('stats');
                }
            },

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
