<template>
    <div id="playerInfo">
        <div class="col-12 image text-center">
            <img width="100px" height="100px" src="/assets/Main/image/avatar.jpg" alt="avatar">
        </div>
        <div class="col-12 text-center">
            <h4>{{ player.player_name}}</h4>
        </div>
    </div>
</template>

<script>
    export default {

        name: "PlayerInfo",

        mounted: function () {
            this.loadPlayer();
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
                player: {},
            }
        },
    }
</script>


<style scoped>
    .image {
        padding-top: 60px;
        padding-bottom : 20px;
    }

    .image img {
        border-radius: 50%;
    }

</style>
