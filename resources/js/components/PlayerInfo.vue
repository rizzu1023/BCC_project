<template>
    <div id="playerInfo">
            <h4  v-if="player.player">{{ player.player_name}}</h4>
    </div>
</template>

<script>
    export default {

    name: "PlayerInfo",

    mounted : function() {
        this.loadPlayer();
    },

    methods : {
        loadPlayer() {
            var $url = "http://localhost:8000/api/player/" + this.$route.params.player_id;
            axios.get($url)
                .then(response => this.player = response.data)
                .catch(function(error){
                    console.log(error);
                });
        }
    },

    data : function(){
        return {
            player : null,
        }
    },
    }
</script>


<style scoped>

</style>
