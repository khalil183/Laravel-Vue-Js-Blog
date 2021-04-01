<template>
  <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" @keyup="searchBlog"  v-model="search" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" @click="searchBlog" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
</template>

<script>
import _ from 'lodash'
export default {
    data(){
        return{
            search:''
        }
    },
    methods:{
        searchBlog:_.debounce(function(){
            this.$store.dispatch('searchBlog',this.search);
        },2000)
    }
}
</script>

<style>

</style>
