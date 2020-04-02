<template>
    <div id="tournament" >
        <ul class="list-group">
            <div v-for="tournament in tournaments" :key="tournament.id" :data="tournament">
            <router-link :to="'/tournament/' + tournament.id + '/schedule'" style="text-decoration:none; color:#000">
            <li class="list-group-item">
                <h5 style="font-weight:bold" v-text="tournament.tournament_name"></h5>
                <span style="font-size: 12px"> Jan 24 - Apr 09</span>
            </li>
            </router-link>
            </div>
        </ul>
<!--        <div class="row">-->
<!--        <div class="col-sm-6 col-md-4" v-for="tournament in tournaments" :key="tournament.id" :data="tournament">-->
<!--            <div class="card">-->
<!--                <div class="card-body" v-text="tournament.tournament_name"></div>-->
<!--                <div class="card-footer">Explore</div>-->
<!--            </div>-->
<!--        </div>-->
<!--        </div>-->
    </div>
</template>

<script>
    export default {
        name: "Tournament",

        mounted : function () {
            this.loadPlayers();
        },


        methods : {
            loadPlayers() {
                var $url = this.$domainName + "tournament";
                    axios.get($url)
                    .then(response => this.tournaments = response.data)
                    .catch(function (error){
                        console.log(error);
                    });
            },
        },

        data : function () {
            return {
                tournaments : null,
            }
        },
    }
</script>

<style scoped>
    .list-group-item{
        border-radius: 0;
        border-top: 0;
        border-right: 0;
        border-left: 0;
    }
</style>
