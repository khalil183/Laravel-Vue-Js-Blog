import moment from 'moment'
import Vue from 'vue'
Vue.filter('timeFormate',arg=>{
    return moment(arg).format("MMM Do YYYY");
})

Vue.filter('sortString',(data,length)=>{
    return data.substring(0,length)+'...';
})
