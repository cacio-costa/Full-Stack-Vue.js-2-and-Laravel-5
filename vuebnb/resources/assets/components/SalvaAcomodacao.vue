<template>
    <div class="listing-save" @click.stop="toggleSalva()">
        <button v-if="button">
            <i :class="classes"></i> {{mensagem}}
        </button>
        <i v-else :class="classes"></i>
    </div>
</template>

<script>
export default {
    props: ['id', 'button'],
    methods: {
        toggleSalva() {
            this.$store.dispatch("toggleSaved", this.id);
        }
    },
    computed: {
        isAcomomodacaoSalva() {
            return this.$store.state.saved.find(id => id === this.id);
        },
        mensagem() {
            return this.isAcomomodacaoSalva ? 'Salva!' : 'Salvar'
        },
        classes() {
            let saved = this.isAcomomodacaoSalva;
            return {
                fa: true,
                "fa-lg": true,
                "fa-star": saved,
                "fa-star-o": !saved
            };
        }
    }
};
</script>

<style>
.listing-save {
    position: absolute;
    top: 20px;
    right: 20px;
    cursor: pointer;
}
.listing-save .fa-star-o,
.listing-save .fa-star {
    color: #ffff00;
}
</style>
