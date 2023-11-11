import "./bootstrap";
import { createApp } from "vue";
import App from "./App.vue";
import PrimeVue from 'primevue/config';
import '../css/app.css'

const app = createApp(App);
app.mount("#app");
app.use(PrimeVue);
