<template>
    <component
        :is="element"
        :href="href"
        :type="type"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        <slot />
    </component>
</template>

<script>
    export default {
        props: {
            element: {
                type: String,
                default: 'button',
            },
            href: {
                type: String,
            },
            type: {
                type: String,
            },
        },
    }
</script>
