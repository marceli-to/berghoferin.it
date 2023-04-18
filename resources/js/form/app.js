// app.js
import '@/global/bootstrap';

// Vue
import {createApp} from 'vue';
import App from './App.vue';

const app = createApp(App);

// Calendar
import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';


// Use plugin defaults (optional)
app.use(setupCalendar, {})

// Use the components
app.component('VCalendar', Calendar);
app.component('VDatePicker', DatePicker);

// Axios
import VueAxios from "vue-axios";
app.use(VueAxios, axios);

// Mount app
app.mount("#app-form");
