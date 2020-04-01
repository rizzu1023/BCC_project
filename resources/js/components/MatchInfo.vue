<template>
    <div id="matchInfo">
        <div class="bg-dark py-2 px-4">
            <span style="font-size:13px">SQUADS</span>
        </div>
        <ul class="list-group">
            <div>
                <router-link :to="'/teams/players'" style="text-decoration:none; color:#000">
                    <li class="list-group-item" style="border-radius: 0;">
                        <h6>Team 1</h6>
                    </li>
                    <li class="list-group-item" style="border-radius: 0;">
                        <h6>Team 2</h6>
                    </li>
                </router-link>
            </div>
        </ul>
        <div class="bg-dark py-2 px-4" style="font-size:13px">
            <span>INFO</span>
        </div>
        <div class="card">
            <div class="card-body">
                <div class=" row">
                    <label class="col-4">Match</label>
                    <span class="col-8">Match No 12</span>
                </div>
                <div class="row">
                    <label class="col-4">Date</label>
                    <span class="col-8">14-04-2020</span>
                </div>
                <div class="row">
                    <label class="col-4">Time</label>
                    <span class="col-8">4:00 PM IST</span>
                </div>
                <div class="row">
                    <label class="col-4">Toss</label>
                    <span class="col-8">Team 1</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MatchInfo"
    }
</script>

<style scoped>

</style>
