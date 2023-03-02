
import { createApp } from 'vue';
import App from './js/App.vue';
import Graf from './js/Graf.vue';
import Dyma from './js/Dyma.vue';
import Home from './js/Home.vue';
createApp(App).mount('#vue-app');
createApp(Graf).mount('#vue-grafikart');
createApp(Dyma).mount('#vue-dyma');
createApp(Home).mount('#vue-home');