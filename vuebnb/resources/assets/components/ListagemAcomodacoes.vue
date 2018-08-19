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
import ListingSummaryGroup from "./ListingSummaryGroup.vue";

export default {
    components: {
        ListingSummaryGroup
    },

    computed: {
        acomodacoes() {
            return groupByCountry(this.$store.state.resumoAcomodacoes);
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
