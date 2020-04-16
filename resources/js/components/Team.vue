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
            this.detectswipe('team',this.myfunction)
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

            detectswipe(el, func) {
                var swipe_det;
                swipe_det = new Object();
                swipe_det.sX = 0;
                swipe_det.sY = 0;
                swipe_det.eX = 0;
                swipe_det.eY = 0;
                var min_x = 30;  //min x swipe for horizontal swipe
                var max_x = 30;  //max x difference for vertical swipe
                var min_y = 50;  //min y swipe for vertical swipe
                var max_y = 60;  //max y difference for horizontal swipe
                var direc = "";
                var ele = document.getElementById(el);
                ele.addEventListener('touchstart', function (e) {
                    var t = e.touches[0];
                    swipe_det.sX = t.screenX;
                    swipe_det.sY = t.screenY;
                }, false);
                ele.addEventListener('touchmove', function (e) {
                    e.preventDefault();
                    var t = e.touches[0];
                    swipe_det.eX = t.screenX;
                    swipe_det.eY = t.screenY;
                }, false);
                ele.addEventListener('touchend', function (e) {
                    //horizontal detection
                    if ((((swipe_det.eX - min_x > swipe_det.sX) || (swipe_det.eX + min_x < swipe_det.sX)) && ((swipe_det.eY < swipe_det.sY + max_y) && (swipe_det.sY > swipe_det.eY - max_y) && (swipe_det.eX > 0)))) {
                        if (swipe_det.eX > swipe_det.sX) {
                            direc = "r";
                        }

                        else direc = "l";
                    }
                    //vertical detection
                    else if ((((swipe_det.eY - min_y > swipe_det.sY) || (swipe_det.eY + min_y < swipe_det.sY)) && ((swipe_det.eX < swipe_det.sX + max_x) && (swipe_det.sX > swipe_det.eX - max_x) && (swipe_det.eY > 0)))) {
                        if (swipe_det.eY > swipe_det.sY) direc = "d";
                        else direc = "u";
                    }

                    if (direc != "") {
                        if (typeof func == 'function') func(el, direc);
                    }

                    direc = "";
                    swipe_det.sX = 0;
                    swipe_det.sY = 0;
                    swipe_det.eX = 0;
                    swipe_det.eY = 0;
                }, false);
            },

            myfunction(el,d) {
                if( d == 'r' ){
                    this.$router.replace('schedule');
                }
                if( d == 'l' ){
                    this.$router.replace('stats');
                }
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
