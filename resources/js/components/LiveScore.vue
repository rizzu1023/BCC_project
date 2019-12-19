<template>
    <h1>hello i am live score</h1>
</template>

<script>
    export default {
        name: "LiveScore",

        data : function () {
            return{
                matchData : null,
            }
        },


        mounted() {
            axios.get('http://localhost:8000/api/data/2/IPL2019')
                .then(response => this.matchData = response.data)
                .catch(function (error) {
                    console.log(error);
                });

        },

    }
</script>

<style scoped>

</style>
