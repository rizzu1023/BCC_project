<template>
    <div id="matchDetail">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs live" role="tablist">
                        <router-link to="info">
                            <li class="nav-item"><a class="nav-link">info</a></li>
                        </router-link>
                        <router-link to="live">
                            <li class="nav-item"><a class="nav-link">Live</a></li>
                        </router-link>
                        <router-link to="scorecard">
                            <li class="nav-item"><a class="nav-link">Scorecard</a></li>
                        </router-link>
                        <router-link to="overs">
                            <li class="nav-item"><a class="nav-link">Overs</a></li>
                        </router-link>
<!--                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pointstable" role="tab" aria-controls="messages">OVERS</a></li>-->
                    </ul>
                    <div class="tab-content p-0">
                        <router-view></router-view>
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
        text-transform: uppercase;


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
        margin-top: 47.5px;

    }

    .router-link-exact-active .nav-item .nav-link{
        color : #fff;
        text-decoration: none;
        background: #545a5f;
        font-weight : bold;
        border-bottom: 3px solid #fff;
    }

    .nav-tabs {
        position: fixed;
        top: 56px;
        background: #545a5f;
        width : 100vw;
        z-index : 1000;
    }

    .nav-tabs a{
        text-decoration: none;
    }
</style>
