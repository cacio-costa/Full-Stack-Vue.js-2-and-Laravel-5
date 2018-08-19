import axios from "axios";

import Vue from 'vue';
import Vuex from 'vuex';

import router from './router';

Vue.use(Vuex);

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': window.csrf_token
};

export default new Vuex.Store({

    state: {
        auth: false,
        saved: [],
        acomodacoes: [],
        resumoAcomodacoes: []
    },

    mutations: {
        toggleSaved(state, id) {
            let indice = state.saved.findIndex(idSalvo => idSalvo === id);
            if (indice === -1) {
                state.saved.push(id);
            } else {
                state.saved.splice(indice, 1);
            }
        },

        setDados(state, {route, data}) {
            if (data.auth) {
                state.auth = data.auth;
            }

            console.log('dados', data);
            if (route === 'listing') {
                state.acomodacoes.push(data.acomodacao);
            } else {
                state.resumoAcomodacoes = data.acomodacoes;
            }
        }
    },

    getters: {
        acomodacoesSalvas(state) {
            return state.resumoAcomodacoes.filter(acomodacao => state.saved.indexOf(acomodacao.id) > -1);
        },
        getAcomodacao(state) {
            return id => state.acomodacoes.find(acomodacao => acomodacao.id == id);
        }
    },

    actions: {
        toggleSaved(context, id) {
            if (context.state.auth) {
                axios.post('/api/user/toggle_saved', {'id': id})
                    .then(() => {
                        context.commit('toggleSaved', id);
                    });
            } else {
                router.push("/login");
            }
        }
    }

});