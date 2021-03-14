<template>
    <article class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="px-4 py-5 sm:p-6">
            <media-object>
                <template #media>
                    <inertia-link v-if="isLinked" :href="route('posts.show', post)">
                        <img class="rounded-md" :src="post.image" alt="" width="56" height="56" loading="lazy">
                    </inertia-link>
                    <div v-else>
                        <img class="rounded-md" :src="post.image" alt="" width="56" height="56" loading="lazy">
                    </div>
                </template>

                <template #content>
                    <inertia-link v-if="isLinked" :href="route('posts.show', post)">
                        <component :is="heading" class="mb-1 text-lg font-bold">{{ post.name }}</component>
                        <p>{{ post.body }}</p>
                    </inertia-link>
                    <div v-else>
                        <component :is="heading" class="mb-1 text-lg font-bold">{{ post.name }}</component>
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
    import Avatar from '@/Shared/Avatar'
    import Byline from '@/Shared/Byline'
    import MediaObject from '@/Shared/MediaObject'

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
