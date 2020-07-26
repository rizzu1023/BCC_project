<template>
    <div id="tournamentDetail">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs live" role="tablist">
<!--                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#schedule" role="tab" aria-controls="schedule">MATCHES</a></li>-->
                        <router-link to="schedule" replace>
                            <li class="nav-item"><a class="nav-link">Matches</a></li>
                        </router-link>
                        <router-link to='result' replace>
                             <li class="nav-item"><a class="nav-link">Results</a></li>
                        </router-link>
                        <router-link to='teams' replace>
                            <li class="nav-item"><a class="nav-link">Teams</a></li>
                        </router-link>
                        <router-link to="stats" replace>
                            <li class="nav-item"><a class="nav-link">Stats</a></li>
                        </router-link>
                        <router-link to="pointsTable" replace>
                            <li class="nav-item"><a class="nav-link">PT</a></li>
                        </router-link>
                    </ul>
                </div>

                <div class="tab-content p-0">
                           <router-view></router-view>
<!--                        <div class="tab-pane active" id="schedule"><Schedule></Schedule></div>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Schedule from "./Schedule";
    import Stats from "./Stats";
    import PointsTable from "./PointsTable";
    export default {
        name: "TournamentDetail",


        components: {PointsTable, Stats, Schedule},


    }
</script>

<style scoped>
    .nav-tabs-boxed{
        background: #1a1a1a;

    }

    .nav-tabs {
        position: fixed;
        top: 56px;
        width : 100vw;
        z-index : 1000;
        background: #1a1a1a;
        box-shadow : 0 9px 8px -9px gray;

    }

    .nav-item{
        font-size: 0.8rem;
        background: #1a1a1a;
        text-transform: uppercase;
    }



    .nav-tabs a{
        text-decoration: none;
    }

    .nav-item .nav-link{
        border : 0px;
        border-radius : 0px;
        color : #cbcbcb;
        padding: 12px;
    }

   

    .tab-content{
        border-radius: 0;
        border : 0;
        margin-top: 47.5px;
    }

    .router-link-exact-active .nav-item .nav-link{
        color : #fff;
        text-decoration: none;
        background: #1a1a1a;
        font-weight : bold;
        border-bottom: 3px solid #fff;
    }







</style>
