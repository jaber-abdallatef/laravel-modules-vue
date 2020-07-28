<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
             <th v-for="(td,col) in model.data[0]" v-bind:key="col" >{{col}}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(row,index) in model.data" v-bind:key="index">
               <td v-for="(td,col) in row" v-bind:key="col">{{row[col]}}</td>
               <td>
                 <a href="#" v-on:click="updateData(row)">
                 <i class="fa fa-pencil" aria-hidden="true"></i></a>
               </td>
               <td>
                 <a href="#" v-on:click="removeData(row['id'])">
                   <i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
               </td>
            </tr> 
          </tbody>
        </table>
        <data-table-paginator></data-table-paginator>
      </div>
    </div>
  </div>
</template>

<script>
import { serverBus } from '../app.js';
export default {
    props: ['dataSrc'],
  data() {
    return {
      model: {
        data : '', 
        currentPage: 1 ,
      }
    };
  },
    beforeMount(){
    this.getData()  ; 
       serverBus.$on('refreshData', (refreshData) => {
                      this.getData() ; 
                }); 

       serverBus.$on('paginatePage', (pageNum) => {
          this.model.currentPage = pageNum ; 
            this.getData() ;  
       }) ; 
   },
  methods: {
    getData :function(){
      axios.get('/api/' + this.dataSrc + '/get-all?page=' + this.model.currentPage).then(response => {
             this.model.data = response.data.data.data ; 
              serverBus.$emit('loaded', false);
              serverBus.$emit('buildPaginator', response.data.data);
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    }, 
    updateData : function(row){
             serverBus.$emit('bindFormData', row);
    },
    removeData : function(id){
      
   if(confirm("Do you really want to delete?")){
      axios.delete('/api/' + this.dataSrc + '/delete/' + id).then(response => {
        
            this.getData() ;    
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    }
    }
  }
};
</script>
