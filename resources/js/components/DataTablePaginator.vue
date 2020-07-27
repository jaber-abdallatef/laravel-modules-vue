<template>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li v-for="n in model.last_page" v-bind:key="n" class="page-item">
      <a class="page-link" href="#" v-on:click="getData(n)">{{n}}</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</template>
<script>
import { serverBus } from '../app.js';

export default {
   props: ['viewId'],
  data() {
    return {
      model: {}, 
      errors: "", 
      success:false
    };
  },
   beforeMount(){
        serverBus.$on('buildPaginator', (dataModel) => {
                          this.model = dataModel ;     
                });
   },
  methods: {
     getData : function(n){
        console.log(n) ; 
        serverBus.$emit('paginatePage', n);
     }
  }
};
</script>


