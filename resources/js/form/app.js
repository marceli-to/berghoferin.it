// app.js
import '@/global/bootstrap';

// Vue
import {createApp} from 'vue';
import App from './App.vue';

const app = createApp(App);

// https://vue3datepicker.com/props/formatting/#month-name-format
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
app.component('VueDatePicker', VueDatePicker);

// Axios
import VueAxios from "vue-axios";
app.use(VueAxios, axios);

// Mount app
app.mount("#app-form");
