import './bootstrap';
import {createApp} from "vue";
import router from "@/router/router.js";
import store from "@/store/store.js";
import IndexComponent from "@/components/IndexComponent.vue";

const app = createApp(IndexComponent)

app.use(router)
    .use(store)
    .mount('#app')
