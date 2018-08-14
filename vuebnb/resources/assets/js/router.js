import Vue from 'vue';
import VueRouter from 'vue-router';
import ExibeAcomodacao from '../components/ExibeAcomodacao';
import ListagemAcomodacoes from '../components/ListagemAcomodacoes';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/', component: ListagemAcomodacoes, name: 'listagem'
        },
        {
            path: '/acomodacoes/:acomodacao', component: ExibeAcomodacao, name: 'acomodacao'
        }
    ]
});