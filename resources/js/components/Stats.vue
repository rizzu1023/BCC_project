<template>
    <div id="tournament" >
        <div class="py-2 px-4 table-header">
            <span>Batting</span>
        </div>
        <ul class="list-group">
                <router-link :to="'/stats/' + $route.params.tournament_id + '/mostRuns'" style="text-decoration:none; color:#000">
                    <li class="list-group-item" >
                        <span>Most Runs</span>
                    </li>
                </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/highestScores'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Highest Scores</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBattingAverage'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Best Batting Average</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBattingStrikeRate'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Best Batting Strike Rate</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostHundreds'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Most Hundreds</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostFifties'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Most Fifties</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostFours'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Most Fours</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostSixes'" style="text-decoration:none; color:#000">
                <li class="list-group-item" >
                    <span>Most Sixes</span>
                </li>
            </router-link>
        </ul>

        <div class="py-2 px-4 table-header">
            <span>Bowling</span>
        </div>
        <ul class="list-group">
            <router-link :to="'/stats/' + $route.params.tournament_id + '/mostWickets'" style="text-decoration:none; color:#000">
                <li class="list-group-item" >
                    <span>Most Wickets</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowlingAverage'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Best Bowling Average</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowling'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Best Bowling</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestEconomy'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Best Economy</span>
                </li>
            </router-link>
            <router-link :to="'/stats/' + $route.params.tournament_id + '/bestBowlingStrikeRate'" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Best Bowling Strike Rate</span>
                </li>
            </router-link>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Stats"
    }
</script>

<style scoped>
    .table-header{
        background: #c2f1db;
    }
    .table-header span{
        font-size: 0.8rem;
        color: #545a5f;
        font-weight : bold;
    }

    .list-group-item{
        border-radius: 0;
        border-right: 0;
        border-left: 0;
        border-top:0;
    }
    .list-group-item span{
        font-size: 0.8rem;
    }
</style>
