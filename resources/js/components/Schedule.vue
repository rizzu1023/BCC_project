<template>
    <div id="schedule">
        <div v-if="schedules">
            <div v-if="schedules.length > 0">
        <ul class="list-group">
            <div  v-for="schedule in schedules" :key="schedule.id" :data="schedule">
                <router-link :to="'/tournament/'+schedule.tournament_id+'/match/' + schedule.id + '/' + schedule.team1_id.id + '/' + schedule.team2_id.id + '/info'" style="text-decoration:none; color:#000">
                    <li class="list-group-item" v-on:click="header_string(schedule.team1_id.team_code,schedule.team2_id.team_code)">
                        <span class="text-muted" style="font-size: 12px">Match {{ schedule.match_no }}</span>
                        <h6 class="mt-2"><b>{{ schedule.team1_id.team_name }}</b></h6>
                        <h6><b>{{ schedule.team2_id.team_name}}</b></h6>
                        <span class="text-danger" style="font-size: 12px">{{ schedule.times}}</span>

                    </li>
                </router-link>
            </div>
        </ul>
            </div>
            <div id="not_started" v-else>
                <span>Matches Not found</span>
            </div>
        </div>
        <div id="loader" v-else>
            <div id="preloader"></div>
        </div>
    </div>
</template>

<script>




    export default {
        name: "Schedule",

        mounted : function() {
            this.loadSchedule();
            this.detectswipe('schedule',this.myfunction)

        },

        methods:  {
            loadSchedule() {
                var $url =  this.$domainName + "tournaments/" + this.$route.params.tournament_id + "/schedules";
                axios.get($url)
                    .then(response => this.schedules = response.data)
                    .catch(function(error){
                        console.log(error)
                    });

            },

            header_string(team1, team2){
                var value = team1 + ' vs ' + team2;
                Event.$emit('headerString',value);

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
                    this.$router.replace('teams');
                }
            },
        },

        data : function(){
            return {
                schedules : null,
            }
        }
    }
</script>

<style scoped>
    #schedule .list-group-item{
        border-radius: 0;
        border-right: 0;
        border-left: 0;
        border-top:0;
        padding-left: 12px;
        padding-right: 12px;
    }

    #schedule .list-group-item:hover, #schedule .list-group-item:active {
        background-color: #f0f0f0;
    }

    #loader{
        background: #f8fafc;
    }
    #preloader {
        height: 30px;
        width: 30px;
        margin: 40vh auto;
        border: 5px solid #dbdbdb;
        border-top: 5px solid #1e72fa;
        border-radius: 50%;
        animation: rotate 1s infinite linear;
    }

    #schedule  #not_started{
          width: 100vw;
          text-align: center;
          background: #f8fafc;
          margin-top: 45vh;
      }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>
