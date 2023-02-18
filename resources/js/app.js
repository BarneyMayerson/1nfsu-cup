import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler";

import Hello from "./components/Hello.vue";

createApp({
  components: {
    Hello,
  },
}).mount("#app");
