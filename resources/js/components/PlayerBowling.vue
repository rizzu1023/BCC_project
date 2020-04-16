<template>
    <div id="playerBowling">
        <div class="text-center p-5">
            <h4 class="p-5">Working on it...</h4>
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

</style>
