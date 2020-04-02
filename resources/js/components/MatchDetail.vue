<template>
    <div id="matchDetail">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs live" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#squad" role="tab" aria-controls="profile">INFO</a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#schedule" role="tab" aria-controls="home">LIVE</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#stats" role="tab" aria-controls="profile">SCORECARD</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pointstable" role="tab" aria-controls="messages">OVERS</a></li>
                    </ul>
                    <div class="tab-content m-0 p-0">
                        <div class="tab-pane active" id="squad"><MatchInfo></MatchInfo></div>
                        <div class="tab-pane " id="schedule"><LiveMatch></LiveMatch></div>
                        <div class="tab-pane" id="stats"><Scorecard></Scorecard></div>
                        <div class="tab-pane" id="pointstable"><MatchOvers></MatchOvers></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MatchInfo from "./MatchInfo";
    import LiveMatch from "./LiveMatch";
    import Scorecard from "./Scorecard";
    import MatchOvers from "./MatchOvers";
    export default {
        name: "MatchDetail",
        components: {MatchOvers, Scorecard, LiveMatch, MatchInfo}
    }
</script>

<style scoped>
    .nav-tabs-boxed{
        background: #545a5f;
    }


    .nav-item{
        font-size: 0.85rem;
        background: #545a5f;

    }

    .nav-item .nav-link{
        border : 0px;
        border-radius : 0px;
        color : #cbcbcb;
        padding: 12px;
    }

    .live .nav-item .active{
        color : #fff;
        background: #545a5f;
        font-weight : bold;
        border-bottom: 3px solid #fff;
    }

    .tab-content{
        border-radius: 0;
        border : 0;
    }
</style>
