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

            }
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
