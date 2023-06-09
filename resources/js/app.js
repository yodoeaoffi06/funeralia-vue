import './bootstrap';

import { createApp} from "vue";
import App from "../src/App.vue";
import Login from "../src/login/Index.vue";
import Home from "../src/Home/Index.vue";

createApp(App).mount("#app")
createApp(Login).mount("#login")
createApp(Home).mount("#home")