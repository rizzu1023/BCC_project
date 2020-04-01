<template>
    <div id="playerDetail">
        <div class="row">
            <div class="col-12">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs live" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#schedule" role="tab" aria-controls="home">INFO</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#squad" role="tab" aria-controls="profile">BATTING</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#stats" role="tab" aria-controls="profile">BOWLING</a></li>
<!--                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pointstable" role="tab" aria-controls="messages">Points Table</a></li>-->
                    </ul>
                    <div class="tab-content m-0 p-0">
                        <div class="tab-pane active" id="schedule"><PlayerInfo></PlayerInfo></div>
                        <div class="tab-pane" id="squad"><PlayerBatting></PlayerBatting></div>
                        <div class="tab-pane" id="stats"><PlayerBowling></PlayerBowling></div>
<!--                        <div class="tab-pane" id="pointstable">Hello i am poinstable</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PlayerInfo from "./PlayerInfo";
    import PlayerBatting from "./PlayerBatting";
    import PlayerBowling from "./PlayerBowling";
    export default {
        name: "PlayerDetail",
        components: {PlayerBowling, PlayerBatting, PlayerInfo}
    }
</script>

<style scoped>


    .nav-item .nav-link{
        border : 0px;
        border-radius : 0px;
        color : #343434;
        padding: 12px;
    }

    .nav-item{
        font-size: 13px;
        background: #fff;
    }

    .nav-tabs-boxed{
        background: #fff;
    }

    .live .nav-item .active{
        color : #343434;
        font-weight : bold;
        border-bottom: 2px solid #343434;
    }

    .tab-content{
        border-radius: 0;
        border : 0;
    }
</style>
