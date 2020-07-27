<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      model: {
        val: 0
      }
    };
  },
  methods: {
    setNewVal: function() {
      this.model.val++;
    }
  }
};
</script>
