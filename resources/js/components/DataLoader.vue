<template>
    <div class="vld-parent">
   <loading :active.sync="isLoading"
    :loader="loaderType"></loading>
    </div>
</template>
 
<script>
    // Import component
    import Loading from 'vue-loading-overlay';
    import { serverBus } from '../app.js';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';

    export default {
        props :["loading"],
        data() {
            return {
                isLoading: true,
                fullPage: true , 
                server: null , 
                loaderType: "bars",
            }
        },
        components: {
            Loading
        }, 
        mounted: function() {
        serverBus.$on('loaded', (loaded) => {
                      this.isLoading = loaded ; 
                });
          }  
    }
</script> 