<template>
    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400">
        <div class="flex-shrink-0">
            <avatar :src="user.image" :name="user.name" :href="route('users.show', user)" :online="user.online" />
        </div>
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
    import Avatar from '@/Shared/Avatar'

    export default {
        props: {
            user: {
                type: Object,
            },
        },

        components: {
            Avatar,
        },
    }
</script>
