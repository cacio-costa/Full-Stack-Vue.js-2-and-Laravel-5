<template>
    <div>
        <header-image :id="acomodacao.id" v-if="acomodacao.images[0]" 
            :image-url="acomodacao.images[0]" @header-clicked="openModal"
        >
        </header-image>

        <div class="listing-container">
            <div class="heading">
                <h1>{{ acomodacao.title }}</h1>
                <p>{{ acomodacao.address }}</p>
            </div>

            <hr>
            <div class="about">
                <h3>About this listing</h3>
                <expandable-text>{{ acomodacao.about }}</expandable-text>
            </div>

            <div class="lists">
                <feature-list title="Amenities" :items="acomodacao.amenities">
                    <template slot-scope="amenity">
                        <i class="fa fa-lg" :class="amenity.icon"></i>
                        <span>{{ amenity.title }}</span>
                    </template>
                </feature-list>
                    
                <feature-list title="Prices" :items="acomodacao.prices">
                    <template slot-scope="price">
                        {{ price.title }}:
                        <strong>{{ price.value }}</strong>
                    </template>
                </feature-list>
            </div>
        </div>

        <modal-window ref="imagemodal">
            <image-carousel :images="acomodacao.images"></image-carousel>
        </modal-window>
    </div>
</template>

<script>
import "core-js/fn/object/assign";
import { populateAmenitiesAndPrices } from '../js/helpers'

import FeatureList from "./FeatureList";
import HeaderImage from "./HeaderImage";
import ModalWindow from './ModalWindow.vue';
import ImageCarousel from './ImageCarousel.vue';
import ExpandableText from './ExpandableText';

export default {
    components: {
        ImageCarousel, ModalWindow, HeaderImage, FeatureList, ExpandableText
    },

    computed: {
        acomodacao() {
            return populateAmenitiesAndPrices(
                this.$store.getters.getAcomodacao(this.$route.params.acomodacao)
            );
        }
    },

    methods: {
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
