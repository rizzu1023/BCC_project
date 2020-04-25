<template>
    <div id="playerBowling">
        <div class="tables table-responsive" style="margin-top:46px">
            <div class="panel-body widget-shadow">
                <!--                <div class="py-2 px-4 table-header">-->
                <!--                    <span>CAREER</span>-->
                <!--                </div>-->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Bowling</th>
                        <th scope="col">Overall</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td>Matches</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Innings</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Runs</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Balls</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Maidens</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Wickets</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Average</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Economy</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>SR</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>BBI</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>BBM</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>4w</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>5w</td>
                        <td>100</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PlayerBowling",

        mounted() {
            var route = this.$router;
            $(function () {
                $("#playerBowling").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction === 'right'){
                            route.replace('batting');
                        }
                    }, allowPageScroll: "auto"
                });
            });
        }
    }
</script>

<style scoped>
    #playerBowling .table{
        margin: 0;
    }
    #playerBowling .table tbody tr td {
        font-size: 0.8rem;
    }

    #playerBowling .table thead th {
        font-size: 0.8rem;
    }

    #playerBowling .table thead {
        background: #dbdbdb;
        color: #dc3545;
    }

    #playerBowling .table thead tr th {
        border: none;
    }


    #playerBowling .table-header {
        background: #dc3545;
        color: #FFF;
        text-align: center;
    }

    #playerBowling .table-header span {
        font-size: 0.85rem;
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
