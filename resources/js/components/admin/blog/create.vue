<template>
      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-8">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Blog Form</h3>
                  <router-link class="btn btn-primary pull-right" to="/blog">All
                  Blogs</router-link>
                  <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form @submit.prevent="addPost">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input v-model="form.title" type="text" name="title" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                            <has-error :form="form" field="title"></has-error>
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select v-model="form.category_id" name="category_id" class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }">
                                <option value="">Select Category</option>
                                <option v-for="(category,i) in categories" :key="i" :value="category.id">{{ category.name }}</option>
                            </select>

                            <has-error :form="form" field="category_id"></has-error>
                        </div>

                        <div class="form-group">
                            <label for="">Details</label>
                            <textarea  id="" cols="30" rows="10" class="form-control" :class="{ 'is-invalid': form.errors.has('details') }" v-model="form.details"></textarea >
                            <has-error :form="form" field="details"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" @change="loadImage($event)" :class="{ 'is-invalid': form.errors.has('image') }">
                            <has-error :form="form" field="image"></has-error>
                            <img width="100px" :src="form.image" alt="">
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
                title:'',
                category_id:'',
                details:'',
                image:'',
            }),

        }
    },
    methods:{
         getCategories(){
            this.$store.dispatch('getCategories')
        },
        addPost(){


            this.form.post('api/blog',this.form)
                .then(response=>{
                    this.$router.push('/blog')
                    toastr.success(response.data.success)
                })
                .catch(errors=>{
                    console.log(errors);

                })


        },
        loadImage(event){
            let file=event.target.files[0];
            var reader = new FileReader();
            reader.onload = evt=>{
                this.form.image=evt.target.result
            }
            reader.readAsDataURL(file);
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

}
</script>

<style>

</style>
