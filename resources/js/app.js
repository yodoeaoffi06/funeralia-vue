import './bootstrap';

import { createApp} from "vue";
import App from "../src/App.vue";

import Login from "../src/login/Index.vue";

createApp(App).mount("#app")

createApp(Login).mount("#login")