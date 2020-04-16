<template>
    <div id="matchOvers">
        <div id="overs">

            <div id="not_started" v-if="matchOvers.isMatch === 'not_found'">
                <span>Match has not started yet.</span>
            </div>

            <div class="card" v-else-if="matchOvers.isMatch">
            <div class="card-body" v-for="over in matchOvers.overs" :key="over.id" :data="over">
                <div class="row m-0" >
                    <div class="col-3 left-col p-0">
                        <p>Ov {{ over.over_no + 1}}</p>
                        <span class="text-muted">{{ over.runs }} runs</span>
                    </div>
                    <div class="col-9 right-col p-0">
                        <p>{{ over.attacker_id.player_name }}</p>
                        <span v-for="ball in over.over_detail" :key="ball.id" :data="ball">

                            <div v-if="ball.action === 'zero'" class="zero">0</div>
                            <div v-if="ball.action === 'one'" class="one">1</div>
                            <div v-if="ball.action === 'two'" class="two">2</div>
                            <div v-if="ball.action === 'three'" class="three">3</div>
                            <div v-if="ball.action === 'four'" class="four">4</div>
                            <div v-if="ball.action  === 'six'" class="six">6</div>
                            <div v-if="ball.action  === 'lb1'" class="legbyes">{{ball.action}}</div>
                            <div v-if="ball.action  === 'lb2'" class="legbyes">{{ball.action}}</div>
                            <div v-if="ball.action  === 'lb3'" class="legbyes">{{ball.action}}</div>
                            <div v-if="ball.action  === 'lb4'" class="legbyes">{{ball.action}}</div>

                            <div v-if="ball.action  === 'b1'" class="byes">{{ball.action}}</div>
                            <div v-if="ball.action  === 'b2'" class="byes">{{ball.action}}</div>
                            <div v-if="ball.action  === 'b3'" class="byes">{{ball.action}}</div>
                            <div v-if="ball.action  === 'b4'" class="byes">{{ball.action}}</div>

                            <div v-if="ball.action  === 'nb'" class="noball">nb</div>
                            <div v-if="ball.action  === 'nb1'" class="noball">{{ball.action}}</div>
                            <div v-if="ball.action  === 'nb2'" class="noball">{{ball.action}}</div>
                            <div v-if="ball.action  === 'nb3'" class="noball">{{ball.action}}</div>
                            <div v-if="ball.action  === 'nb4'" class="noball">{{ball.action}}</div>
                            <div v-if="ball.action  === 'nb5'" class="noball">{{ball.action}}</div>
                            <div v-if="ball.action  === 'nb6'" class="noball">{{ball.action}}</div>

                            <div v-if="ball.action  === 'wd'" class="wide">{{ball.action}}</div>
                            <div v-if="ball.action  === 'wd1'" class="wide">{{ball.action}}</div>
                            <div v-if="ball.action  === 'wd2'" class="wide">{{ball.action}}</div>
                            <div v-if="ball.action  === 'wd3'" class="wide">{{ball.action}}</div>
                            <div v-if="ball.action  === 'wd4'" class="wide">{{ball.action}}</div>

                            <div v-if="ball.action  === 'wicket'" class="wicket">w</div>

                        </span>
<!--                        <div v-for="ball in over.over_detail" :key="ball.id" :data="ball">-->
<!--                         <span>{{ball.run}}</span>-->
<!--                        <span><div>4</div></span>-->
<!--                         <span>2</span>-->
                        </div>
                    </div>
                </div>
            </div>

            <div id="loader" v-else>
                <div id="preloader"></div>
            </div>
        </div>
        </div>

</template>

<script>
    export default {
        name: "MatchOvers",

        mounted : function () {
            this.loadMatchOvers();
            var route = this.$router;
            $(function () {
                $("#matchOvers").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction === 'right')
                            route.replace('scorecard');
                    }, allowPageScroll: "auto"
                });
            });

            // setInterval(() => this.loadMatchOvers(), 5000);

        },

        methods : {
            loadMatchOvers() {
                var $url = this.$domainName + "tournament/" + this.$route.params.tournament_id + "/match/" + this.$route.params.match_id + '/' + this.$route.params.team1_id + '/' + this.$route.params.team2_id + '/overs';
                axios.get($url)
                    .then(response => this.matchOvers = response.data)
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
                'isMatch' : false,
                'matchOvers' : {
                    'overs' : {
                        'attacker_id' : {
                            'player_name' : null,
                        },
                    },

                },

            }
        }
    }
</script>

<style scoped>
    #matchOvers .card{
        border-top : 0;
        border-right : 0;
        border-left : 0;
        border-radius : 0;
    }

    #matchOvers .card-body {
        padding : 12px;
        border-bottom: 0.05rem solid lightgray;
    }

    #matchOvers .card-body p{
        font-size : .85rem;
        margin-bottom : 6px;
        font-weight: bold;
    }

    #matchOvers .card-body .left-col span{
        font-size: .7rem;
    }

    #matchOvers .card-body .right-col span div{
        background: #1e72fa;
        color : white;
        border-radius : 50%;
        padding : 2px 6px;
        font-size : .65rem;
        margin-right: 4px;
        display: inline-block;
    }

    #matchOvers .card-body .right-col span .four{
        background : lightblue;
    }

    #matchOvers .card-body .right-col span .six{
        background : pink;
    }
    #matchOvers .card-body .right-col span .one{
        background : green;
    }
    #matchOvers .card-body .right-col span .two{
        background : green;
    }

    #matchOvers .card-body .right-col span .legbyes {
        background : orange;
        font-size: .6rem;
    }
    #matchOvers .card-body .right-col span .byes {
        background : cyan;
        font-size: .6rem;
    }
    #matchOvers .card-body .right-col span .noball {
        background : blue;
    }

    #matchOvers .card-body .right-col span .wicket {
        background: red;
    }


    #matchOvers #not_started{
        width: 100vw;
        text-align: center;
        background: #f8fafc;
        margin-top: 45vh;
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
