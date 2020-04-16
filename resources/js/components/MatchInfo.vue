<template>
    <div id="matchInfo">
        <div class="table-header">
            <span>SQUADS</span>
        </div>
        <ul class="list-group">
            <div>
                <router-link :to="'/teams/'+ this.$route.params.team1_id +'/players'" style="text-decoration:none; color:#000">
                    <li class="list-group-item first">
                        <h6 v-if="teamInfo.team1">{{ teamInfo.team1.team_name}}</h6>
                        <h6 v-else>Loading....</h6>
                    </li>
                </router-link>
                <router-link :to="'/teams/'+ this.$route.params.team2_id +'/players'" style="text-decoration:none; color:#000">
                    <li class="list-group-item">
                        <h6 v-if="teamInfo.team1">{{ teamInfo.team2.team_name}}</h6>
                        <h6 v-else>Loading....</h6>
                    </li>
                </router-link>
            </div>
        </ul>
        <div class="table-header">
            <span>INFO</span>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row m-0">
                    <label class="col-4">Match</label>
                    <span class="col-8">{{ teamInfo.match}}</span>
                    <label class="col-4">Tournament</label>
                    <span class="col-8">{{ teamInfo.tournament}}</span>
                    <label class="col-4">Date</label>
                    <span class="col-8">{{ teamInfo.dates }}</span>
                    <label class="col-4">Time</label>
                    <span class="col-8">{{ teamInfo.times}}</span>
                    <label class="col-4">Toss</label>
                    <span class="col-8">--</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MatchInfo",

        mounted : function () {
            this.loadMatchInfo();
            this.detectswipe('matchInfo',this.myfunction);

        },

        methods : {
           loadMatchInfo(){
               var $url = this.$domainName + "tournament/" + this.$route.params.tournament_id + "/match/" + this.$route.params.match_id + '/' + this.$route.params.team1_id + '/' + this.$route.params.team2_id + '/matchInfo';
               axios.get($url)
                   .then(response => this.teamInfo = response.data)
                   // .then(function(response){
                   //     console.log(response.data);
                   // })
                   .catch(function (error) {
                       console.log(error);
                   });
           },
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
                if( d == 'l' ){
                    this.$router.replace('live');
                }
            },
        },

        data : function () {
            return {
                'teamInfo' : {

                    },
            }
        }
    }
</script>

<style scoped>
     #matchInfo .table-header{
        background: #dbdbdb;
        color: #1e72fa;
        padding : 8px 12px;
    }
     #matchInfo .table-header span{
        font-size: 0.8rem;
        font-weight : bold;
        text-transform : uppercase;
    }
     #matchInfo  .card{
        border-radius : 0;
         border : none;

     }

     #matchInfo .card .card-body{
        font-size: 0.8rem;
         padding: 20px 12px;

     }

     #matchInfo .card .card-body lable{
        color: #1e72fa;
    }
     #matchInfo .card .card-body span{
        color : #000;
    }

     #matchInfo .list-group .list-group-item{
         border : 0;
         border-radius: 0;
         padding-left: 12px;
         padding-right: 12px;
     }
     #matchInfo .list-group .list-group-item h6{
         margin : 0px;
     }
     #matchInfo .list-group .first{
         border-bottom : 0.05rem solid lightgray;
     }

     #matchInfo .row{
        padding: 0;
        margin: 0;
     }
    #matchInfo .row .col-4{
        padding-left: 0;
    }
     #matchInfo .row .col-8{
         padding-right: 0;
     }

</style>
