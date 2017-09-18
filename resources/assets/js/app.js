
require('./bootstrap');	

import helper from './helper';

Vue.mixin(helper);

Vue.set(Vue.prototype, '_', _);

Vue.component('paginate', require('vuejs-paginate'));

Vue.component('list-news', require('./components/web/ListNews.vue'));

const app = new Vue({
    el: '#app'
});
