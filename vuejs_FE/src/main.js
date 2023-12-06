import { createApp } from 'vue'
import { Button, message, Calendar, Popover,Modal,Form,Input,Slider,Carousel,Timeline } from 'ant-design-vue';
import router from './router/index.js'
import Swiper from 'swiper';
import axios from 'axios';

window.axios = axios;

// Sử dụng Swiper.js làm plugin toàn cục
window.Swiper = Swiper;
import App from './App.vue'
import 'swiper/swiper-bundle.css';
import 'ant-design-vue/dist/reset.css';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'

const app = createApp(App);
app.use(router)
app.use(Button)
app.use(Calendar)
app.use(Popover)
app.use(Modal)
app.use(Form)
app.use(Input)
app.use(Slider)
app.use(Carousel)
app.use(Timeline)
// app.use(Swiper)
app.mount('#app')
app.config.globalProperties.$message = message;