<template>
    <div id="team">
        <div v-if="teams">
            <div v-if="teams.length > 0">
                <ul class="list-group">
                    <div v-for="team in teams" :key="team.id" :data="team">
                        <router-link :to="{ path : '/teams/'+team.id+'/players', query : { team_name : team.team_name} }" style="text-decoration:none; color:#000">

                            <li class="list-group-item" style="border-radius: 0;">
                                <span v-text="team.team_name"></span>
                            </li>
                        </router-link>
                    </div>
                </ul>
            </div>
            <div id="not_started" v-else>
                <span>Teams Not found</span>
            </div>
        </div>
        <div id="loader" v-else>
            <div id="preloader"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Team",

        mounted: function () {
            this.loadTeams();
            var route = this.$router;
            $(function () {
                $("#team").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction === 'left')
                            route.replace('stats');
                        if (direction === 'right')
                            route.replace('schedule');
                    }, allowPageScroll: "auto"
                });
            });

            $('#team').addClass('animated fadeInRight faster');

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
                team_name : 'south Africa',

                form: new form({
                    id: '',
                    team_code: '',
                    team_name: '',
                    team_title: '',
                })
            }
        },
    }
</script>

<style scoped>
    #team .list-group-item {
        border-right: 0;
        border-left: 0;
        border-top: 0;
        padding-left: 12px;
        padding-right: 12px;
    }

    #team .list-group-item:hover, #team .list-group-item:active {
        background-color: #f0f0f0;
    }

    #team .list-group-item span {
        font-size: 0.9rem;
    }

    #team #not_started {
        width: 100vw;
        text-align: center;
        background: #f8fafc;
        margin-top: 45vh;
    }

    #loader {
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
