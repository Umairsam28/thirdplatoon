require("./bootstrap");
import Vue from "vue";
import Vue2Editor from "vue2-editor";
import CKEditor from '@ckeditor/ckeditor5-vue2';
import { InertiaApp } from "@inertiajs/inertia-vue";
import { InertiaForm } from "laravel-jetstream";
import PortalVue from "portal-vue";

Vue.mixin({ methods: { route } });
Vue.use( CKEditor );
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
const app = document.getElementById("app");

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(app);
