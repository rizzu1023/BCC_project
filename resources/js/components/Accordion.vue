<template>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables ftable">
                <div class="panel-body widget-shadow">

                    <div class="col-md-12 team-name"><h3>123-4 (12.2)</h3></div>

                    <form id="updateForm">
                        <table class="table">
                            <thead>
                            <tr class="bg-dark">
                                <th>Batsman</th>
                                <th>Runs</th>
                                <th>Balls</th>
                                <th>Fours</th>
                                <th>Sixes</th>
                                <th>SR</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td v-text="matchData.playerDetail[0]"></td>
                                <td>23</td>
                                <td>12</td>
                                <td>4</td>
                                <td>0</td>
                                <td>12</td>
                            </tr>

                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                            <tr class="bg-dark">
                                <th>Bowler</th>
                                <th>Overs</th>
                                <th>Maiden</th>
                                <th>Runs</th>
                                <th>Wicket</th>
                                <th>Eco</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Bowler1</td>
                                <td>12</td>
                                <td>0</td>
                                <td>3</td>
                                <td>1</td>

                                <td>121</td>
                            </tr>
                            </tbody>
                        </table>

                        <button id="dot" type="submit" value="8" class="bt">0</button>
                        <button id="single" type="submit" value="1" class="bt">1</button>
                        <button id="double" type="submit" value="2" class="bt">2</button>
                        <button id="triple" type="submit" value="3" class="bt">3</button>
                        <button id="four" type="submit" value="4" class="bt">4</button>
                        <button id="six" type="submit" value="6" class="bt">6</button>
                        <br><br>

                        <button id="wicket" type="submit" value="W" class="bt">W</button>
                        <br><br>


                        <button id="wide" type="submit" value="wd" class="bt">Wide + 0</button>
                        <button id="wide1" type="submit" value="wd1" class="bt">Wide + 1</button>
                        <button id="wide2" type="submit" value="wd2" class="bt">Wide + 2</button>
                        <button id="wide3" type="submit" value="wd3" class="bt">Wide + 3</button>
                        <button id="wide4" type="submit" value="wd2" class="bt">Wide + 4</button>
                        <br><br>

                        <button id="legbyes1" type="submit" value="lb1" class="bt">1 lb</button>
                        <button id="legbyes2" type="submit" value="lb2" class="bt">2 lb</button>
                        <button id="legbyes3" type="submit" value="lb3" class="bt">3 lb</button>
                        <button id="legbyes4" type="submit" value="lb4" class="bt">4 lb</button>
                        <br><br>

                        <button id="byes1" type="submit" value="b1" class="bt">1 b</button>
                        <button id="byes2" type="submit" value="b2" class="bt">2 b</button>
                        <button id="byes3" type="submit" value="b3" class="bt">3 b</button>
                        <button id="byes4" type="submit" value="b4" class="bt">4 b</button>
                        <br><br>

                        <button id="noball" type="submit" value="nb" class="bt">nb + 0</button>
                        <button id="noball1" type="submit" value="nb1" class="bt">nb + 1</button>
                        <button id="noball2" type="submit" value="nb2" class="bt">nb + 2</button>
                        <button id="noball3" type="submit" value="nb3" class="bt">nb + 3</button>
                        <button id="noball4" type="submit" value="nb4" class="bt">nb + 4</button>
                        <button id="noball5" type="submit" value="nb5" class="bt">nb + 5</button>
                        <button id="noball6" type="submit" value="nb6" class="bt">nb + 6</button>
                        <br><br>

                    </form>


                </div>
            </div>
        </div>
    </div>
</template>
<script>

    $(document).ready(function () {

    });
    export default {
        name: "Accordion",

        data: function () {
            return {
                matchData: null,
            }
        },

        mounted() {
            axios.get('http://localhost:8000/api/data/2/IPL2019')
                .then(response => this.matchData = response.data)
                .catch(function (error) {
                    console.log(error);
                });
            // this.battingLogic(this.matchData);
        },

        methods: {
            battingLogic: function (matchData) {
                alert(this.matchData);
            }
        },





    }


</script>

<style scoped>

</style>
