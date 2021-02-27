<template>
    <article class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="px-4 py-5 sm:p-6">
            <media-object>
                <template #media>
                    <avatar :src="post.image" :name="post.author" />
                </template>

                <template #content>
                    <inertia-link v-if="isLinked" :href="post.show_url">
                        <component class="mb-1 text-lg font-bold" :is="heading">{{ post.title }}</component>
                        <p>{{ post.body }}</p>
                    </inertia-link>
                    <div v-else>
                        <component class="mb-1 text-lg font-bold" :is="heading">{{ post.title }}</component>
                        <p>{{ post.body }}</p>
                    </div>
                </template>
            </media-object>
        </div>
        <div class="px-4 py-4 sm:px-6">
            <post-byline :post="post" />
        </div>
    </article>
</template>

<script>
    import Avatar from '@/Components/Avatar'
    import MediaObject from '@/Components/MediaObject'
    import PostByline from '@/Components/PostByline'

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
            MediaObject,
            PostByline,
        },
    }
</script>
