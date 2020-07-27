<template>
  <div>
    <p>
      <button
        class="btn btn-primary"
        type="button"
        data-toggle="collapse"
        data-target="#createForm"
        aria-expanded="false"
        aria-controls="createForm"
      >Create New Blog</button>
    </p>
    <div class="collapse" id="createForm">
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
          <div class="form-group">
            <div class="row">
            <div class="col-md-4 dropdown ">
              <button
                class="btn btn-secondary dropdown-toggle"
                type="button"
                id="Status"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >Status</button>
              <div class="dropdown-menu" aria-labelledby="Status">
                <a class="dropdown-item" href="#">Active</a>
                <a class="dropdown-item" href="#">Inactive</a>
              </div>
            </div>
            <div class="col-md-4 align-self-end">
            <button type="button" v-on:click="createNew" class="btn btn-primary">Create</button>
            </div>
          </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      model: {
        title:"", 
        body:"",
        active:""
      }, 
      errors: "", 
      success:false
    };
  },
  methods: {
    createNew: function() {
          console.log(this.model)  ; 
           axios.post('store', this.model).then(response => {
        alert('Message sent!');
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    }
  }
};
</script>
