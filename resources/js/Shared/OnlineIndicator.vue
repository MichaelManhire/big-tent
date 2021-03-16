<template>
    <span
        :class="online ? 'bg-green-400' : 'bg-gray-300'"
        :title="online ? 'Online' : 'Offline'"
        :aria-label="online ? 'Online' : 'Offline'"
        class="absolute top-0 right-0 block h-3.5 w-3.5 transform -translate-y-1/2 translate-x-1/2 rounded-full ring-2 ring-white"
    ></span>
</template>

<script>
    export default {
        props: {
            online: {
                type: Boolean,
                default: false,
            },
        },
    }
</script>
