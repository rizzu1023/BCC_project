<template>
    <div id="tournamentDetail">
        <div class="row">
            <div class="col-12">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#schedule" role="tab" aria-controls="home">Teams</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#squad" role="tab" aria-controls="profile">Schedule</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#stats" role="tab" aria-controls="profile">Stats</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pointstable" role="tab" aria-controls="messages">Points Table</a></li>
                    </ul>
                    <div class="tab-content m-0 p-0">
                        <div class="tab-pane active" id="schedule"><Team></Team></div>
                        <div class="tab-pane" id="squad"><Schedule></Schedule></div>
                        <div class="tab-pane" id="stats"><Stats></Stats></div>
                        <div class="tab-pane" id="pointstable">Hello i am poinstable</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Schedule from "./Schedule";
    import Stats from "./Stats";
    export default {
        name: "TournamentDetail",
        components: {Stats, Schedule}
    }
</script>

<style scoped>

</style>
