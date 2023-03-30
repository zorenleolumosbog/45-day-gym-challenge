import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import VueGtag from "vue-gtag";
import axios from 'axios'

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(VueGtag, {
    config: { 
        id: axios.get(`${process.env.API_URL}/google-tracking-id`).then(response => {
            return response.data.data.value;
        })
    },
  }, router);

app.mount('#app')
