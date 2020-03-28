<template>

    <div id="playerDetail">
        <ul class="list-group">
            <div v-for="player in players" :key="player.id" :data="player">
                <router-link :to="'/player/' + player.id " style="text-decoration:none; color:#000">
                    <li class="list-group-item" style="border-radius: 0;">
                        <h5 style="font-weight:bold" v-text="player.player_name"></h5>
                        <span style="font-size: 12px" v-text="player.player_role"></span>
                    </li>
                </router-link>
            </div>
        </ul>
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
                var $url = "http://localhost:8000/api/teams/" + this.$route.params.team + "/players";
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

</style>
