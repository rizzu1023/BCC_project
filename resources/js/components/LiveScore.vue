<template>
    <table class="table mt-4">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
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
