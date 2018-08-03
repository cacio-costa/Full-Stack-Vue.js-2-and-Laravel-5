import "core-js/fn/object/assign";
import Vue from 'vue';
import {populateAmenitiesAndPrices} from './helpers'
import ImageCarousel from '../components/ImageCarousel.vue';
import ModalWindow from '../components/ModalWindow.vue';

let acomodacao = populateAmenitiesAndPrices(window.acomodacao_server);
var app = new Vue({
    
    el: '#app',
    components: {
        ImageCarousel, ModalWindow
    },

    data: Object.assign(acomodacao, {
        headerImageStyle: {
            'background-image': `url(${acomodacao.images[0]})`
        },
        contracted: true
    })

});