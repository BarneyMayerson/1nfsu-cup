import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { modal } from "momentum-modal";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import MainLayout from "@/Layouts/MainLayout.vue";
import { trail } from "momentum-trail";
import routes from "@/routes/routes.json";

function resolvePageComponent(name, pages) {
  for (const path in pages) {
    if (path.endsWith(`${name.replace(".", "/")}.vue`)) {
      return typeof pages[path] === "function" ? pages[path]() : pages[path];
    }
  }

  throw new Error(`Page not found: ${name}`);
}

const appName =
  window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => {
    const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
    let page = pages[`./Pages/${name}.vue`];
    page.default.layout = page.default.layout || MainLayout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(modal, {
        resolve: (name) =>
          resolvePageComponent(name, import.meta.glob("./Pages/**/*.vue")),
      })
      .use(Toast)
      .use(trail, { routes })
      .use(plugin)
      .mount(el);
  },
  progress: {
    color: "#0891b2",
    showSpinner: true,
  },
});
