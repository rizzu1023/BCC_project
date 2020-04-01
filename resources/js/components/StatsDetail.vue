<template>
    <div id="statsDetail">
        <div class="tables table-responsive table-hover">
            <div class="panel-body widget-shadow">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Batsman</th>
                        <th scope="col" v-if="type === 'mostRuns' || type === 'bestBattingAverage' || type === 'bestBattingStrikeRate' || type === 'mostSixes' || type === 'mostFours' || type === 'mostHundreds' || type === 'mostFifties'">M</th>
                        <th scope="col" v-if="type === 'mostRuns' || type === 'bestBattingAverage' || type === 'bestBattingStrikeRate' || type === 'mostSixes' || type === 'mostFours' || type === 'mostHundreds' || type === 'mostFifties'">I</th>
                        <th scope="col" v-if="type === 'mostRuns' || type === 'bestBattingAverage' || type === 'bestBattingStrikeRate' || type === 'mostSixes' || type === 'mostFours' || type === 'mostHundreds' || type === 'mostFifties'">R</th>
                        <th scope="col" v-if="type === 'highestScores'">HS</th>
                        <th scope="col" v-if="type === 'highestScores'">Balls</th>
                        <th scope="col" v-if="type === 'highestScores'">SR</th>
                        <th scope="col" v-if="type === 'highestScores'">Vs</th>
                        <th scope="col" v-if="type === 'mostRuns'">Avg</th>
                        <th scope="col" v-if="type === 'bestBattingAverage'">Avg</th>
                        <th scope="col" v-if="type === 'bestBattingStrikeRate'">SR</th>
                        <th scope="col" v-if="type === 'mostFours'">4s</th>
                        <th scope="col" v-if="type === 'mostSixes'">6s</th>
                        <th scope="col" v-if="type === 'mostHundreds'">100s</th>
                        <th scope="col" v-if="type === 'mostFifties'">50s</th>


                        <th scope="col" v-if="type === 'bestBowling'">VS</th>
                        <th scope="col" v-if="type === 'bestBowling'">BBI</th>
                        <th scope="col" v-if="type === 'bestBowlingAverage' || type === 'mostWickets'">M</th>
                        <th scope="col" v-if="type === 'bestBowlingAverage' || type === 'mostWickets'">O</th>
                        <th scope="col" v-if="type === 'bestBowlingAverage' || type === 'mostWickets'">W</th>
                        <th scope="col" v-if="type === 'bestBowlingAverage' || type === 'mostWickets'">Avg</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr  v-for="stat in stats" :key="stat.id" :data="stat">
<!--                    <tr v-if="type === 'mostRuns'" v-for="stat in stats" :key="stat.id" :data="stat">-->

                        <td>
                            <router-link :to="'/player/'+ stat.player.id " style="text-decoration: none;color:#000">
                                {{ stat.player.player_name}}
                            </router-link>
                        </td>
                        <td v-if="type === 'mostRuns' || type === 'bestBattingAverage' || type === 'bestBattingStrikeRate' || type === 'mostSixes' || type === 'mostFours' || type === 'mostHundreds' || type === 'mostFifties'">{{ stat.matches}}</td>
                        <td v-if="type === 'highestScores'">{{ stat.bt_runs }}</td>

                        <td v-if="type === 'mostRuns' || type === 'bestBattingAverage' || type === 'bestBattingStrikeRate' || type === 'mostSixes' || type === 'mostFours' || type === 'mostHundreds' || type === 'mostFifties'">{{ stat.bt_innings }}</td>
                        <td v-if="type === 'highestScores'">{{ stat.bt_balls}}</td>

                        <td v-if="type === 'mostRuns' || type === 'bestBattingAverage' || type === 'bestBattingStrikeRate' || type === 'mostSixes' || type === 'mostFours' || type === 'mostHundreds' || type === 'mostFifties'">{{ stat.bt_runs}}</td>
                        <td v-if="type === 'highestScores'">{{ calculateStrikeRate(stat.bt_runs,stat.bt_balls)}}</td>

                        <td v-if="type === 'mostRuns'">{{ stat.bt_runs}}</td>
                        <td v-if="type === 'highestScores'">{{ stat.match.team_id }}</td>
                        <td v-if="type === 'bestBattingAverage'">{{ stat.average }}</td>
<!--                        <td v-if="type === 'bestBattingAverage' && stat.bt_average == null">{{ stat.bt_runs }}</td>-->
                        <td v-if="type === 'bestBattingStrikeRate'">{{ calculateStrikeRate(stat.bt_runs,stat.bt_balls) }}</td>
                        <td v-if="type === 'mostFours'">{{ stat.bt_fours }}</td>
                        <td v-if="type === 'mostSixes'">{{ stat.bt_sixes }}</td>
                        <td v-if="type === 'mostHundreds'">{{ stat.bt_hundreds }}</td>
                        <td v-if="type === 'mostFifties'">{{ stat.bt_fifties }}</td>



                        <td v-if="type === 'bestBowlingAverage' || type === 'mostWickets'">{{ stat.matches}}</td>
                        <td v-if="type === 'bestBowlingAverage' || type === 'mostWickets'">{{ stat.bw_over}}.{{ stat.bw_overball }}</td>
                        <td v-if="type === 'bestBowlingAverage' || type === 'mostWickets'">{{ stat.bw_wickets }}</td>
                        <td v-if="type === 'bestBowlingAverage' || type === 'mostWickets'">{{ stat.bw_average }}</td>

                        <td v-if="type === 'bestBowling'">{{ stat.team_id }}</td>
                        <td v-if="type === 'bestBowling'">{{ stat.bw_wickets }}-{{ stat.bw_runs}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>
    <script>
        export default {
            name: "StatsDetail",

            mounted: function () {
                this.loadStats();


            },

            data : function () {
                return {
                    stats : null,
                    type : this.$route.params.type,
                }
            },

            methods : {
                loadStats(){
                    var $url = this.$domainName + "stats/" + this.$route.params.tournament_id +'/'+ this.$route.params.type ;
                    axios.get($url)
                        .then(response => this.stats = response.data)
                        .catch(function(error){
                            console.log(error)
                        });




                },

                calculateStrikeRate(runs,ball){
                        if(ball == '0') {
                            return 100
                        }
                        else {
                            let val = (runs / ball) * 100;
                            return val.toFixed(2)
                        }
                },
                calculateAverage(runs,innings){
                        // console.log(typeof(parseFloat(runs)));
                        let val = (runs.toFixed(2)/innings.toFixed(2));
                        // console.log(val.toFixed(2));

                    // alert(typeof(val));
                    return val.toFixed(2);
                },



                calculateOver(overs,balls){
                    // if(6 % 6 == 0)
                    //     alert('true');
                    // else
                        // alert('false');
                    console.log('hello from calculate over');
                }
            },

            computed : {
                orderdStats : function(){
                    var stat;
                    for( stat in this.stats){
                        if(this.stats[stat].out_innings == 0) {
                            this.stats[stat].out_innings += 1;
                            // alert(this.stats[stat].out_innings +1);
                        }
                            var avg = this.calculateAverage(this.stats[stat].bt_runs,this.stats[stat].out_innings);
                            this.stats[stat].average = Number(avg);
                    }
                    return _.orderBy(this.stats, 'average','desc')
                }
            },


        }
    </script>


<style scoped>
    .table tbody tr td {
        font-size: 0.75rem;
    }
    .table thead th {
        font-size: 0.8rem;
    }
    /*.table tbody td:hover, .table tbody td:active , .table tbody td:focus{*/
    /*    background:orange;*/
    /*}*/
</style>
