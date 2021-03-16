<template>
    <article class="flex shadow-sm rounded-md border border-gray-200">
        <div class="flex-shrink-0 flex items-center justify-center w-24 bg-white rounded-l-md">
            <img :src="topic.image" class="rounded-l-md" alt="" width="96" height="96" loading="lazy">
        </div>
        <div class="flex-1 flex justify-between bg-white rounded-r-md">
            <div class="flex-1 px-4 py-2 text-sm">
                <inertia-link :href="route('topics.show', topic)" class="text-gray-900 font-medium hover:text-gray-600">
                    {{ topic.name }}
                </inertia-link>
                <p class="mt-1 text-gray-500">{{ topic.members_count }} {{ members }}</p>
            </div>
            <div class="flex-shrink-0 self-center pr-2">
                <button class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">I'm Interested</span>
                    <plus-icon />
                </button>
            </div>
        </div>
    </article>
</template>

<script>
    import PlusIcon from '@/Shared/Icons/Plus'

    export default {
        props: {
            topic: {
                type: Object,
            },
        },

        computed: {
            members() {
                return `${this.topic.members_count === 1 ? 'member' : 'members'}`
            },
        },

        components: {
            PlusIcon,
        },
    }
</script>
