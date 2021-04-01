<template>
   <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                  <router-link :to="`/category-post/${category.id}`" class="badge badge-success ml-3"  v-for="(category,i) in categories" :key="i">{{ category.name }}</router-link>

              </div>

              </div>
            </div>
          </div>
</template>

<script>
export default {
    mounted(){
        this.getCategories();
    },
    methods:{
        getCategories(){
            this.$store.dispatch('getCategories')
        }
    },
    computed:{
        categories(){
            return this.$store.getters.categories
        }
    }

}
</script>

<style>

</style>
