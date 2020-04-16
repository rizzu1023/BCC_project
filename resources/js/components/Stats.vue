<template>
    <div id="stats">
        <div class="py-2 table-header">
            <span>Batting</span>
        </div>
        <ul class="list-group">
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostRuns'">
                <li class="list-group-item">
                    <span>Most Runs</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/highestScores'">
                <li class="list-group-item">
                    <span>Highest Scores</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBattingAverage'">
                <li class="list-group-item">
                    <span>Best Batting Average</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBattingStrikeRate'">
                <li class="list-group-item">
                    <span>Best Batting Strike Rate</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostHundreds'">
                <li class="list-group-item">
                    <span>Most Hundreds</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostFifties'">
                <li class="list-group-item">
                    <span>Most Fifties</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostFours'">
                <li class="list-group-item">
                    <span>Most Fours</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostSixes'">
                <li class="list-group-item">
                    <span>Most Sixes</span>
                </li>
            </router-link>
        </ul>

        <div class="py-2 table-header">
            <span>Bowling</span>
        </div>
        <ul class="list-group">
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostWickets'">
                <li class="list-group-item">
                    <span>Most Wickets</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowlingAverage'">
                <li class="list-group-item">
                    <span>Best Bowling Average</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowling'">
                <li class="list-group-item">
                    <span>Best Bowling</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestEconomy'">
                <li class="list-group-item">
                    <span>Best Economy</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowlingStrikeRate'">
                <li class="list-group-item">
                    <span>Best Bowling Strike Rate</span>
                </li>
            </router-link>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Stats",

        mounted: function () {
            // Event.$emit('firstEvent');
            var route = this.$router;
            $(function () {
                $("#stats").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction == 'left')
                            route.replace('pointsTable');
                        if (direction == 'right'){
                            route.replace('teams');
                        }
                    }, allowPageScroll: "auto"
                });
            });
        },

        methods: {}
    }
</script>

<style scoped>
    #stats .table-header {
        background: #dbdbdb;
        padding-left: 12px;
        padding-right: 12px;

    }

    #stats .table-header span {
        font-size: 0.8rem;
        color: #1e72fa;
        font-weight: bold;
    }

    #stats .list-group-item {
        border-radius: 0;
        border-right: 0;
        border-left: 0;
        border-top: 0;
        padding-left: 12px;
        padding-right: 12px;
    }

    #stats .list-group-item:hover, #stats .list-group-item:active {
        background-color: #f0f0f0;
    }

    #stats .list-group-item span {
        font-size: 0.8rem;

    }

    #stats .list-group a {
        text-decoration: none;
        color: #000;
    }
</style>
