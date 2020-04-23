<template>

    <div id="playerDetail">
        <div v-if="players">
        <div class="py-2 px-4 table-header">
            <span>{{this.$route.query.team_name}}</span>
        </div>

        <ul class="list-group" style="margin-top:40px">
            <div v-for="player in players" :key="player.id" :data="player">
                <router-link :to="'/player/' + player.id + '/info'" style="text-decoration:none; color:#000">
                    <li class="list-group-item" style="border-radius: 0;">
                        <div class="row">
                            <div class="col-2">
                                <img width="40px" height="40px" src="/assets/Main/image/avatar.jpg" alt="avatar"/>
                            </div>
                            <div class="col-10">
                                <h6 v-text="player.player_name"></h6>
                                <span class="text-muted" style="font-size: 12px" v-text="player.player_role"></span>
                            </div>
                        </div>
                    </li>
                </router-link>
            </div>
        </ul>
        </div>

        <div id="loader" v-else>
            <div id="preloader"></div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'Players',

        mounted: function () {
            this.loadPlayers();
        },

        methods: {

            openModal() {
                this.form.reset();
                this.form.clear();
                $('#addPlayer').modal('show');
                this.editMode = false;
            },

            editModal(player) {
                this.form.reset();
                this.form.clear();
                $('#addPlayer').modal('show');
                this.form.fill(player);
                this.editMode = true;
            },

            addPlayer() {
                this.form.post('http://localhost:8000/api/admin/Players')
                    .then(() => {
                        Toast.fire({
                            icon: 'success',
                            title: 'Player Added Succesfully'
                        });
                        $('#addPlayer').modal('hide');
                        this.loadPlayers();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },

            loadPlayers() {
                // player fetching
                var $url = this.$domainName + "teams/" + this.$route.params.team + "/players";
                axios.get($url)
                    .then(response => this.players = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });

                //team fetching
                axios.get('http://localhost:8000/api/admin/Team')
                    .then(response => this.teams = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });

            },

            editPlayer() {
                this.form.put('http://localhost:8000/api/admin/Players/' + this.form.id).then(() => {
                    this.loadPlayers();
                    $('#addPlayer').modal('hide');
                }).catch(function (error) {
                    console.log(error);
                });
            },

            deletePlayer(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //send request to server
                    if (result.value) {
                        this.form.delete('http://localhost:8000/api/admin/Players/' + id)
                            .then(() => {
                                Swal.fire(
                                    'Deleted!',
                                    'Player has been deleted.',
                                    'success'
                                );
                                this.loadPlayers();

                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    }
                });

            },

        },

        data: function () {
            return {
                players: null,
                teams: null,
                editMode: true,

                form: new form({
                    id: '',
                    player_id: '',
                    player_name: '',
                    player_role: '',
                    team_id: '',
                })
            }
        },


    }

</script>

<style scoped>
    .list-group-item {
        border-top: 0;
        border-right: 0;
        border-left: 0;
    }

    .list-group-item span {
        font-size: 0.8rem;
    }

    .list-group-item h6 {
        margin-bottom: 0.1rem;
    }
    .list-group-item .row img{
        /*border-radius: 50%;*/
    }

    .table-header{
        background: #1e72fa;
        color: #FFF;
        text-align: center;
        position: fixed;
        top: 56px;
        z-index : 1001;
        width: 100vw;
        box-shadow : 0 9px 8px -9px gray;

    }
    .table-header span{
        font-size: 0.85rem;
        font-weight : bold;
        text-transform : uppercase;
    }

    #loader{
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
