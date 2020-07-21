<template>
    <div id="scorecard">


        <div id="not_started" v-if="matchScorecard.isMatch === 'not_found'">
            <span>Match has not started yet.</span>
        </div>

        <div id="scorecardDetail" v-else-if="matchScorecard.isMatch">
            <div class="table-header winning-status" v-if="matchScorecard.match_status === 4">
                <span>India won by 4 runs</span>
            </div>
            <div class="team-header" v-on:click="team1 = !team1" style="border-bottom: 0.05rem solid lightgray;">
                <div class="row m-0">
                    <div class="col-6 team-name p-0">
                        <span>{{matchScorecard.team1.detail.team_code}} inn</span>
                    </div>
                    <div class="col-6 team-score p-0">
                        <span>{{matchScorecard.team1.score.score}} -{{matchScorecard.team1.score.wicket}} ({{matchScorecard.team1.score.over}}.{{matchScorecard.team1.score.overball}})</span>
                    </div>
                </div>
            </div>
            <div id="team1" v-if="team1" class="animated slideInDown faster">
                <div class="tables table-responsive">
                    <table class="table invoice">
                        <thead>
                        <tr>
                            <th scope="col">Batsman</th>
                            <th scope="col">R</th>
                            <th scope="col">B</th>
                            <th scope="col">4s</th>
                            <th scope="col">6s</th>
                            <th scope="col">SR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="matchScorecard.team1" v-for="player in matchScorecard.team1.batsman" :key="player.id"
                            :data="player">
                            <td>
                                <router-link :to="'/player/' + player.playerDetail.id + '/info'">
                                    <div v-if="player.bt_status == 10">
                                        {{player.playerDetail.player_name}}
                                        <p>Batting</p>
                                    </div>
                                    <div v-else-if="player.bt_status == 11">
                                        {{player.playerDetail.player_name}}
                                        <p>Batting</p>
                                    </div>
                                    <div v-else>
                                        {{player.playerDetail.player_name}}

                                        <p v-if="player.wicket_type == 'bold'">b {{player.wicketPrimary.player_name
                                            }}</p>
                                        <p v-else-if="player.wicket_type == 'catch'">c {{
                                            player.wicketSecondary.player_name }} b {{player.wicketPrimary.player_name
                                            }}</p>
                                        <p v-else-if="player.wicket_type == 'stump'">st {{
                                            player.wicketSecondary.player_name }} b {{player.wicketPrimary.player_name
                                            }}</p>
                                        <p v-else-if="player.wicket_type == 'lbw'">lbw
                                            {{player.wicketPrimary.player_name }}</p>
                                        <p v-else-if="player.wicket_type == 'runout' && player.wicket_secondary == '--'">
                                            runout ({{player.wicketPrimary.player_name }})</p>
                                        <p v-else>runout ({{player.wicketPrimary.player_name
                                            }}/{{player.wicketSecondary.player_name}})</p>
                                    </div>
                                </router-link>
                            </td>
                            <td><b>
                                <router-link :to="'/player/' + player.id + '/info'">{{player.bt_runs}}</router-link>
                            </b></td>
                            <td>
                                <router-link :to="'/player/' + player.id + '/info'">{{player.bt_balls}}</router-link>
                            </td>
                            <td>
                                <router-link :to="'/player/' + player.id + '/info'">{{player.bt_fours}}</router-link>
                            </td>
                            <td>
                                <router-link :to="'/player/' + player.id + '/info'">{{player.bt_sixes}}</router-link>
                            </td>
                            <td>
                                <router-link :to="'/player/' + player.id + '/info'">{{
                                    calculateStrikeRate(player.bt_runs,player.bt_balls) }}
                                </router-link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row m-0">
                            <div class="col-6 left-col p-0">
                                <p>Extras</p>
                            </div>
                            <div class="col-6 right-col p-0">
                                <p><b>{{ matchScorecard.team1.extras.no_ball + matchScorecard.team1.extras.legbyes +
                                    matchScorecard.team1.extras.byes + matchScorecard.team1.extras.wide }}</b>
                                    b {{ matchScorecard.team1.extras.byes }}, lb {{ matchScorecard.team1.extras.legbyes
                                    }}, w {{ matchScorecard.team1.extras.wide }}, nb {{
                                    matchScorecard.team1.extras.no_ball }}</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row m-0">
                            <div class="col-6 left-col p-0">
                                <p>Total</p>
                            </div>
                            <div class="col-6 right-col p-0">
                                <p><b>{{matchScorecard.team1.score.score}} -{{matchScorecard.team1.score.wicket}}
                                    ({{matchScorecard.team1.score.over}}.{{matchScorecard.team1.score.overball}})</b>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="tables table-responsive">
                    <table class="table invoice">
                        <thead>
                        <tr>
                            <th scope="col">Bowler</th>
                            <th scope="col">O</th>
                            <th scope="col">M</th>
                            <th scope="col">R</th>
                            <th scope="col">W</th>
                            <th scope="col">ER</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="matchScorecard.team1" v-for="player in matchScorecard.team1.bowler" :key="player.id"
                            :data="player">
                            <td>
                                <router-link :to="'/player/' + player.playerDetail.id + '/info'">
                                    {{player.playerDetail.player_name}}
                                </router-link>
                            </td>
                            <td>{{player.bw_over}}.{{player.bw_overball}}</td>
                            <td>{{player.bw_maiden}}</td>
                            <td>{{player.bw_runs}}</td>
                            <td>{{player.bw_wickets}}</td>
                            <td>{{calculateBowlingEconomy(player.bw_runs,player.bw_over,player.bw_overball)}}</td>
                        </tr>

                        <!--                <tr>-->
                        <!--                    <td>K Ahmed</td>-->
                        <!--                    <td>1</td>-->
                        <!--                    <td>0</td>-->
                        <!--                    <td>6</td>-->
                        <!--                    <td>0</td>-->
                        <!--                    <td>12.2</td>-->
                        <!--                </tr>-->

                        </tbody>
                    </table>
                </div>
                <!--                            <div class="tables table-responsive">-->
                <!--                                <table class="table invoice">-->
                <!--                                    <thead>-->
                <!--                                   <tr>-->
                <!--                                        <th scope="col">Fall of Wicket</th>-->
                <!--                                        <th scope="col">Score</th>-->
                <!--                                        <th scope="col">Over</th>-->
                <!--                                    </tr>-->
                <!--                                    </thead>-->
                <!--                                    <tbody>-->
                <!--                                    <tr v-if="matchScorecard.team1" v-for="player in matchScorecard.team1.fow" :key="player.id"-->
                <!--                                        :data="player">-->
                <!--                                        <td>-->
                <!--                                            <router-link :to="'/player/' + player.player_id + '/info'">-->
                <!--                                                {{player.player_id}}-->
                <!--                                            </router-link>-->
                <!--                                        </td>-->
                <!--                                        <td>{{player.score}}-{{player.wickets}}</td>-->
                <!--                                        <td>{{player.over}}.{{player.overball}}</td>-->
                <!--                                    </tr>-->
                <!--                                    </tbody>-->
                <!--                                </table>-->
                <!--                            </div>-->
            </div>

            <div class="team-header" v-on:click="team2 = !team2"
                 v-if="matchScorecard.match_status === 3 || matchScorecard.match_status === 4">
                <div class="row m-0">
                    <div class="col-6 team-name p-0">
                        <span>{{matchScorecard.team2.detail.team_code}} inn</span>
                    </div>
                    <div class="col-6 team-score p-0">
                        <span>{{matchScorecard.team2.score.score}} -{{matchScorecard.team2.score.wicket}} ({{matchScorecard.team2.score.over}}.{{matchScorecard.team2.score.overball}})</span>
                    </div>
                </div>
            </div>
            <div id="team2" v-if="team2"  class="animated slideInDown faster">
                <div class="tables table-responsive">
                    <table class="table invoice">
                        <thead>
                        <tr>
                            <th scope="col">Batsman</th>
                            <th scope="col">R</th>
                            <th scope="col">B</th>
                            <th scope="col">4s</th>
                            <th scope="col">6s</th>
                            <th scope="col">SR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="matchScorecard.team2" v-for="player in matchScorecard.team2.batsman" :key="player.id"
                            :data="player">
                            <td>
                                <router-link :to="'/player/' + player.playerDetail.id + '/info'">
                                    <div v-if="player.bt_status == 10">
                                        {{player.playerDetail.player_name}}
                                        <p>Batting</p>
                                    </div>
                                    <div v-else-if="player.bt_status == 11">
                                        {{player.playerDetail.player_name}}
                                        <p>Batting</p>
                                    </div>
                                    <div v-else>
                                        {{player.playerDetail.player_name}}

                                        <p v-if="player.wicket_type == 'bold'">b {{player.wicketPrimary.player_name
                                            }}</p>
                                        <p v-else-if="player.wicket_type == 'catch'">c {{
                                            player.wicketSecondary.player_name }} b {{player.wicketPrimary.player_name
                                            }}</p>
                                        <p v-else-if="player.wicket_type == 'stump'">st {{
                                            player.wicketSecondary.player_name }} b {{player.wicketPrimary.player_name
                                            }}</p>
                                        <p v-else-if="player.wicket_type == 'lbw'">lbw
                                            {{player.wicketPrimary.player_name }}</p>
                                        <p v-else-if="player.wicket_type == 'runout' && player.wicket_secondary == '--'">
                                            runout ({{player.wicketPrimary.player_name }})</p>
                                        <p v-else>runout ({{player.wicketPrimary.player_name
                                            }}/{{player.wicketSecondary.player_name}})</p>
                                    </div>
                                </router-link>
                            </td>
                            <td><b>
                                <router-link :to="'/player/' + player.id + '/info'">{{player.bt_runs}}</router-link>
                            </b></td>
                            <td>
                                <router-link :to="'/player/' + player.id + '/info'">{{player.bt_balls}}</router-link>
                            </td>
                            <td>
                                <router-link :to="'/player/' + player.id + '/info'">{{player.bt_fours}}</router-link>
                            </td>
                            <td>
                                <router-link :to="'/player/' + player.id + '/info'">{{player.bt_sixes}}</router-link>
                            </td>
                            <td>
                                <router-link :to="'/player/' + player.id + '/info'">{{
                                    calculateStrikeRate(player.bt_runs,player.bt_balls) }}
                                </router-link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row m-0">
                            <div class="col-6 left-col p-0">
                                <p>Extras</p>
                            </div>
                            <div class="col-6 right-col p-0">
                                <p><b>{{ matchScorecard.team2.extras.no_ball + matchScorecard.team2.extras.legbyes +
                                    matchScorecard.team2.extras.byes + matchScorecard.team2.extras.wide }}</b>
                                    b {{ matchScorecard.team2.extras.byes }}, lb {{ matchScorecard.team2.extras.legbyes
                                    }}, w {{ matchScorecard.team2.extras.wide }}, nb {{
                                    matchScorecard.team2.extras.no_ball }}</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row m-0">
                            <div class="col-6 left-col p-0">
                                <p>Total</p>
                            </div>
                            <div class="col-6 right-col p-0">
                                <p><b>{{matchScorecard.team2.score.score}} -{{matchScorecard.team2.score.wicket}}
                                    ({{matchScorecard.team2.score.over}}.{{matchScorecard.team2.score.overball}})</b>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="tables table-responsive">
                    <table class="table invoice">
                        <thead>
                        <tr>
                            <th scope="col">Bowler</th>
                            <th scope="col">O</th>
                            <th scope="col">M</th>
                            <th scope="col">R</th>
                            <th scope="col">W</th>
                            <th scope="col">ER</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="matchScorecard.team2" v-for="player in matchScorecard.team2.bowler" :key="player.id"
                            :data="player">
                            <td>
                                <router-link :to="'/player/' + player.playerDetail.id + '/info'">
                                    {{player.playerDetail.player_name}}
                                </router-link>
                            </td>
                            <td>{{player.bw_over}}.{{player.bw_overball}}</td>
                            <td>{{player.bw_maiden}}</td>
                            <td>{{player.bw_runs}}</td>
                            <td>{{player.bw_wickets}}</td>
                            <td>{{calculateBowlingEconomy(player.bw_runs,player.bw_over,player.bw_overball)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="loader" v-else>
            <div id="preloader"></div>
            <!--            <p>blank</p>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "Scorecard",

        mounted: function () {
            this.loadMatchScorecard();
            var route = this.$router;
            $(function () {
                $("#scorecard").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction === 'left')
                            route.replace('overs');
                        if (direction === 'right') {
                            route.replace('live');
                        }
                    }, allowPageScroll: "auto"
                });
            });
            // setInterval(() => this.loadMatchScorecard(), 5000);
        },

        methods: {
            loadMatchScorecard() {
                var $url = this.$domainName + "tournament/" + this.$route.params.tournament_id + "/match/" + this.$route.params.match_id + '/' + this.$route.params.team1_id + '/' + this.$route.params.team2_id + '/scorecard';
                axios.get($url)
                    .then(response => this.matchScorecard = response.data)
                    // .then(function(response){
                    //     console.log(response.data);
                    // })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            calculateStrikeRate(runs, ball) {
                if (ball == '0') {
                    return 100;
                } else {
                    let val = (runs / ball) * 100;
                    return val.toFixed(2);
                }
            },

            calculateBowlingEconomy(runs, overs, balls) {
                let over = Number(overs) + (Number(balls) * 10) / 60;
                let economy = (Number(runs) / Number(over)).toFixed(2);
                return economy;
            },


        },

        data: function () {
            return {
                'matchScorecard': {
                    'isMatch': false,
                    'team1': {
                        'detail': {},
                        'extras': {},
                        'score': {},

                    },
                    'team2': {
                        'detail': {},
                        'extras': {},
                        'score': {},

                    },
                },

                team1: false,
                team2: false,
                // 'team2_players' : this.matchScorecard.team2_players,
            }
        }
    }
