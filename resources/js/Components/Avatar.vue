<template>
    <a href="#">
        <img class="rounded-md" :src="src" alt="" :width="width" :height="height" loading="lazy">
        <span class="sr-only">{{ name }}</span>
    </a>
</template>

<script>
    export default {
        props: {
            height: {
                type: Number,
                default: 56,
            },
            name: {
                type: String,
            },
            src: {
                type: String,
            },
            width: {
                type: Number,
                default: 56,
            },
        },
    }
</script>
