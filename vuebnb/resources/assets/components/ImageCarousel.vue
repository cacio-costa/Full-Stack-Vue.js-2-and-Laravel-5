<template>
    <div class="image-carousel">
        <img :src="image">
        <div class="controls">
            <carousel-control dir="left" @muda="muda"></carousel-control>
            <carousel-control dir="right" @muda="muda"></carousel-control>
        </div>
    </div>
</template>

<script>
import CarouselControl from './CarouselControl.vue';

export default {
    props: ['images'],
    components: {
        CarouselControl
    },

    data() {
        return {
            index: 0
        }
    },

    methods: {
        muda(deslocamento) {
            this.index += deslocamento;
            if (this.index < 0) {
                this.index = this.images.length - 1;
            } else if (this.index >= this.images.length) {
                this.index = 0;
            }
        }
    },

    computed: {
        image() {
            return this.images[this.index];
        }
    }
}
</script>

<style>
.image-carousel {
    height: 100%;
    margin-top: -12vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-carousel img {
    max-width: 100%;
}

.image-carousel .controls {
    position: absolute;
    width: 100%;
    display: flex;
    justify-content: space-between;
}
</style>
