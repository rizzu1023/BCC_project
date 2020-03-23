<template>
   <div id="batting">
       <div class="modal fade" id="addBatting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <form @submit.prevent="editBatting()">
                       <div class="modal-header">
                           <h4 class="modal-title">Edit</h4>
                           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <div class="card-body">
                               <div class="form-group">
                                   <div class="input-group">
                                       <input v-if="singleBatsman"  disabled class="form-control" id="username2" type="text" v-model="singleBatsman.playerDetail.player_name">
                                       <div class="input-group-append">
                                        <span class="input-group-text">
                                            Name
                                        </span>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="input-group">
                                       <input v-if="singleBatsman" disabled class="form-control" id="usedrname2" type="text" v-model="singleBatsman.playerDetail.player_team.team_name">
                                       <div class="input-group-append">
                                        <span class="input-group-text">
                                            Team name
                                        </span>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="input-group">
                                       <input class="form-control" id="email2" type="text" v-model="singleBatsman.bt_matches"
                                              required
                                              :class="{ 'is-invalid': form.errors.has('bt_matches') }">
                                       <div class="input-group-append">
                                        <span class="input-group-text">
                                            Matches
                                        </span>
                                       </div>
                                       <has-error :form="form" field="bt_matches"></has-error>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="input-group">
                                       <input class="form-control" id="title" type="text" v-model="singleBatsman.bt_innings"
                                               required
                                              :class="{ 'is-invalid': form.errors.has('bt_innings') }">
                                       <div class="input-group-append">
                                        <span class="input-group-text">
                                            Innings
                                        </span>
                                       </div>
                                       <has-error :form="form" field="bt_innings"></has-error>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="input-group">
                                       <input class="form-control" id="title" type="text" v-model="singleBatsman.bt_fours"
                                              required
                                              :class="{ 'is-invalid': form.errors.has('bt_fours') }">
                                       <div class="input-group-append">
                                        <span class="input-group-text">
                                            Fours
                                        </span>
                                       </div>
                                       <has-error :form="form" field="bt_fours"></has-error>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                           <button class="btn btn-success" type="submit">Update</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>

       <div class="tables mt-5 table-responsive table-hover">
           <div class="panel-body widget-shadow">
               <table class="table">
                   <thead class="thead-dark">
                   <tr>
                       <th scope="col">Modify</th>
                       <th scope="col">Player Name</th>
                       <th scope="col">Matches</th>
                       <th scope="col">Innings</th>
                       <th scope="col">Fours</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr v-for="batting in battings" :key="batting.id" :data="batting">
                       <td>
                           <button @click="editModal(batting)" class="btn btn-sm btn-success">Edit</button>
                       </td>
                       <td v-text="batting.playerDetail.player_name"></td>
                       <td v-text="batting.bt_matches"></td>
                       <td v-text="batting.bt_innings"></td>
                       <td v-text="batting.bt_balls"></td>
                   </tr>

                   </tbody>
               </table>
           </div>
       </div>

   </div>
</template>

<script>
    export default {
        name: "Batting",

        mounted: function () {
            this.loadBattings();
        },

        methods: {


            editModal(batting) {
                this.form.reset();
                this.form.clear();
                axios.get('api/admin/Batting/'+batting.id)
                    .then(response => this.singleBatsman = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });
                $('#addBatting').modal('show');
                this.form.fill(batting);
            },



            loadBattings() {
                axios.get('api/admin/Batting')
                    .then(response => this.battings = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });

            },

            editBatting() {
                axios.put('api/admin/Batting/' + this.form.id).then(() => {
                    this.loadBattings();
                    $('#addBatting').modal('hide');
                }).catch(function (error) {
                    console.log(error);
                });
            },
        },

        data: function () {
            return {
                battings: null,
                singleBatsman : '',

                form: new form({
                    id: '',
                    bt_matches : '',
                    bt_innings : '',
                    bt_balls : '',
                    bt_fours : '',
                })
            }
        },
    }
</script>

<style scoped>

</style>
