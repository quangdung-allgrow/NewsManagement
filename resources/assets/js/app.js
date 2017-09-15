
require('./bootstrap');

require('./helper');

Vue.component('paginate', require('vuejs-paginate'));

Vue.component('list-news', require('./components/web/ListNews.vue'));

const app = new Vue({
    el: '#app'
});
