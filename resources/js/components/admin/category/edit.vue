<template>
      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Category Update Form</h3>
                  <router-link class="btn btn-primary pull-right" to="/category">All
                  Category</router-link>
                  <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form @submit.prevent="updateCategory">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input v-model="form.name" type="text" name="category" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <button class="btn btn-success">Submit</button>
                    </form>
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
            form:new Form({
                name:''
            })
        }
    },
    methods:{
        updateCategory(){
            this.form.put('/api/category/'+this.$route.params.id,this.form)
                .then(response=>{
                    this.$router.push('/category')
                    toastr.success(response.data.success)
                })
                .catch(errors=>{
                    console.log(errors);

                })


        },
        category(){
            axios.get('/api/category/'+this.$route.params.id)
                .then(response=>{
                    this.form.fill(response.data)

                })
                .catch(errors=>{
                    console.log(errors);

                })
        }
    },
    mounted(){
        this.category()
    }

}
</script>

<style>

</style>
