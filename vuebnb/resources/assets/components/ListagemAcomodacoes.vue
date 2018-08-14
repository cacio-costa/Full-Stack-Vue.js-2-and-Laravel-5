<template>
    <div><h1>Listagem de acomodações</h1></div>
</template>

<script>
import {groupByCountry} from '../js/helpers';

let acomodacoes = groupByCountry(window.dados_servidor);

export default {
    data() {
        return {acomodacoes};
    }
}
</script>

<style>

</style>
