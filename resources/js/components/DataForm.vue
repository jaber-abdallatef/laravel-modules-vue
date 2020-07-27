<template>
  <div>
    <p>
      <button
        class="btn btn-primary"
        type="button"
        data-toggle="collapse"
        data-target="#dataForm"
        aria-expanded="false"
        aria-controls="dataForm"
      >Create New</button>
    </p>
    <div class="collapse" id="dataForm">
      <div class="card card-body">
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" v-model="model.title" id="title" placeholder="Title" />
          </div>
          <div class="form-group">
            <label for="Body">Body</label>
            <textarea class="form-control" v-model="model.body" id="Body" placeholder="Body"></textarea>
          </div>
          <div class="form-group d-flex align-content-around align-items-start">
         
              <label  for="status">status:</label>
                <select  v-model="model.status" class="form-control col-md-4" id="status">
                 <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              
          </div>
          <div class="form-group">
            <button  v-if="mode  === 'create'" type="button" v-on:click="createNew" class="btn btn-primary align-self-end">Create</button>
            <button  v-if="mode  === 'update'" type="button" v-on:click="updateData" class="btn btn-primary align-self-end">Update</button>
         
          </div>
        
          
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import { serverBus } from '../app.js';


export default {
   props: ['viewId'],
  data() {
    return {
      model: {
        title:"", 
        body:"",
        status:""
      }, 
      mode : 'create',
      errors: "", 
      success:false
    };
  },
  created(){
       serverBus.$on('bindFormData', (data) => {
              this.mode  = 'update' ; 
              this.getFormData(data)  ; 
        }); 
   },
  methods: {
    createNew : function(){
            this.mode  = 'create'  ; 
            this.store() ; 
    } , 
    updateData : function () {
        this.mode  = 'update'  ; 
        this.store() ;     
    },
    store: function() {
           serverBus.$emit('loaded', true);
           var action = (this.mode  === 'upadte')?'update':'store' ; 
           axios.post('/api/' + this.viewId + '/' + action, this.model).then(response => {
           $('#dataForm').collapse('toggle');
           serverBus.$emit('refreshData', true);
           this.clearForm() ; 
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    }, 
    clearForm : function(){
        
    } ,
    getFormData : function (data){
         this.model = data ; 
      $('#dataForm').collapse('toggle');
    }
  }, 
};
</script>
