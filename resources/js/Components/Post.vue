<template>
    <article class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="px-4 py-5 sm:p-6">
            <media-object>
                <template #media>
                    <inertia-link v-if="isLinked" :href="post.show_url">
                        <img class="rounded-md" :src="post.image" alt="" width="56" height="56" loading="lazy">
                    </inertia-link>
                    <div v-else>
                        <img class="rounded-md" :src="post.image" alt="" width="56" height="56" loading="lazy">
                    </div>
                </template>

                <template #content>
                    <inertia-link v-if="isLinked" :href="post.show_url">
                        <component class="mb-1 text-lg font-bold" :is="heading">{{ post.name }}</component>
                        <p>{{ post.body }}</p>
                    </inertia-link>
                    <div v-else>
                        <component class="mb-1 text-lg font-bold" :is="heading">{{ post.name }}</component>
                        <p>{{ post.body }}</p>
                    </div>
                </template>
            </media-object>
        </div>
        <div class="px-4 py-4 sm:px-6">
            <byline :post="post" />
        </div>
    </article>
</template>

<script>
    import Avatar from '@/Components/Avatar'
    import Byline from '@/Components/Byline'
    import MediaObject from '@/Components/MediaObject'

    export default {
        props: {
            heading: {
                type: String,
                default: 'h2',
            },
            isLinked: {
                type: Boolean,
                default: true,
            },
            post: {
                type: Object,
            },
        },

        components: {
            Avatar,
            Byline,
            MediaObject,
        },
    }
</script>
