<template>
      <div>
           <select name="dropdown" id="dropdown" v-model="selectedOption" v-on:change="optionChanged">
                <option value="null" disabled>Please select option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
           </select>
      </div>
</template>

<script>
   export default {
       name : 'Dropdown',

       data : function() {
           return {
               selectedOption : null,
           }
       },

       methods : {
           optionChanged : function(value){
               this.$emit('updateoption', this.selectedOption);
           }
       }
   }
</script>

<style scoped>

</style>