<template>
    <div id="matchDetail">
        <div class="row">
            <div class="col-12">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#squad" role="tab" aria-controls="profile">INFO</a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#schedule" role="tab" aria-controls="home">LIVE</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#stats" role="tab" aria-controls="profile">SCORECARD</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pointstable" role="tab" aria-controls="messages">OVERS</a></li>
                    </ul>
                    <div class="tab-content m-0 p-0">
                        <div class="tab-pane active" id="squad"><MatchInfo></MatchInfo></div>
                        <div class="tab-pane " id="schedule">LIVE</div>
                        <div class="tab-pane" id="stats">SCORECARD</div>
                        <div class="tab-pane" id="pointstable">OVERSe</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MatchInfo from "./MatchInfo";
    export default {
        name: "MatchDetail",
        components: {MatchInfo}
    }
</script>

<style scoped>
    .nav-item{
        font-size: 13px;
    }

    .nav-item .nav-link{
        border : 0px;
        border-radius : 0px;
        color : #343434;
    }

    .nav-item .active{
        color : #343434;
    }
</style>
