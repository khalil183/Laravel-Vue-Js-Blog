import Axios from 'axios';
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store=new Vuex.Store({
    state:{
        categories:[],
        posts:[]
    },
    getters:{
       categories(state){
           return state.categories;
       },
       posts(state){
           return state.posts;
       }
    },
    actions:{
        getCategories(context){
            axios.get('/api/category')
                .then(response=>{
                    context.commit('storeCategories',response.data);
                })
                .catch(errors=>{
                    console.log(erros);

                })
        },
        getPosts(context){
            axios.get('/api/blog')
                .then(response=>{
                    context.commit('storePost',response.data);
                })
        },
        searchBlog(context,payload){
            axios.get('/search-blog?search='+payload)
                .then(response=>{
                    context.commit('storePost',response.data)
                })
                .catch(errors=>{
                    console.log(errors);

                })

        }

    },
    mutations:{
        storeCategories(state,payload){
            state.categories=payload;
        },
        storePost(store,payload){
            store.posts=payload;
        }
    }
})

export default store;
