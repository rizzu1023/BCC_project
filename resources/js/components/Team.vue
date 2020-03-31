<template>
    <div id="team">
            <ul class="list-group">
                <div  v-for="team in teams" :key="team.id" :data="team">
                <router-link :to="'/teams/'+team.id+'/players'" style="text-decoration:none; color:#000">
                    <li class="list-group-item" style="border-radius: 0;">
                        <span v-text="team.team_name"></span>
                    </li>
                </router-link>
                </div>
            </ul>
    </div>
</template>

<script>
    export default {
        name: "Team",

        mounted: function () {
            this.loadTeams();
        },

        methods: {
            // addTeam() {
            //     this.form.post('api/admin/Team')
            //         .then(() => {
            //             Toast.fire({
            //                 icon: 'success',
            //                 title: 'Team Added Succesfully'
            //             });
            //             $('#addTeam').modal('hide');
            //             this.loadTeams();
            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //         });
            //
            // },
            // editTeam() {
            //     this.form.put('api/admin/Team/' + this.form.id).then(() => {
            //         this.loadTeams();
            //         $('#addTeam').modal('hide');
            //     }).catch(function (error) {
            //         console.log(error);
            //     });
            // },
            // deleteTeam(id) {
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         //send request to server
            //         if (result.value) {
            //             this.form.delete('api/admin/Team/' + id)
            //                 .then(() => {
            //                     Swal.fire(
            //                         'Deleted!',
            //                         'Team has been deleted.',
            //                         'success'
            //                     );
            //                     this.loadTeams();
            //                 })
            //                 .catch(function (error) {
            //                     console.log(error);
            //                 });
            //         }
            //     });
            //
            // },

            loadTeams() {
                //team fetching
                var $url = this.$domainName + "tournaments/" + this.$route.params.tournament_id + "/teams";
                axios.get($url)
                    .then(response => this.teams = response.data)
                    .catch(function (error) {
                        console.log(error);
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
    .list-group-item{
        border-right: 0;
        border-left: 0;
        border-top:0;
    }
    .list-group-item span{
        font-size: 0.8rem;
    }
</style>
