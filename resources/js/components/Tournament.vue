<template>
    <div id="tournament">
        <div v-if="tournaments">
            <ul class="list-group">
                <div v-for="tournament in tournaments" :key="tournament.id" :data="tournament">
                    <router-link :to="'/tournament/' + tournament.id + '/schedule'"
                                 style="text-decoration:none; color:#000">
                        <li class="list-group-item">
                            <h5 v-text="tournament.tournament_name"></h5>
                            <span> Jan 24 - Apr 09</span>
                        </li>
                    </router-link>
                </div>
            </ul>
        </div>
        <div id="loader" v-else>
            <div id="preloader"></div>
        </div>
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

        mounted: function () {
            this.loadTournaments();
        },


        methods: {

            loadTournaments() {
                var $url = this.$domainName + "tournament";
                axios.get($url)
                    .then(response => this.tournaments = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        },

        data: function () {
            return {
                tournaments: null,
            }
        },
    }
</script>

<style scoped>
    #tournament .list-group-item {
        border-radius: 0;
        border-top: 0;
        border-right: 0;
        border-left: 0;
        padding-right: 12px;
        padding-left: 12px;
        text-align: center;
    }

    #tournament .list-group-item:hover, #tournament .list-group-item:active {
        background-color: #f0f0f0;
    }

    #tournament .list-group-item h5{
        font-weight: bold;
        font-size: 22px;
    }


    #tournament .list-group-item span {
        font-size: 12px;
    }

    #loader {
        background: #f8fafc;
    }

    #preloader {
        height: 30px;
        width: 30px;
        margin: 40vh auto;
        border: 5px solid #dbdbdb;
        border-top: 5px solid #dc3545;
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
