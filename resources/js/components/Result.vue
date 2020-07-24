<template>
    <div id="result">
        <div v-if="results">
            <div v-if="results.length > 0">
                <ul class="list-group">
                    <div v-for="result in results" :key="result.id" :data="result">
                        <div v-if="result.status === 4">
                            <router-link
                                :to="'/tournament/'+result.tournament_id+'/match/' + result.id + '/' + result.team1_id.id + '/' + result.team2_id.id + '/info'"
                                style="text-decoration:none; color:#000">
                                <li class="list-group-item"
                                    v-on:click="header_string(result.team1_id.team_code,result.team2_id.team_code)">
                                    <span class="text-muted" style="font-size: 12px">Match {{ result.match_no }}</span>
                                    <div class="row m-0 mt-1 score-card">
                                        <div class="col-6 p-0 team-name">
                                            <span><b>{{ result.team1_id.team_name }}</b></span>
                                        </div>
                                        <div class="col-6 p-0 team-score">
                                   <span>
                                    <div v-if="result.team1_id.id === result.match_detail[0].team_id">
                                    <b>{{ result.match_detail[0].score }}-{{result.match_detail[0].wicket }} ({{result.match_detail[0].over }}.{{result.match_detail[0].overball }})</b>
                                    </div>
                                    <div v-if="result.team1_id.id === result.match_detail[1].team_id">
                                    <b>{{ result.match_detail[1].score }}-{{result.match_detail[1].wicket }} ({{result.match_detail[1].over }}.{{result.match_detail[1].overball }})</b>
                                    </div>
                                </span>

                                        </div>
                                        <div class="col-6 p-0 team-name">
                                            <span><b>{{ result.team2_id.team_name }}</b></span>
                                        </div>
                                        <div class="col-6 p-0 team-score">
                                <span>
                                     <div v-if="result.team2_id.id === result.match_detail[0].team_id">
                                    <b>{{ result.match_detail[0].score }}-{{result.match_detail[0].wicket }} ({{result.match_detail[0].over }}.{{result.match_detail[0].overball }})</b>
                                    </div>
                                    <div v-if="result.team2_id.id === result.match_detail[1].team_id">
                                    <b>{{ result.match_detail[1].score }}-{{result.match_detail[1].wicket }} ({{result.match_detail[1].over }}.{{result.match_detail[1].overball }})</b>
                                    </div>
                                </span>
                                        </div>
                                    </div>

                                    <!--                        <h6><b>{{ result.team2_id.team_name}}</b></h6>-->
                                    <span class="text-danger" style="font-size: 12px">won by 132 runs</span>

                                </li>
                            </router-link>
                        </div>
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
        name: "Result",

        mounted: function () {
            this.loadResult();
            var route = this.$router;
            $(function () {
                $("#result").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction === 'left')
                            route.replace('teams');
                        if (direction === 'right')
                            route.replace('schedule');
                    }, allowPageScroll: "auto"
                });
            });
        },

        methods: {
            loadResult() {
                var $url = this.$domainName + "tournaments/" + this.$route.params.tournament_id + "/results";
                axios.get($url)
                    .then(response => this.results = response.data)
                    .catch(function (error) {
                        console.log(error)
                    });

            },

            header_string(team1, team2) {
                var value = team1 + ' vs ' + team2;
                Event.$emit('headerString', value);

            },

        },

        data: function () {
            return {
                results: null,
            }
        }
    }
</script>

<style scoped>
    #result {
        height: calc(100vh - (104px));
    }

    #result .list-group-item {
        border-radius: 0;
        border-right: 0;
        border-left: 0;
        border-top: 0;
        padding-left: 12px;
        padding-right: 12px;
    }

    #result .list-group-item:hover, #result .list-group-item:active {
        background-color: #f0f0f0;
    }

    #result .score-card .col-6 {
        /*font-size: 0.8rem;*/
        padding-top: 1px;
        padding-bottom: 1px;
    }

    #result .team-score {
        font-size: 0.8rem;
    }

    #loader {
        background: #f8fafc;
    }

    #preloader {
        height: 30px;
        width: 30px;
        margin: 40vh auto;
        border: 5px solid #dbdbdb;
        border-top: 5px solid #1a1a1a;
        border-radius: 50%;
        animation: rotate 1s infinite linear;
    }

    #result #not_started {
        width: 100vw;
        text-align: center;
        background: #f8fafc;
        line-height: calc(100vh - (104px));
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
