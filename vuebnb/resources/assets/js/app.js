import "core-js/fn/object/assign";
import Vue from 'vue';
import {populateAmenitiesAndPrices} from './helpers'

let acomodacao = populateAmenitiesAndPrices(window.acomodacao_server);
console.log('acomodacao', acomodacao);

var app = new Vue({
    el: '#app',
    data: Object.assign(acomodacao, {
        headerImageStyle: {
            'background-image': `url(${acomodacao.images[0]})`
        },
        contracted: true,
        modalOpen: false
    }),

    methods: {
        escapeKeyListener(evt) {
            if (evt.keyCode === 27 && app.modalOpen) {
                app.modalOpen = false;
            }
        }
    },

    watch: {
        modalOpen: function () {
            var className = 'modal-open';
            if (this.modalOpen) {
                document.body.classList.add(className);
            } else {
                document.body.classList.remove(className);
            }
        }
    },

    created: function () {
        document.addEventListener('keyup', this.escapeKeyListener);
    },
    
    destroyed: function () {
        document.removeEventListener('keyup', this.escapeKeyListener);
    }
});