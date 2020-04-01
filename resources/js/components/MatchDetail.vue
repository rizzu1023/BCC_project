<template>
    <div id="matchDetail">
        <div class="row">
            <div class="col-12">
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
    .nav-item{
        font-size: 13px;
        background: #fff;
    }

    .nav-item .nav-link{
        border : 0px;
        border-radius : 0px;
        color : #343434;
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
