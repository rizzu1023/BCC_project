<template>
    <div id="liveMatch">
               <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 main-score">
                            <h6>INDIA</h6>
                            <p><b>148-4</b><span class="text-muted">(19.4)</span></p>
                        </div>
                        <div class="col-3 rrr">
                            <span class="text-muted">RRR</span>
                            <p>5.53</p>
                        </div>
                        <div class="col-3 crr">
                            <span class="text-muted">CRR</span>
                            <p>4.53</p>
                        </div>
                        <div class="col-12 need-run">
                            <p class="m-0">India need 85 runs to win</p>
                        </div>
                    </div>
                </div>

            </div>
        <ul class="list-group">
            <li class="list-group-item">
              <div class="row">
                <div class="col-6 partnership">
                    <p>P'SHIP <span> 102(80)</span></p>
                </div>
                <div class="col-6 target">
                    <p>TARGET <span> 170</span></p>
                </div>
              </div >
            </li>
        </ul>
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
                        <td>V Kohli</td>
                        <td>123</td>
                        <td>110</td>
                        <td>6</td>
                        <td>5</td>
                        <td>132.99</td>
                    </tr>
                    <tr>
                        <td>R Sharma</td>
                        <td>123</td>
                        <td>110</td>
                        <td>6</td>
                        <td>5</td>
                        <td>132.99</td>
                    </tr>
                    </tbody>
                </table>
        </div>
               <div class="tables table-responsive">
                    <table class="table">
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
                            <td>M Starc</td>
                            <td>12</td>
                            <td>1</td>
                            <td>65</td>
                            <td>1</td>
                            <td>13.6</td>
                        </tr>
                        </tbody>
                    </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LiveMatch"
    }
</script>

<style scoped>

    #liveMatch .card{
        border-radius : 0;
        margin  : 0;
        border : 0;
    }
    #liveMatch .card .card-body{
        padding-left: 12px;
        padding-right: 12px;
    }
    #liveMatch .card p{
        margin : 0;
    }
    #liveMatch .main-score p{
    }
    #liveMatch .crr p, .rrr p{
        font-weight: bold;
    }
    #liveMatch .need-run{
        color : red;
        margin-top: 10px;
    }

    #liveMatch .list-group-item{
        border-right: 0;
        border-bottom: 0;
        border-left: 0;
        border-radius: 0;
        padding: 12px;
    }
    #liveMatch .list-group-item p{
        margin : 0;
        font-size : 0.7rem;
    }
    #liveMatch .list-group-item p span{
        font-weight: bold;
    }

    #liveMatch .list-group-item .target{
        text-align : right;
    }

    #liveMatch table thead tr th{
        font-size: 0.7rem;
        border : 0;
        padding-top: 8px;
        padding-bottom: 8px;
    }
    #liveMatch table {
        border-collapse :collapse;
    }


    #liveMatch table thead th{
        /*border : 0.5rem;*/
        background: #c2f1db;
        color : #545a5f;
    }

    #liveMatch table tbody tr td{
        font-size : 0.65rem;
        border-bottom : 0;
        border-top : 0;
        padding-top: 8px;
        padding-bottom: 8px;
    }
    #liveMatch table td{
        text-align: right;
    }
    #liveMatch table th{
        text-align: right;
    }

    #liveMatch table td:nth-child(1){
        text-align : left;
        color: #0198E1;
    }
    #liveMatch table th:nth-child(1) {
        text-align : left
    }



</style>
