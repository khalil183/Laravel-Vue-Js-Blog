import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Home from '../components/Home'
// category component
import Category from '../components/admin/category/index'
import createCategory from '../components/admin/category/create'
import editCategory from '../components/admin/category/edit'

// category component
import Post from '../components/admin/blog/index'
import createPost from '../components/admin/blog/create'
import editPost from '../components/admin/blog/edit'


// frontend route
import Root from '../components/frontend/index';
import Show from '../components/frontend/show';
import categoryByPost from '../components/frontend/categoryByPost';


const routes=[
    { path:'/home',component:Home },

    // category route
    { path:'/category',component:Category },
    { path:'/category-create',component: createCategory },
    { path:'/category-edit/:id',component: editCategory },

    // post route
    { path:'/blog',component:Post },
    { path:'/blog-create',component: createPost },
    { path:'/blog-edit/:id',component: editPost },

    // frontend route
    {path:'/',component:Root},
    {path:'/post-show/:slug',component:Show},
    {path:'/category-post/:id',component:categoryByPost},

    // any route
    { path:"*",component:Home }
]

export default new VueRouter({
    routes,
    mode:'history'
})
