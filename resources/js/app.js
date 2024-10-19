//Import styles
import '../sass/app.scss';

// ------------------
// -- Axios setup --
// ------------------
import axios from 'axios';
window.axios = axios;

// ------------------*** ------------------
// ---------- Start Vue setup ----------
// ------------------*** ------------------
import { createApp } from 'vue';
import Buefy from 'buefy'
import { createPinia } from 'pinia';

//Create App vue
const app = createApp({
    data() {
        return {
        }
    }
});

// Buefy setup
app.use(Buefy, {
    defaultIconPack: 'fas',
});

//Pinia setup
const pinia = createPinia();
app.use(pinia);

//-------------------------------------
// App components
//-------------------------------------
import MainAppComponent from './components/MainAppComponent.vue';
app.component('main-app', MainAppComponent);

//Mount the app
app.mount('#app');
