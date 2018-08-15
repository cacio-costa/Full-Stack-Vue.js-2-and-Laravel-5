<template>
    <div class="home-container">
        <listing-summary-group
            v-for="(group, country) in acomodacoes" 
            :key="country" 
            :acomodacoes="group" 
            :pais="country"
            class="listing-summary-group">
        </listing-summary-group>
    </div>
</template>

<script>
import { groupByCountry } from '../js/helpers';

import RouteMixin from './mixins/route-mixin';
import ListingSummaryGroup from "./ListingSummaryGroup.vue";

export default {
    mixins: [RouteMixin],

    components: {
        ListingSummaryGroup
    },

    data() {
        return {
            acomodacoes: []
        };
    },

    methods: {
        setDados(dados) {
            this.acomodacoes = groupByCountry(dados.acomodacoes);
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
