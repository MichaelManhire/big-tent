<template>
    <inertia-link :href="href">
        <img class="rounded-md" :src="src" alt="" :width="width" :height="height" loading="lazy">
        <span class="sr-only">{{ name }}</span>
    </inertia-link>
</template>

<script>
    export default {
        props: {
            height: {
                type: Number,
                default: 56,
            },
            href: {
                type: String,
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
