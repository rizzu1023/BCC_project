<template>
    <div id="playerInfo">
        <div v-if="player">
            <div class="row m-0">
                <div class="col-12 image text-center">
                    <img width="100px" height="100px" src="/assets/Main/image/avatar.jpg" alt="avatar">
                </div>
                <div class="col-12 text-center player-name">
                    <h4 style="margin-bottom: 4px;">{{ player.player_name}}</h4>
                    <h6 style="color: #aaa;">{{this.$route.query.team_name}}</h6>
                </div>
                <span class="info-header">Personal Information</span>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row m-0">
                            <div class="col-4 p-0">Born</div>
                            <div class="col-8 p-0">10-23-2019</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row m-0">
                            <div class="col-4 p-0">Role</div>
                            <div class="col-8 p-0">{{player.player_role}}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row m-0">
                            <div class="col-4 p-0">Batting Style</div>
                            <div class="col-8 p-0">Right Handed Batsman</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row m-0">
                            <div class="col-4 p-0">Bowling Style</div>
                            <div class="col-8 p-0">Left Arm Break</div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

        <div id="loader" v-else>
            <div id="preloader"></div>
        </div>

    </div>
</template>

<script>
    export default {

        name: "PlayerInfo",

        mounted: function () {
            this.loadPlayer();
            var route = this.$router;
            $(function () {
                $("#playerInfo").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction === 'left') {
                            route.replace('batting');
                        }
                    }, allowPageScroll: "auto"
                });
            });
        },

        methods: {
            loadPlayer() {
                var $url = this.$domainName + "player/" + this.$route.params.player_id;
                axios.get($url)
                    .then(response => this.player = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },

        data: function () {
            return {
                player: null,
            }
        },
    }
</script>


<style scoped>
    #playerInfo .image {
        margin-top: 25px;
        padding-top: 60px;
        padding-bottom: 20px;
    }

    #playerInfo .image img {
        border-radius: 50%;
    }
    #playerInfo .player-name{
        margin-bottom: 15px;
    }

    #playerInfo .list-group-item {
        width: 100vw;
        border-radius: 0;
        border-right: none;
        border-left : none;
        font-size: .75rem;
        padding : 8px 12px;
        /*border-bottom : none;*/
    }

    #playerInfo .info-header{
        padding : 6px 12px;
        text-transform : uppercase;
        font-size : .75rem;
    }

    #playerInfo .list-group-item .col-4{
        color: #666;
    }
    #playerInfo .list-group-item .col-8{
        color : #000;
    }

        #loader {
        background: #f8fafc;
    }

    #preloader {
        height: 30px;
        width: 30px;
        margin: 40vh auto;
        border: 5px solid #dbdbdb;
        border-top: 5px solid #1a1a1a;
        border-radius: 50%;
        animation: rotate 1s infinite linear;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>
