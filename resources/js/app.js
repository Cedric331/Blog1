require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import { InertiaProgress } from '@inertiajs/progress'

window.Vue = require('vue');

Vue.component('example', require('./components/Example.vue').default);



const app = new Vue({
   el: '#app',
});

InertiaProgress.init();
Vue.use(plugin);


const el = document.getElementById('app')

new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)
