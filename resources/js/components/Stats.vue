<template>
    <div id="stats" >
        <div class="py-2 table-header">
            <span>Batting</span>
        </div>
        <ul class="list-group">
                <router-link :to="'/stats/' + $route.params.tournament_id + '/mostRuns'">
                    <li class="list-group-item" >
                        <span>Most Runs</span>
                    </li>
                </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/highestScores'" >
                <li class="list-group-item">
                    <span>Highest Scores</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBattingAverage'"  >
                <li class="list-group-item">
                    <span>Best Batting Average</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBattingStrikeRate'"  >
                <li class="list-group-item">
                    <span>Best Batting Strike Rate</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostHundreds'"  >
                <li class="list-group-item">
                    <span>Most Hundreds</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostFifties'"  >
                <li class="list-group-item">
                    <span>Most Fifties</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostFours'"  >
                <li class="list-group-item">
                    <span>Most Fours</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostSixes'"  >
                <li class="list-group-item" >
                    <span>Most Sixes</span>
                </li>
            </router-link>
        </ul>

        <div class="py-2 table-header">
            <span>Bowling</span>
        </div>
        <ul class="list-group">
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostWickets'"  >
                <li class="list-group-item" >
                    <span>Most Wickets</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowlingAverage'"  >
                <li class="list-group-item">
                    <span>Best Bowling Average</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowling'"  >
                <li class="list-group-item">
                    <span>Best Bowling</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestEconomy'"  >
                <li class="list-group-item">
                    <span>Best Economy</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowlingStrikeRate'"  >
                <li class="list-group-item">
                    <span>Best Bowling Strike Rate</span>
                </li>
            </router-link>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Stats",

        mounted: function () {
            // Event.$emit('firstEvent');
            this.detectswipe('stats',this.myfunction)
        },

        methods : {
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
                    this.$router.replace('teams');
                }
                if( d == 'l' ){
                    this.$router.replace('pointsTable');
                }
            },
        }
    }
</script>

<style scoped>
    #stats .table-header{
        background: #dbdbdb;
        padding-left: 12px;
        padding-right: 12px;

    }
    #stats .table-header span{
        font-size: 0.8rem;
        color: #1e72fa;
        font-weight : bold;
    }

    #stats .list-group-item{
        border-radius: 0;
        border-right: 0;
        border-left: 0;
        border-top:0;
        padding-left: 12px;
        padding-right: 12px;
    }
    #stats .list-group-item:hover, #stats .list-group-item:active {
        background-color: #f0f0f0;
    }

    #stats .list-group-item span{
        font-size: 0.8rem;

    }

    #stats .list-group a{
        text-decoration : none;
        color : #000;
    }
</style>
