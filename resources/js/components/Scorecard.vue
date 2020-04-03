<template>
    <div id="scorecard">
            <div class="table-header">
                <span>India won by 4 runs</span>
            </div>
        <div class="team-header">
            <div class="row">
                <div class="col-6 team-name">
                    <span>IND inn</span>
                </div>
                <div class="col-6 team-score">
                    <span>299-10 (99.4)</span>
                </div>
            </div>
        </div>
        <div class="tables table-responsive">
            <table class="table invoice">
                <thead>
                <tr>
                    <th scope="col">Batsman</th>
                    <th scope="col">R</th>
                    <th scope="col">B</th>
                    <th scope="col">4s</th>
                    <th scope="col">6s</th>
                    <th scope="col">SR</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        V Kohli
                        <p>c Fortuin b Budaza</p>
                    </td>
                    <td>123</td>
                    <td>110</td>
                    <td>6</td>
                    <td>5</td>
                    <td>123.2</td>
                </tr>
                <tr>
                    <td>R Sharma<p>b Mokoena</p></td>
                    <td>123</td>
                    <td>110</td>
                    <td>6</td>
                    <td>5</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>R Sharma<p>b Mokoena</p></td>
                    <td>123</td>
                    <td>110</td>
                    <td>6</td>
                    <td>5</td>
                    <td>1</td>
                </tr>
                </tbody>
            </table>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6 left-col">
                        <p>Extras</p>
                    </div>
                    <div class="col-6 right-col">
                        <p><b>12 </b>  b 1, lb 2, w 11, nb 0</p>
                    </div>
                </div >
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6 left-col">
                        <p>Total</p>
                    </div>
                    <div class="col-6 right-col">
                        <p><b>180 -10 (44.3)</b></p>
                    </div>
                </div >
            </li>
        </ul>
        <div class="tables table-responsive">
            <table class="table invoice">
                <thead>
                <tr>
                    <th scope="col">Bowler</th>
                    <th scope="col">O</th>
                    <th scope="col">M</th>
                    <th scope="col">R</th>
                    <th scope="col">W</th>
                    <th scope="col">ER</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>M Shami</td>
                    <td>1</td>
                    <td>0</td>
                    <td>6</td>
                    <td>0</td>
                    <td>12.2</td>
                </tr>
                <tr>
                    <td>B Kumar</td>
                    <td>1</td>
                    <td>0</td>
                    <td>6</td>
                    <td>0</td>
                    <td>12.2</td>
                </tr>
                <tr>
                    <td>K Ahmed</td>
                    <td>1</td>
                    <td>0</td>
                    <td>6</td>
                    <td>0</td>
                    <td>12.2</td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="tables table-responsive">
            <table class="table invoice">
                <thead>
                <tr>
                    <th scope="col">Fall of Wicket</th>
                    <th scope="col">Score</th>
                    <th scope="col">Over</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>V Kohli</td>
                    <td>15-1</td>
                    <td>2.3</td>
                </tr>
                <tr>
                    <td>R Sharma</td>
                    <td>45-2</td>
                    <td>8.2</td>
                </tr>
                <tr>
                    <td>MS Dhoni</td>
                    <td>110-3</td>
                    <td>17.5</td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Scorecard"
    }
</script>

<style scoped>
    #scorecard .table-header{
        padding: 8px 12px;
    }

    #scorecard .team-header{
        padding: 12px;
        /*background : #545a5f;*/
        /*color: #fff;*/
        font-weight : bold;
        background : #c2f1db;
        color: #545a5f;
    }
    #scorecard .team-header .team-score{
        text-align: right;
    }
    #scorecard table{
        margin-bottom : 0px;
    }

    #scorecard table thead tr{
        font-size: 0.7rem;
        border : 0;
    }

    #scorecard table thead tr th{
        border : 0;
        background: #545a5f;
        color : #fff;
        padding-top : 4px;
        padding-bottom : 4px;
    }

    #scorecard table tbody tr td{
        font-size : 0.7rem;
        padding: 6px 6px;
    }
    #scorecard table td{
        text-align: right;
    }
    #scorecard table th{
        text-align: right;
    }

    #scorecard table td:nth-child(1){
        text-align : left;
        padding : 12px;
        color: #0198E1;
        padding-top: 6px;
        padding-bottom : 6px;
    }
    #scorecard table th:nth-child(1) {
        text-align : left;
        padding-left : 12px;
        padding-right : 12px;

    }

    #scorecard table td:last-child{
        padding-right:12px;

    }

    #scorecard table th:last-child{
        padding-right:12px;
    }

    #scorecard table td:nth-child(1) p{
        margin: 0;
        color : #545a5f;
        font-size : 0.65rem;
    }

    #scorecard .list-group{

    }

    #scorecard .list-group .list-group-item{
        border-right: 0;
        border-left: 0;
        border-radius: 0;
        font-size : 0.7rem;
        padding: 6px 12px;
    }
    #scorecard .list-group .list-group-item p {
        margin : 0;
    }

    #scorecard .list-group .left-col{
        font-weight : bold;
    }
    #scorecard .list-group .right-col{
        text-align : right;
    }


</style>
