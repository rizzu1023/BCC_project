<template>
    <div id="team">
        <!--            //modal-->
        <div class="modal fade" id="addTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form @submit.prevent="editMode ? editTeam() : addTeam()">
                        <div class="modal-header">
                            <h4 v-show="!editMode" class="modal-title">Add Team</h4>
                            <h4 v-show="editMode" class="modal-title">Edit Team</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="username2" type="text" v-model="form.team_code"
                                               placeholder="Team Code" required
                                               :class="{ 'is-invalid': form.errors.has('team_code') }">
                                        <has-error :form="form" field="team_code"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="email2" type="text" v-model="form.team_name"
                                               placeholder="Team Name" required
                                               :class="{ 'is-invalid': form.errors.has('team_name') }">
                                        <has-error :form="form" field="team_name"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" id="team_title" type="text" v-model="form.team_title"
                                               placeholder="Team Title" required
                                               :class="{ 'is-invalid': form.errors.has('team_title') }">
                                        <has-error :form="form" field="team_title"></has-error>
                                    </div>
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
            Team
        </button>
        <!--    Table-->
        <div class="tables mt-2 table-responsive table-hover">
            <div class="panel-body widget-shadow">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Modify</th>
                        <th scope="col">Team Code</th>
                        <th scope="col">Team Name</th>
                        <th scope="col">Team Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="team in teams" :key="team.id" :data="team">
                        <td>
                            <button @click="editModal(team)" class="btn btn-sm btn-success">Edit</button>
                            <button @click="deleteTeam(team.id)" class="btn btn-sm btn-danger">Delete
                            </button>
                        </td>
                        <td v-text="team.team_code"></td>
                        <td v-text="team.team_name"></td>
                        <td v-text="team.team_title"></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Team",

        mounted: function () {
            this.loadTeams();
        },

        methods: {

            openModal() {
                this.form.reset();
                this.form.clear();
                $('#addTeam').modal('show');
                this.editMode = false;
            },

            editModal(team) {
                this.form.reset();
                this.form.clear();
                $('#addTeam').modal('show');
                this.form.fill(team);
                this.editMode = true;
            },

            addTeam() {
                this.form.post('api/admin/Team')
                    .then(() => {
                        Toast.fire({
                            icon: 'success',
                            title: 'Team Added Succesfully'
                        });
                        $('#addTeam').modal('hide');
                        this.loadTeams();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },

            loadTeams() {
                //team fetching
                axios.get('api/admin/Team')
                    .then(response => this.teams = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });

            },

            editTeam() {
                this.form.put('api/admin/Team/' + this.form.id).then(() => {
                    this.loadTeams();
                    $('#addTeam').modal('hide');
                }).catch(function (error) {
                    console.log(error);
                });
            },

            deleteTeam(id) {
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
                        this.form.delete('api/admin/Team/' + id)
                            .then(() => {
                                Swal.fire(
                                    'Deleted!',
                                    'Team has been deleted.',
                                    'success'
                                );
                                this.loadTeams();
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
                teams: null,
                editMode: true,

                form: new form({
                    id: '',
                    team_code : '',
                    team_name : '',
                    team_title : '',
                })
            }
        },
    }
</script>

<style scoped>

</style>
