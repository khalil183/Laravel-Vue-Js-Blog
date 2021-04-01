<template>
      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Post Table</h3>
                  <router-link class="btn btn-primary pull-right" to="/blog-create">Create Post</router-link>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(post,i) in posts" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ post.title | sortString(30) }}</td>
                        <td>{{ post.category.name }}</td>
                        <td><img style="width:100px" :src="post.image" alt=""></td>
                        <td>
                            <router-link :to="`/blog-edit/${post.id}`" class="btn btn-success">Edit</router-link>
                            <button class="btn btn-danger btn-sm" @click="deletePost(post.id)">Delete</button>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
</template>

<script>
export default {

    data(){
        return {

        }
    },
    mounted(){
        this.getPosts()
    },
    computed:{
        categories(){
            return this.$store.getters.categories;
        },
        posts(){
            return this.$store.getters.posts;
        }
    },
    methods:{
        getPosts(){
            this.$store.dispatch('getPosts')
        },
        deletePost(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                     axios.delete('/api/blog/'+id)
                        .then(response=>{
                             Swal.fire(
                                'Deleted!',
                                response.data.success,
                                'success'
                            )
                            this.getPosts();
                        })
                        .catch(errors=>{
                            console.log(errors);

                        })

                }
            })


        }
    }
}
</script>

<style>

</style>
