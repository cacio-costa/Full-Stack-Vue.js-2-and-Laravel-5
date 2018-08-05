import Vue from 'vue';
import ListagemAcomodacoes from "../components/ListagemAcomodacoes";

var app = new Vue({
    
    el: '#app',
    render: h => h(ListagemAcomodacoes)

});