</script>

<style scoped>

    #scorecard {
        height: calc(100vh - (104px));
    }

    #scorecard .table-header {
        padding: 8px 12px;
    }

    #scorecard .team-header {
        padding: 12px;
        /*background : #dc3545;*/
        /*color: #fff;*/
        font-weight: bold;
        background: #dbdbdb;
        color: #dc3545;
    }

    #scorecard .team-header .team-score {
        text-align: right;
    }

    #scorecard table {
        margin-bottom: 0px;
    }

    #scorecard table thead tr {
        font-size: 0.7rem;
        border: 0;
    }

    #scorecard table thead tr th {
        border: 0;
        background: #dc3545;
        color: #fff;
        padding: 6px;
        /*padding-bottom : 6px;*/
    }

    #scorecard table tbody tr td {
        font-size: 0.7rem;
        padding: 8px 6px;

    }

    #scorecard table tbody tr td a {
        text-decoration: none;
        color: #212529;
    }

    #scorecard table td {
        text-align: right;
    }

    #scorecard table thead th {
        text-align: right;
    }

    #scorecard table td:nth-child(1) {
        text-align: left;
        padding: 12px;
        color: #0198E1;
        padding-top: 8px;
        padding-bottom: 8px;
    }

    #scorecard table th:nth-child(1) {
        text-align: left;
        padding-left: 12px;
        padding-right: 12px;

    }

    #scorecard table tbody tr:first-child {
        border: 0;
    }

    #scorecard table td:last-child {
        padding-right: 12px;

    }

    #scorecard table th:last-child {
        padding-right: 12px;
    }

    #scorecard table td:nth-child(1) p {
        margin: 0;
        color: #dc3545;
        font-size: 0.65rem;
    }

    #scorecard .list-group .list-group-item {
        border-right: 0;
        border-left: 0;
        border-radius: 0;
        font-size: 0.7rem;
        padding: 8px 12px;
    }

    #scorecard .list-group .list-group-item p {
        margin: 0;
    }

    #scorecard .list-group .left-col {
        font-weight: bold;
    }

    #scorecard .list-group .right-col {
        text-align: right;
    }

    #scorecard #not_started {
        width: 100vw;
        text-align: center;
        background: #f8fafc;
        line-height: calc(100vh - (104px));
    }


    #loader {
        background: #f8fafc;
    }

    #preloader {
        height: 30px;
        width: 30px;
        margin: 40vh auto;
        border: 5px solid #dbdbdb;
        border-top: 5px solid #dc3545;
        border-radius: 50%;
        animation: rotate 1s infinite linear;
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
