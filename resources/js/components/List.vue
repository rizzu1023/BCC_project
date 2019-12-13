<template>
      <div>
            <p v-text="dropdownResult"></p>

            <Dropdown @updateoption="updateOption"></Dropdown>
      </div>
</template>

<script>

//     import Dropdown from './Dropdown';

   export default {
       name : 'List',

       data : function(){
             return {
                   dropdownResult : '',
             }
       },

       methods : {
             updateOption : function(value){
                   this.dropdownResult = value;
             }
       }
   }
</script>

<style scoped>

</style>