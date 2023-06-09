import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

// Axios
import axios from 'axios'
import VueAxios from 'vue-axios'

import Vue3Toastify, { toast } from 'vue3-toastify'

import 'vue3-toastify/dist/index.css'

const vuetify = createVuetify({
  components,
  directives
})

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(vuetify)
app.use(Vue3Toastify)
axios.defaults.baseURL = import.meta.env.VITE_BASE_URL
axios.interceptors.response.use(null, (error) => {
  toast.error(error?.response?.data?.message || error.message)
  return Promise.reject(error)
})
app.use(VueAxios, axios)

app.mount('#app')
