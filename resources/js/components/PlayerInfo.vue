<template>
    <div id="playerInfo">
        <div v-if="player">
            <div class="col-12 image text-center">
                <img width="100px" height="100px" src="/assets/Main/image/avatar.jpg" alt="avatar">
            </div>
            <div class="col-12 text-center">
                <h4>{{ player.player_name}}</h4>
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
                        if (direction === 'left'){
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
    .image {
        padding-top: 60px;
        padding-bottom: 20px;
    }

    .image img {
        border-radius: 50%;
    }

    #loader {
        background: #f8fafc;
    }

    #preloader {
        height: 30px;
        width: 30px;
        margin: 40vh auto;
        border: 5px solid #dbdbdb;
        border-top: 5px solid #1e72fa;
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
