<template>
    <div id="playerDetail">
        <div class="row">
            <div class="col-12">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#schedule" role="tab" aria-controls="home">Info</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#squad" role="tab" aria-controls="profile">Batting</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#stats" role="tab" aria-controls="profile">Bowling</a></li>
<!--                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pointstable" role="tab" aria-controls="messages">Points Table</a></li>-->
                    </ul>
                    <div class="tab-content m-0 p-0">
                        <div class="tab-pane active" id="schedule"><PlayerInfo></PlayerInfo></div>
                        <div class="tab-pane" id="squad">batting</div>
                        <div class="tab-pane" id="stats">bowling</div>
<!--                        <div class="tab-pane" id="pointstable">Hello i am poinstable</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PlayerInfo from "./PlayerInfo";
    export default {
        name: "PlayerDetail",
        components: {PlayerInfo}
    }
</script>

<style scoped>

</style>
