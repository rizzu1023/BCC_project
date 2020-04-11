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
                        <router-link to='teams' replace>
                             <li class="nav-item"><a class="nav-link">Teams</a></li>
                        </router-link>
                        <router-link to="stats" replace>
                            <li class="nav-item"><a class="nav-link">Stats</a></li>
                        </router-link>
                        <router-link to="pointsTable" replace>
                            <li class="nav-item"><a class="nav-link">PointsTable</a></li>
                        </router-link>
                    </ul>
                    <div class="tab-content p-0">
                           <router-view></router-view>
<!--                        <div class="tab-pane active" id="schedule"><Schedule></Schedule></div>-->
                    </div>
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
        background: #1e72fa;
    }


    .nav-item{
        font-size: 0.85rem;
        background: #1e72fa;
        text-transform: uppercase;

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
        background: #1e72fa;
        font-weight : bold;
        border-bottom: 3px solid #fff;
    }

    .nav-tabs {
        position: fixed;
        top: 56px;
        background: #1e72fa;
        width : 100vw;
        z-index : 1000;
    }

    .nav-tabs a{
        text-decoration: none;
    }





</style>
