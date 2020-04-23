<template>
    <div id="playerDetail">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs live" role="tablist">
                        <router-link to="info" replace>
                            <li class="nav-item"><a class="nav-link">Info</a></li>
                        </router-link>
                        <router-link to="batting" replace>
                            <li class="nav-item"><a class="nav-link">Batting</a></li>
                        </router-link>
                        <router-link to="bowling" replace>
                            <li class="nav-item"><a class="nav-link">Bowling</a></li>
                        </router-link>
                    </ul>
                    <div class="tab-content m-0 p-0">
                      <router-view></router-view>
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

    .nav-tabs-boxed{
        background: #1e72fa;
    }


    .nav-item{
        font-size: 0.8rem;
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
        box-shadow : 0 9px 8px -9px gray;

    }

    .nav-tabs a{
        text-decoration: none;
    }
</style>
