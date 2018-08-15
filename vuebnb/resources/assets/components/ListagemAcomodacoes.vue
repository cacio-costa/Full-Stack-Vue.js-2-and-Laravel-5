<template>
    <div class="home-container">
        <div v-for="(group, pais) in acomodacoes">
            <h1>Lugares em {{pais}}</h1>
            <div class="listing-summaries">
                <listing-summary v-for="listing in group" :key="listing.id" :listing="listing"
                    class="listing-summary-group">
                </listing-summary>
            </div>
        </div>
    </div>
</template>

<script>
import { groupByCountry } from '../js/helpers';
import axios from 'axios';
import ListingSummary from "./ListingSummary";

export default {
    components: {
        ListingSummary
    },
    data() {
        return { acomodacoes: [] };
    },
    beforeRouteEnter(to, from, next) {
        if (to.path === window.dados_servidor.path) {
            let acomodacoes = groupByCountry(window.dados_servidor.acomodacoes);
            next(pagina => pagina.acomodacoes = acomodacoes);
        } else {
            axios.get('/api')
                .then(resposta => {
                    let acomodacoes = groupByCountry(resposta.data);
                    next(pagina => pagina.acomodacoes = acomodacoes);
                });
        }


    }
}
</script>

<style>
.home-container {
    margin: 0 auto;
    padding: 0 25px;
}
@media (min-width: 1131px) {
    .home-container {
        width: 1080px;
    }
}
.listing-summary-group {
    padding-bottom: 20px;
}
.listing-summaries {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    overflow: hidden;
}
.listing-summaries > .listing-summary {
    margin-right: 15px;
}
.listing-summaries > .listing-summary:last-child {
    margin-right: 0;
}
</style>
