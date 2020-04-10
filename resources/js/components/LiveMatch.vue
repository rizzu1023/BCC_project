<template>
    <div id="liveMatch">

        <div id="not_started" v-if="liveMatchScorecard.isMatch === 'not_found'">
            <span>Match has not started yet.</span>
            <!--            <div class="loader-block-main">-->
            <!--                <div class="loader-bx"></div>-->
            <!--            </div>-->
        </div>

        <div id="liveMatchShow" v-else-if="liveMatchScorecard.isMatch">
        <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 main-score">
                            <h6>{{ liveMatchScorecard.match_detail.team_detail.team_code }}</h6>
                            <p><b>{{ liveMatchScorecard.match_detail.score }}-{{ liveMatchScorecard.match_detail.wicket }}</b><span class="text-muted">({{ liveMatchScorecard.match_detail.over }}.{{ liveMatchScorecard.match_detail.overball }})</span></p>
                        </div>
                        <div class="col-3 rrr">
                            <span class="text-muted">RRR</span>
                            <p>5.53</p>
                        </div>
                        <div class="col-3 crr">
                            <span class="text-muted">CRR</span>
                            <p>{{ calculateRunRate(liveMatchScorecard.match_detail.score,liveMatchScorecard.match_detail.over,liveMatchScorecard.match_detail.overball) }}</p>
                        </div>
<!--                        <div class="col-12 need-run">-->
<!--                            <p class="m-0">India need 85 runs to win</p>-->
<!--                        </div>-->
                    </div>
                </div>

            </div>
        <ul class="list-group">
            <li class="list-group-item">
              <div class="row">
                <div class="col-6 partnership">
                    <p>P'SHIP <span> 102(80)</span></p>
                </div>
                <div class="col-6 target">
                    <p>TARGET <span> 170</span></p>
                </div>
              </div >
            </li>
        </ul>
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
                    <tr v-if="liveMatchScorecard.current_batsman" v-for="player in liveMatchScorecard.current_batsman" :key="player.id" :data="player">
                    <td v-if="player.bt_status == '11'">{{ player.playerDetail.player_name}} *</td>
                    <td v-else>{{ player.playerDetail.player_name}}</td>
                        <td>{{ player.bt_runs }}</td>
                        <td>{{ player.bt_balls }}</td>
                        <td>{{ player.bt_fours }}</td>
                        <td>{{ player.bt_sixes }}</td>
                        <td>{{ calculateStrikeRate(player.bt_runs,player.bt_balls) }}</td>

                    </tr>
                    </tbody>
                </table>
        </div>
               <div class="tables table-responsive">
                    <table class="table">
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
                        <tr>
                            <td>{{ liveMatchScorecard.current_bowler.playerDetail.player_name}}</td>
                            <td>{{ liveMatchScorecard.current_bowler.bw_over }}.{{ liveMatchScorecard.current_bowler.bw_overball }}</td>
                            <td>{{ liveMatchScorecard.current_bowler.bw_maiden }}</td>
                            <td>{{ liveMatchScorecard.current_bowler.bw_runs }}</td>
                            <td>{{ liveMatchScorecard.current_bowler.bw_wickets }}</td>
                            <td>{{ calculateBowlingEconomy(liveMatchScorecard.current_bowler.bw_runs, liveMatchScorecard.current_bowler.bw_over, liveMatchScorecard.current_bowler.bw_overball) }}</td>
                        </tr>
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
                            <p><b>{{ liveMatchScorecard.match_detail.wide + liveMatchScorecard.match_detail.no_ball + liveMatchScorecard.match_detail.byes + liveMatchScorecard.match_detail.legbyes }}</b>
                                b {{ liveMatchScorecard.match_detail.byes }}, lb {{ liveMatchScorecard.match_detail.legbyes }}, w {{ liveMatchScorecard.match_detail.wide }}, nb {{ liveMatchScorecard.match_detail.no_ball }}</p>
                        </div>
                    </div >
                </li>
            </ul>
        </div>

        <div id="loader" v-else>
                <div id="preloader"></div>
