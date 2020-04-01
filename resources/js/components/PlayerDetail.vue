<template>
    <div id="playerDetail">
        <div class="row">
            <div class="col-12">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#schedule" role="tab" aria-controls="home">INFO</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#squad" role="tab" aria-controls="profile">BATTING</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#stats" role="tab" aria-controls="profile">BOWLING</a></li>
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
    .nav-item{
        font-size: 12px;
    }

    .nav-item .nav-link{
        border : 0px;
        border-radius : 0px;
        color : #343434;
        padding: 12px;
    }

    .nav-item .active{
        color : #343434;
        font-weight : bold;
    }

    .tab-content{
        border-radius: 0;
        border-left: 0;
        border-right: 0;
        border-bottom: 0;
    }
</style>
