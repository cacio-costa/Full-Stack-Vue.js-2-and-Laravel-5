<template>
    <div id="saved" class="home-container">
        <h2>Acomodacoes salvas</h2>
        <div v-if="listings.length" class="listing-summaries">
            <listing-summary v-for="listing in listings" :listing="listing":key="listing.id">
            </listing-summary>
        </div>
        <div v-else>Nenhuma acomodação foi salva.</div>
    </div>    
</template>

<script>
import ListingSummary from "./ListingSummary.vue";

export default {
    computed: {
        listings() {
            return this.$store.getters.acomodacoesSalvas;
        }
    },
    components: {
        ListingSummary
    }
};
</script>

<style>
#saved .listing-summaries {
    display: flex;
    flex-wrap: wrap;
    justify-content: left;
    overflow: hidden;
}
#saved .listing-summaries .listing-summary {
    padding-bottom: 30px;
}
.listing-summaries > .listing-summary {
    margin-right: 15px;
}
</style>
