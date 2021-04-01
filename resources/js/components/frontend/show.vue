<template>
 <div>
     <!-- Title -->
        <h1 class="mt-4">{{ blog.title }}</h1>

        <!-- Author -->
        <p class="lead">
         Category
          <a href="#">{{ blog.category.name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{ blog.created_at | timeFormate }}</p>

        <hr>

        <!-- Preview Image -->
        <img width="600px" class="img-fluid rounded" :src="`http://127.0.0.1:8000/${blog.image}`" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{ blog.details }}</p>


        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
 </div>
</template>

<script>
import Category from './category.vue'
export default {
    data(){
        return{
            blog:''
        }
    },
 components:{
        Category
    },
    mounted(){
        this.post();
    },
    methods:{
        post(){
            axios.get('/api/user/post/'+this.$route.params.slug)
                .then(response=>{
                    this.blog=response.data;
                })
                .catch(errors=>{
                    console.log(errors);

                })

        }
    }
}
</script>

<style>

</style>
