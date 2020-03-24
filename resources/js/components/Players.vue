<template>

    <div id="player">
        <!--            //modal-->
        <div class="modal fade" id="addPlayer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form @submit.prevent="editMode ? editPlayer() : addPlayer()">
                        <div class="modal-header">
                            <h4 v-show="!editMode" class="modal-title">Add Player</h4>
                            <h4 v-show="editMode" class="modal-title">Edit Player</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="username2" type="text" v-model="form.player_id"
                                               placeholder="Player ID" required
                                               :class="{ 'is-invalid': form.errors.has('player_id') }">
                                        <has-error :form="form" field="player_id"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="email2" type="text" v-model="form.player_name"
                                               placeholder="Player Name" required
                                               :class="{ 'is-invalid': form.errors.has('player_name') }">
                                        <has-error :form="form" field="player_name"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="ccyear" required v-model="form.player_role"
                                            :class="{ 'is-invalid': form.errors.has('player_role') }">
                                        <option :selected="true">Player Role</option>
                                        <option value="BT">Batsman</option>
                                        <option value="BW">Bowler</option>
                                        <option value="AL">All Rounder</option>
                                        <option value="WK">Wicket keeper</option>
                                    </select>
                                    <has-error :form="form" field="player_role"></has-error>

                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="ccyea" v-model="form.team_id"
                                            :class="{ 'is-invalid': form.errors.has('team_id') }">
                                        <option>Select Team</option>
                                        <option v-for="team in teams" :key="team.team_id" :data="team"
                                                v-bind:value="team.id">{{ team.team_name }}
                                        </option>
                                        <has-error :form="form" field="team_id"></has-error>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <button v-show="!editMode" class="btn btn-primary" type="submit">Add</button>
                            <button v-show="editMode" class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mb-1 mt-4" type="button" @click="openModal">Add
            Player
        </button>
        <!--    Table-->
        <div class="tables mt-2 table-responsive table-hover">
                    <div class="panel-body widget-shadow">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Modify</th>
                                <th scope="col">Player ID</th>
                                <th scope="col">Player Name</th>
                                <th scope="col">Player Role</th>
                                <th scope="col">Player Team</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="player in players" :key="player.id" :data="player">
                                <td>
                                    <button @click="editModal(player)" class="btn btn-sm btn-success">Edit</button>
                                    <button @click="deletePlayer(player.id)" class="btn btn-sm btn-danger">Delete
                                    </button>
                                </td>
                                <td v-text="player.player_id"></td>
                                <td v-text="player.player_name"></td>
                                <td v-text="player.player_role"></td>
                                <td v-text="player.player_team.team_name"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
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
                axios.get('http://localhost:8000/api/admin/Players')
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
