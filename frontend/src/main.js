import { createApp, markRaw } from 'vue'
import App from './App.vue'
import router from './router/index'
import { createPinia } from 'pinia'

import './style.css'
import { useAdminStore } from './stores/adminStore'

const app = createApp(App)

const pinia = createPinia()
pinia.use( ({ store }) => {
    store.router = markRaw(router)
})

app.use(pinia).use(router)

const adminStore = useAdminStore();
adminStore.checkTokenExpiryAndRefresh();

app.mount('#app')