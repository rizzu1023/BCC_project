<template>
        <div>
            <p>{{ data.title }}</p>
            <button @click="toggle = ! toggle">Details</button>
            <p v-if="toggle" >{{ data.description }}</p>
        </div>
</template>

<script>
    export default {
        name : "Accordion",

        props : ['data'],
          
        data : function(){
                return {
                    toggle : false, 
                }
            }
    }    
</script>

<style scoped>

</style>