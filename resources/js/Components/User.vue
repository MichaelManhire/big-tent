<template>
    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400">
        <a class="flex-shrink-0" href="#">
            <img class="rounded-md" :src="user.image" alt="" width="56" height="56" loading="lazy">
        </a>
        <div class="flex-1 min-w-0">
            <a href="#">
                <p class="text-sm font-medium text-gray-900">
                    {{ user.name }}
                </p>
                <!--
                <p class="text-sm text-gray-500 truncate">
                    Something Something
                </p>
                -->
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                type: Object,
            },
        },
    }
</script>