<!--            <p>blank</p>-->
        </div>

    </div>
</template>

<script>
    export default {
        name: "LiveMatch",

        mounted : function () {
            this.loadLiveMatchScorecard();
            // setInterval(() => this.loadLiveMatchScorecard(),5000);
        },

        methods : {
            loadLiveMatchScorecard(){
                var $url = this.$domainName + "tournament/" + this.$route.params.tournament_id + "/match/" + this.$route.params.match_id + '/' + this.$route.params.team1_id + '/' + this.$route.params.team2_id + '/live';
                axios.get($url)
                    .then(response => this.liveMatchScorecard = response.data)
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

            calculateRunRate(runs,overs,balls){
                let over = Number(overs) + (Number(balls) * 10)/60;
                let run_rate = (Number(runs)/Number(over)).toFixed(2);
                return run_rate;
            },

            calculateBowlingEconomy(runs,overs,balls){
                let over = Number(overs) + (Number(balls)*10)/60;
                let economy = (Number(runs)/Number(over)).toFixed(2);
                return economy;
            }
        },

        data : function () {
            return {
                'liveMatchScorecard' : {
                    'match_detail' : null,

                    'current_bowler' : {
                        'playerDetail' : {},
                    },

                    'isMatch' : false,
                },


                team1 : false,
                team2 : false,
                // 'team2_players' : this.matchScorecard.team2_players,
            }
        }

    }

</script>

<style scoped>


    #liveMatch .card{
        border-radius : 0;
        margin  : 0;
        border : 0;
    }
    #liveMatch .card .card-body{
        padding-left: 12px;
        padding-right: 12px;
    }
    #liveMatch .card p{
        margin : 0;
    }

    #liveMatch .crr p, .rrr p{
        font-weight: bold;
    }
    #liveMatch .need-run{
        color : red;
        margin-top: 10px;
    }

    #liveMatch .list-group-item{
        border-right: 0;
        border-bottom: 0;
        border-left: 0;
        border-radius: 0;
        padding: 12px;
    }
    #liveMatch .list-group-item p{
        margin : 0;
        font-size : 0.7rem;
    }
    #liveMatch .list-group-item p span{
        font-weight: bold;
    }

    #liveMatch .list-group-item .target{
        text-align : right;
    }

    #liveMatch .main-score h6{
        font-size: 1.1rem;
    }

    #liveMatch table thead tr th{
        font-size: 0.7rem;
        border : 0;
        padding-top: 8px;
        padding-bottom: 8px;
    }
    #liveMatch table {
        border-collapse :collapse;
        margin : 0;
    }


    #liveMatch table thead th{
        /*border : 0.5rem;*/
        background: #dbdbdb;
        color : #1e72fa;
    }

    #liveMatch table tbody tr td{
        font-size : 0.65rem;
        border-bottom : 0;
        border-top : 0;
        padding-top: 8px;
        padding-bottom: 8px;
    }
    #liveMatch table td{
        text-align: right;
    }
    #liveMatch table th{
        text-align: right;
    }

    #liveMatch table td:nth-child(1){
        text-align : left;
        color: #0198E1;
    }
    #liveMatch table th:nth-child(1) {
        text-align : left
    }

    #liveMatch  #not_started{
        width: 100vw;
        text-align: center;
        background: #f8fafc;
        margin-top: 45vh;
    }

    #liveMatch .list-group .list-group-item{
        border-right: 0;
        border-left: 0;
        border-radius: 0;
        font-size : 0.7rem;
        padding: 8px 12px;
    }
    #liveMatch .list-group .list-group-item p {
        margin : 0;
    }

    #liveMatch .list-group .left-col{
        font-weight : bold;
    }
    #liveMatch .list-group .right-col{
        text-align : right;
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

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }



</style>
