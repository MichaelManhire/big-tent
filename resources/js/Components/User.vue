<template>
    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400">
        <inertia-link :href="route('users.show', user)" class="flex-shrink-0">
            <img class="rounded-md" :src="user.image" alt="" width="56" height="56" loading="lazy">
        </inertia-link>
        <div class="flex-1 min-w-0">
            <inertia-link :href="route('users.show', user)">
                <p class="text-sm font-medium text-gray-900">
                    {{ user.name }}
                </p>
            </inertia-link>
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
