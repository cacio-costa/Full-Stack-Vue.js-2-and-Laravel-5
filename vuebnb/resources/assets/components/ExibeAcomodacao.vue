<template>
    <div>
        <header-image v-if="images[0]" :image-url="images[0]" @header-clicked="openModal"></header-image>

        <div class="listing-container">
            <div class="heading">
                <h1>{{ title }}</h1>
                <p>{{ address }}</p>
            </div>

            <hr>
            <div class="about">
                <h3>About this listing</h3>
                <expandable-text>{{ about }}</expandable-text>
            </div>

            <div class="lists">
                <feature-list title="Amenities" :items="amenities">
                    <template slot-scope="amenity">
                        <i class="fa fa-lg" :class="amenity.icon"></i>
                        <span>{{ amenity.title }}</span>
                    </template>
                </feature-list>
                    
                <feature-list title="Prices" :items="prices">
                    <template slot-scope="price">
                        {{ price.title }}:
                        <strong>{{ price.value }}</strong>
                    </template>
                </feature-list>
            </div>
        </div>

        <modal-window ref="imagemodal">
            <image-carousel :images="images"></image-carousel>
        </modal-window>
    </div>
</template>

<script>
import "core-js/fn/object/assign";
import { populateAmenitiesAndPrices } from '../js/helpers'

import ImageCarousel from './ImageCarousel.vue';
import ModalWindow from './ModalWindow.vue';
import HeaderImage from "./HeaderImage";
import FeatureList from "./FeatureList";
import ExpandableText from './ExpandableText';

import RouteMixin from './mixins/route-mixin';

export default {
    mixins: [RouteMixin],

    components: {
        ImageCarousel, ModalWindow, HeaderImage, FeatureList, ExpandableText
    },

    data() {
        return {
            title: null,
            about: null,
            address: null,
            amenities: [],
            prices: [],
            images: []
        }
    },

    methods: {
        setDados(dados) {
            Object.assign(this.$data, populateAmenitiesAndPrices(dados.acomodacao));
        },

        openModal() {
            this.$refs.imagemodal.modalOpen = true;
        }
    }
};
</script>

<style>
.about {
    margin-top: 2em;
}

.about h3 {
    font-size: 22px;
}
</style>
