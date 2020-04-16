<template>
    <div id="playerBatting">
        <div class="text-center p-5">
            <h4  class="p-5">Working on it...</h4>
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

</style>
