import './bootstrap';
import { createApp } from 'vue';
import ChatLayout from './components/ChatLayout.vue'

const app = createApp({});
app.component('chat-layout', ChatLayout)
app.mount('#app');
