<template>
    <div id="scorecard">
<!--            <div class="table-header">-->
<!--                <span>India won by 4 runs</span>-->
<!--            </div>-->
        <div class="team-header">
            <div class="row">
                <div class="col-6 team-name">
                    <span>{{matchScorecard.team1.detail.team_code}} inn</span>
                </div>
                <div class="col-6 team-score">
                    <span>{{matchScorecard.team1.score.score}} -{{matchScorecard.team1.score.wicket}} ({{matchScorecard.team1.score.over}}.{{matchScorecard.team1.score.overball}})</span>
                </div>
            </div>
        </div>
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
                <tr v-if="matchScorecard.team1" v-for="player in matchScorecard.team1.batsman" :key="player.id" :data="player">
                    <td>
                        {{player.player_id}}
                        <p>c Fortuin b Budaza</p>
                    </td>
                    <td>{{player.bt_runs}}</td>
                    <td>{{player.bt_balls}}</td>
                    <td>{{player.bt_sixes}}</td>
                    <td>{{player.bt_fours}}</td>
                    <td>{{ calculateStrikeRate(player.bt_runs,player.bt_balls) }}</td>
                </tr>
<!--                <tr>-->
<!--                    <td>R Sharma<p>b Mokoena</p></td>-->
<!--                    <td>123</td>-->
<!--                    <td>110</td>-->
<!--                    <td>6</td>-->
<!--                    <td>5</td>-->
<!--                    <td>1</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>R Sharma<p>b Mokoena</p></td>-->
<!--                    <td>123</td>-->
<!--                    <td>110</td>-->
<!--                    <td>6</td>-->
<!--                    <td>5</td>-->
<!--                    <td>1</td>-->
<!--                </tr>-->
                </tbody>
            </table>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6 left-col">
                        <p>Extras</p>
                    </div>
                    <div class="col-6 right-col">
                        <p><b>{{ matchScorecard.team1.extras.no_ball + matchScorecard.team1.extras.legbyes + matchScorecard.team1.extras.byes + matchScorecard.team1.extras.wide }}</b>
                            b {{ matchScorecard.team1.extras.byes }}, lb {{ matchScorecard.team1.extras.legbyes }}, w {{ matchScorecard.team1.extras.wide }}, nb {{ matchScorecard.team1.extras.no_ball }}</p>
                    </div>
                </div >
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6 left-col">
                        <p>Total</p>
                    </div>
                    <div class="col-6 right-col">
                        <p><b>{{matchScorecard.team1.score.score}} -{{matchScorecard.team1.score.wicket}} ({{matchScorecard.team1.score.over}}.{{matchScorecard.team1.score.overball}})</b></p>
                    </div>
                </div >
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
                <tr v-if="matchScorecard.team1" v-for="player in matchScorecard.team1.bowler" :key="player.id" :data="player">
                    <td>{{player.player_id}}</td>
                    <td>{{player.bw_over}}.{{player.bw_overball}}</td>
                    <td>{{player.bw_maiden}}</td>
                    <td>{{player.bw_runs}}</td>
                    <td>{{player.bw_wickets}}</td>
                    <td>12.2</td>
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
        <div class="tables table-responsive">
            <table class="table invoice">
                <thead>
                <tr>
                    <th scope="col">Fall of Wicket</th>
                    <th scope="col">Score</th>
                    <th scope="col">Over</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>V Kohli</td>
                    <td>15-1</td>
                    <td>2.3</td>
                </tr>
                <tr>
                    <td>R Sharma</td>
                    <td>45-2</td>
                    <td>8.2</td>
                </tr>
                <tr>
                    <td>MS Dhoni</td>
                    <td>110-3</td>
                    <td>17.5</td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Scorecard",

        mounted : function () {
            this.loadMatchScorecard();
        },

        methods : {
            loadMatchScorecard(){
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

            calculateStrikeRate(runs,ball){
                if(ball == '0') {
                    return 100
                }
                else {
                    let val = (runs / ball) * 100;
                    return val.toFixed(2)
                }
            },
        },

        data : function () {
            return {
                'matchScorecard' : {
                        'team1' : {
                            'detail' : {},
                            'extras' : {},
                            'score' : {},
                        },
                        'team2' : {
                            'detail' : {},
                            'extras' : {},
                            'score' : {},
                        },
                },
                // 'team1_players' : this.matchScorecard.team1_players,
            }
        }
    }
</script>

<style scoped>
    #scorecard .table-header{
        padding: 8px 12px;
    }

    #scorecard .team-header{
        padding: 12px;
        /*background : #545a5f;*/
        /*color: #fff;*/
        font-weight : bold;
        background : #c2f1db;
        color: #545a5f;
    }
    #scorecard .team-header .team-score{
        text-align: right;
    }
    #scorecard table{
        margin-bottom : 0px;
    }

    #scorecard table thead tr{
        font-size: 0.7rem;
        border : 0;
    }

    #scorecard table thead tr th{
        border : 0;
        background: #545a5f;
        color : #fff;
        padding : 6px;
        /*padding-bottom : 6px;*/
    }

    #scorecard table tbody tr td{
        font-size : 0.7rem;
        padding: 8px 6px;
    }
    #scorecard table td{
        text-align: right;
    }
    #scorecard table thead th{
        text-align: right;
    }

    #scorecard table td:nth-child(1){
        text-align : left;
        padding : 12px;
        color: #0198E1;
        padding-top: 8px;
        padding-bottom : 8px;
    }
    #scorecard table th:nth-child(1) {
        text-align : left;
        padding-left : 12px;
        padding-right : 12px;

    }

    #scorecard table td:last-child{
        padding-right:12px;

    }

    #scorecard table th:last-child{
        padding-right:12px;
    }

    #scorecard table td:nth-child(1) p{
        margin: 0;
        color : #545a5f;
        font-size : 0.65rem;
    }

    #scorecard .list-group{

    }

    #scorecard .list-group .list-group-item{
        border-right: 0;
        border-left: 0;
        border-radius: 0;
        font-size : 0.7rem;
        padding: 8px 12px;
    }
    #scorecard .list-group .list-group-item p {
        margin : 0;
    }

    #scorecard .list-group .left-col{
        font-weight : bold;
    }
    #scorecard .list-group .right-col{
        text-align : right;
    }


</style>
