import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Accordion', require('./components/Accordion.vue').default);
Vue.component('Dropdown', require('./components/Dropdown.vue').default);
Vue.component('List', require('./components/List.vue').default);
Vue.component('Players', require('./components/Players.vue').default);

const app = new Vue({
    'el' : '#app',

    // components : {
    //     PlayerList,
    // },

    mounted : function(){
        axios.get('http://localhost:8000/api/players')
            .then(response => this.posts = response.data)
            .catch(error => this.posts = [{title : 'No posts found'}]);
        // axios.get('http://localhost:8000/api/players')
        // .then(function(response){
            // console.log(response);
        // })
        // .catch(function(error){
            // console.log(error);
        // });
        },

    data : {
        // items : [
        //     { id : 1, title : 'Title 1 this' , description : 'This is Description 1' },
        //     { id : 2, title : 'Title 2' , description : 'This is Description 2' },
        //     { id : 3, title : 'Title 3' , description : 'This is Description 3' },
        //     { id : 4, title : 'Title 4' , description : 'This is Description 4' },
        // ],

        posts : null,
    },
});
