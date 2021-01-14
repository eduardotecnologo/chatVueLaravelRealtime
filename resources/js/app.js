require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'chat',
    require('./components/chat/Chat').default);

Vue.component(
    'users',
    require('./components/chat/Users').default);

const app = new Vue({
    el: '#app',
});
