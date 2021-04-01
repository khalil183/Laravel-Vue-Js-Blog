<template>
    <div>
         <h1 class="my-4">
        </h1>
        <!-- Blog Post -->
        <div class="card mb-4" v-for="(post,i) in posts" :key="i" >
          <img class="card-img-top" :src="post.image" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title" >{{ post.title }}</h2>
            <p class="card-text">{{ post.details | sortString(100)}}</p>
            <router-link :to="`/post-show/${post.slug}`" class="btn btn-primary">Read More &rarr;</router-link>

            <h2 class="card-title">{{ post.category.name }}</h2>
          </div>
          <div class="card-footer text-muted">
            Posted on {{  post.created_at | timeFormate}} by
            <a href="#">Super Admin</a>
          </div>
        </div>
    </div>
</template>

<script>
import Category from './category.vue'
import Search from './search'
export default {
    components:{
        Search,
        Category
    },
    mounted(){
        this.getPosts()
    },
    methods:{
        getPosts(){
            this.$store.dispatch('getPosts')
        }
    },
    computed:{
        posts(){
            return this.$store.getters.posts;
        }
    }
}
</script>

<style>

</style>
