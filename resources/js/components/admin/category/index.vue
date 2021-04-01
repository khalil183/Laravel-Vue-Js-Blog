<template>
      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Category Table</h3>
                  <router-link class="btn btn-primary pull-right" to="/category-create">Create Category</router-link>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(category,i) in categories" :key="i">
                        <td>{{ ++i }}</td>
                        <td>{{ category.name }}</td>
                        <td>{{ category.slug }}</td>
                        <td>{{ category.created_at | timeFormate }}</td>
                        <td>
                            <router-link :to="`/category-edit/${category.id}`" class="btn btn-success">Edit</router-link>
                            <button class="btn btn-danger btn-sm" @click="deleteCategory(category.id)">Delete</button>
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
        this.getCategories()
    },
    computed:{
        categories(){
            return this.$store.getters.categories;
        }
    },
    methods:{
        getCategories(){
            this.$store.dispatch('getCategories')
        },
        deleteCategory(id){
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
                     axios.delete('/api/category/'+id)
                        .then(response=>{
                             Swal.fire(
                                'Deleted!',
                                response.data.success,
                                'success'
                            )
                            this.getCategories();
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
