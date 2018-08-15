import axios from 'axios';

function recuperaDados(rota) {
    return new Promise((resolve) => {
        if (rota.path !== window.dados_servidor.path) {
            axios.get(`/api${rota.path}`)
                .then(resposta => resolve(resposta.data));
        } else {
            resolve(window.dados_servidor);
        }
    });
};

export default {
    beforeRouteEnter(to, from, next) {
        recuperaDados(to).then(dados => {
            next(pagina => pagina.setDados(dados));
        });
    }
};