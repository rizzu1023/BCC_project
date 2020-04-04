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
                <div class=" row">
                    <label class="col-4">Match</label>
                    <span class="col-8">{{ teamInfo.match}}</span>
                </div>
                <div class=" row">
                    <label class="col-4">Tournament</label>
                    <span class="col-8">{{ teamInfo.tournament}}</span>
                </div>
                <div class="row">
                    <label class="col-4">Date</label>
                    <span class="col-8">{{ teamInfo.dates }}</span>
                </div>
                <div class="row">
                    <label class="col-4">Time</label>
                    <span class="col-8">{{ teamInfo.times}}</span>
                </div>
                <div class="row">
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
        background: #c2f1db;
        color: #545a5f;
        padding : 8px 20px;
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

     }

     #matchInfo .card .card-body lable{
        color: #545a5f;
    }
     #matchInfo .card .card-body span{
        color : #000;
    }

     #matchInfo .list-group .list-group-item{
         border : 0;
         border-radius: 0;
     }
     #matchInfo .list-group .list-group-item h6{
         margin : 0px;
     }
     #matchInfo .list-group .first{
         border-bottom : 0.05rem solid lightgray;
     }
</style>
