<template>
    <div class="listing-summary-group">
        <h1>Lugares em {{pais}}</h1>
        <div class="listing-carousel">
            <div class="controls">
                <carousel-control dir="left" @muda="change"></carousel-control>
                <carousel-control dir="right" @muda="change"></carousel-control>
            </div>
        </div>
        <div class="listing-summaries-wrapper">
            <div class="listing-summaries" :style="style">
                <listing-summary v-for="acomodacao in acomodacoes" 
                    :key="acomodacao.id" 
                    :listing="acomodacao"
                >
                </listing-summary>
            </div>
        </div>
    </div>
</template>

<script>
import ListingSummary from './ListingSummary.vue';
import CarouselControl from './CarouselControl.vue';
import $ from 'jquery';

const rowSize = 3;
const listingSummaryWidth = 365;
const widthPadrao = 1080;

export default {
    props: ['pais', 'acomodacoes'],
    components: {
        ListingSummary, CarouselControl
    },

    data() {
        return {offset: 0};
    },

    methods: {
        change(val) {
            let newVal = this.offset + parseInt(val);
            if (newVal >= 0 && newVal <= this.acomodacoes.length - rowSize) {
                this.offset = newVal;
            }

            console.log(this.offset);
        }
    },

    computed: {
        style() {
            return {
                transform: `translateX(${this.offset * -listingSummaryWidth}px)`,
                width: `${(this.offset * listingSummaryWidth) + widthPadrao}px`
            }
        }
    }
}
</script>

<style>
.listing-summary-group {
    padding-bottom: 20px;
}
.listing-summaries {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    transition: transform 0.5s;
}
.listing-summaries > .listing-summary {
    margin-right: 15px;
}
.listing-summaries > .listing-summary:last-child {
    margin-right: 0;
}
.listing-carousel {
    position: relative;
}
.listing-carousel .controls {
    display: flex;
    justify-content: space-between;
    position: absolute;
    top: calc(50% - 45px);
    left: -45px;
    width: calc(100% + 90px);
}
.listing-carousel .controls .carousel-control {
    color: #c5c5c5;
    font-size: 1.5rem;
    cursor: pointer;
}
.listing-summaries-wrapper {
    overflow: hidden;
}
</style>
