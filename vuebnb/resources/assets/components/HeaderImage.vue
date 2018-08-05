<template>
    <div class="header">
        <div class="header-img" :style="headerImageStyle" @click="$emit('header-clicked')">
            <button class="view-photos">Ver fotos</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['imageUrl'],
    computed: {
        headerImageStyle() {
            return {'background-image': `url(${this.imageUrl})`};
        }
    }
}
</script>

<style>
.header {
    height: 320px;
}

.header .header-img {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 50% 50%;
    background-color: #f5f5f5;
    height: 100%;
    cursor: pointer;
    position: relative;
}

.header .header-img .view-photos {
    position: absolute;
    bottom: 20px;
    left: 20px;
}
</style>
