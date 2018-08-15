import Vue from "vue";
import VueRouter from "vue-router";
import ExibeAcomodacao from "../components/ExibeAcomodacao";
import ListagemAcomodacoes from "../components/ListagemAcomodacoes";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            component: ListagemAcomodacoes,
            name: "home"
        },
        {
            path: "/acomodacoes/:acomodacao",
            component: ExibeAcomodacao,
            name: "listing"
        }
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 };
    }
});
