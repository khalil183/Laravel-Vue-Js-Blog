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
