
require('./bootstrap');

//imports libs
import Notifications from 'vue-notification'
import VModal from 'vue-js-modal'
import Vue2Editor from "vue2-editor";

//require vue
window.Vue = require('vue');

//libs
Vue.use(Notifications);
Vue.use(VModal);
Vue.use(Vue2Editor);

//comonents
Vue.component('repositories-component', require('./components/RepositoriesComponent.vue').default);
Vue.component('projects-component', require('./components/ProjectsComponent.vue').default);
Vue.component('single-project-component', require('./components/SingleProjectComponent.vue').default);
Vue.component('project-config-component', require('./components/ProjectConfigComponent.vue').default);

//vue init - the vue instance
const app = new Vue({
    el: '#app',
});
