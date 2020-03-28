<template>
    <div id="tournament" >
        <div class="bg-dark py-2 px-4">
            <span>Batting</span>
        </div>
        <ul class="list-group">
                <router-link to="/tournament" style="text-decoration:none; color:#000">
                    <li class="list-group-item" style="border-radius: 0;">
                        <span>Most Runs</span>
                    </li>
                </router-link>
            <router-link to="/tournament" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Highest Scores</span>
                </li>
            </router-link>
            <router-link to="/tournament" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Most Hundreds</span>
                </li>
            </router-link>
            <router-link to="/tournament" style="text-decoration:none; color:#000">
                <li class="list-group-item" style="border-radius: 0;">
                    <span>Most Fifties</span>
                </li>
            </router-link>
        </ul>

        <div class="bg-dark py-2 px-4">
            <span>Bowling</span>
        </div>
        <ul class="list-group">
            <router-link to="/tournament" style="text-decoration:none; color:#000">
                <li class="list-group-item" style="border-radius: 0;">
                    <span>Most Wicket</span>
                </li>
            </router-link>
            <router-link to="/tournament" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Best Bowling Average</span>
                </li>
            </router-link>
            <router-link to="/tournament" style="text-decoration:none; color:#000">
                <li class="list-group-item">
                    <span>Best Economy</span>
                </li>
            </router-link>
            <router-link to="/tournament" style="text-decoration:none; color:#000">
                <li class="list-group-item" style="border-radius: 0;">
                    <span>Best Bowling Average</span>
                </li>
            </router-link>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Stats"
    }
</script>

<style scoped>

</style>
