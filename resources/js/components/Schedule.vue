<template>
    <div id="schedule">
        <ul class="list-group">
            <div  v-for="schedule in schedules" :key="schedule.id" :data="schedule">
                <router-link :to="'/schedules/'+schedule.id+'/players'" style="text-decoration:none; color:#000">
                    <li class="list-group-item" style="border-radius: 0;">
                        <h6 class="text-muted">Match {{ schedule.match_no }}</h6>
                        <h5><b>{{ schedule.team1_id.team_name }}</b></h5>
                        <h5><b>{{ schedule.team2_id.team_name}}</b></h5>
                        <h6 class="text-danger">{{ schedule.times}}</h6>
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
                var $url = "http://localhost:8000/api/tournaments/" + this.$route.params.tournament_id + "/schedules";
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

</style>
