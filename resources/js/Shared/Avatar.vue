<template>
    <component :is="element" :href="href" :title="name">
        <figure class="inline-block relative">
            <rounded-image :src="src" :width="width" :height="height" />
            <figcaption class="sr-only">{{ name }}</figcaption>
            <online-indicator :online="online" />
        </figure>
    </component>
</template>

<script>
    import OnlineIndicator from '@/Shared/OnlineIndicator'
    import RoundedImage from '@/Shared/RoundedImage'

    export default {
        props: {
            element: {
                type: String,
                default: 'inertia-link',
            },
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
            online: {
                type: Boolean,
                default: false,
            },
            src: {
                type: String,
            },
            width: {
                type: Number,
                default: 56,
            },
        },

        components: {
            OnlineIndicator,
            RoundedImage,
        },
    }
</script>
