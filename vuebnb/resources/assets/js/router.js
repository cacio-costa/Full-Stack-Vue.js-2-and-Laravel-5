import axios from "axios";

import Vue from "vue";
import VueRouter from "vue-router";
import LoginPage from '../components/LoginPage';
import ExibeAcomodacao from "../components/ExibeAcomodacao";
import ListagemAcomodacoes from "../components/ListagemAcomodacoes";
import ListaAcomodacoesSalvas from "../components/ListaAcomodacoesSalvas";

import store from "./store";

Vue.use(VueRouter);

let router = new VueRouter({
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
        },
        {
            path: "/acomodacoes-salvas",
            component: ListaAcomodacoesSalvas,
            name: "saved"
        },
        {
            path: "/login", 
            component: LoginPage, 
            name: "login" 
        }
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 };
    }
});

router.beforeEach((to, from, next) => {
    let dadosServidor = window.dados_servidor;

    if (
        to.name === "listing"
            ? store.getters.getAcomodacao(to.params.acomodacao)
            : store.state.resumoAcomodacoes.length > 0
     || to.name === 'login'
    ) {
        next();
    } else if (to.path !== window.dados_servidor.path) {
        axios.get(`/api${to.path}`).then(resposta => {
            store.commit("setDados", { route: to.name, data: resposta.data });
            next();
        });
    } else {
        store.commit("setDados", {
            route: to.name,
            data: window.dados_servidor
        });

        window.dados_servidor.saved.forEach(id => store.commit('toggleSaved', id));
        next();
    }
});

export default router;
