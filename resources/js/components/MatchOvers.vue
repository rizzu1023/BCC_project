<template>
    <div id="matchOvers">
        <div id="overs">
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 left-col">
                        <p>Ov 12</p>
                        <span class="text-muted">19 runs</span>
                    </div>
                    <div class="col-9 right-col">
                        <p>Shane Watsom</p>
                        <span>l1</span>
                        <span>4</span>
                        <span>1</span>
                        <span>2</span>


                    </div>
                </div>
            </div>

        </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "MatchOvers"
    }
</script>

<style scoped>
    #matchOvers .card{
        border-top : 0;
        border-right : 0;
        border-left : 0;
        border-radius : 0;
    }

    #matchOvers .card-body {
        padding : 12px
    }

    #matchOvers .card-body p{
        font-size : .85rem;
        margin-bottom : 6px;
        font-weight: bold;
    }

    #matchOvers .card-body .left-col span{
        font-size: .7rem;
    }

    #matchOvers .card-body .right-col span {
        background: #545a5f;
        color : white;
        border-radius : 50%;
        padding : 2px 6px;
        font-size : .65rem;
    }


</style>
