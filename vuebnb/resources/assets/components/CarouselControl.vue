<template>
    <i :class="classes" @click="clicou"></i>
</template>

<script>
export default {
    props: ["dir"],
    computed: {
        classes() {
            return `carousel-control fa fa-2x fa-chevron-${this.dir}`;
        }
    },

    methods: {
        clicou() {
            let deslocamento = this.dir === "left" ? -1 : 1;
            this.$emit("muda", deslocamento);
        }
    }
};
</script>

<style>
.carousel-control {
    padding: 1rem;
    color: rgba(30, 30, 30, 0.7);
    opacity: 0.85
}

@media (min-width: 744px) {
    .carousel-control {
        font-size: 3rem;
    }
}
</style>
