<template>
    <div id="schedule">
        <ul class="list-group">
            <div  v-for="schedule in schedules" :key="schedule.id" :data="schedule">
                <router-link :to="'/tournament/'+schedule.tournament_id+'/match/' + schedule.id + '/' + schedule.team1_id.id + '/' + schedule.team2_id.id" style="text-decoration:none; color:#000">
                    <li class="list-group-item" style="border-radius: 0;">
                        <span class="text-muted" style="font-size: 12px">Match {{ schedule.match_no }}</span>
                        <h6 class="mt-2"><b>{{ schedule.team1_id.team_name }}</b></h6>
                        <h6><b>{{ schedule.team2_id.team_name}}</b></h6>
                        <span class="text-danger" style="font-size: 12px">{{ schedule.times}}</span>
                    </li>
                </router-link>
            </div>
        </ul>
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
        },

        data : function(){
            return {
                schedules : null,
            }
        }
    }
</script>

<style scoped>
    .list-group-item{
        border-right: 0;
        border-left: 0;
        border-top:0;
    }
</style>
