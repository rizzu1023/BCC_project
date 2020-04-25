<template>
    <div id="playerBatting">
        <div class="tables table-responsive" style="margin-top:46px">
            <div class="panel-body widget-shadow">
<!--                <div class="py-2 px-4 table-header">-->
<!--                    <span>CAREER</span>-->
<!--                </div>-->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Batting</th>
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
                        <td>Highest</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Average</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>SR</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Not Out</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Fours</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Sixes</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Ducks</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>50s</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>100s</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>200s</td>
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
        name: "PlayerBatting",

        mounted() {
            var route = this.$router;
            $(function () {
                $("#playerBatting").swipe({
                    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                        if (direction === 'left')
                            route.replace('bowling');
                        if (direction === 'right'){
                            route.replace('info');
                        }
                    }, allowPageScroll: "auto"
                });
            });
        },
    }
</script>

<style scoped>
    #playerBatting .table{
        margin: 0;
    }
    #playerBatting .table tbody tr td {
        font-size: 0.8rem;
    }

    #playerBatting .table thead th {
        font-size: 0.8rem;
    }

    #playerBatting .table thead {
        background: #dbdbdb;
        color: #dc3545;
    }

    #playerBatting .table thead tr th {
        border: none;
    }


    #playerBatting .table-header {
        background: #dc3545;
        color: #FFF;
        text-align: center;
    }

    #playerBatting .table-header span {
        font-size: 0.85rem;
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
