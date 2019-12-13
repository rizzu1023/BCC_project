<template>
           <div class="tables">
            <div class="panel-body widget-shadow">
                <table class="table">
                <thead>
                  <tr>
                     <th>Sr</th>
                     <th>Player Id</th>
                     <th>Player Name</th>
                     <th>Player Role</th>
                     <th>Team</th>
                  </tr>
                </thead>
                <tbody>
                <tr v-for="post in posts" :key="post.id" v-model="color = post.team_id" :data="post"  :class="backgroundColor">
                    <td v-text="color"></td>
                    <td v-text="post.player_id"></td>
                    <td v-text="post.player_name"></td>
                    <td v-text="post.player_role"></td>
                    <td v-text="post.team_id"></td> 
                </tr>
                
                </tbody>
                </table>
                </div>
           </div>
        </div>
    
       
    
</template>

<script>
    export default {
        name : 'Players',

        mounted : function(){
        axios.get('http://localhost:8000/api/players')
            .then(response => this.posts = response.data)
            .catch(error => this.posts = [{title : 'No posts found'}]);
        },

         computed : {
            backgroundColor : function(){ 
            if(this.color == 4){
            return{
                'blue-color' : true, 
            }
            if(this.color == 3){
               return{
                'blue-color' : true, 
            }
            }
            }
            }
        },

        data : function(){
            return {
                posts : null,
                color : null,
            }
        },

       
        }
    
</script>

<style scoped>
 .red-color{
    background-color : lightyellow;
  }
  .blue-color{
      background-color : lightblue;
  }
</style>