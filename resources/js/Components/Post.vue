<template>
    <article class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
        <div class="px-4 py-5 sm:p-6">
            <media-object>
                <template #media>
                    <avatar :src="post.image" />
                </template>

                <template #content>
                    <div v-if="isFeatured">
                        <inertia-link :href="post.show_url" v-if="isLinked">
                            <!-- Featured, Linked -->
                            <h1 class="mb-1 text-lg font-bold" v-if="post.group">{{ post.group }}</h1>
                            <h1 class="sr-only" v-else>Post by {{ post.author }}</h1>
                            <p class="text-lg">{{ post.body }}</p>
                        </inertia-link>
                        <div v-else>
                            <!-- Featured, Unlinked (Single Post) -->
                            <h1 class="mb-1 text-lg font-bold" v-if="post.group">{{ post.group }}</h1>
                            <h1 class="sr-only" v-else>Post by {{ post.author }}</h1>
                            <p class="text-lg">{{ post.body }}</p>
                        </div>
                    </div>
                    <div v-else>
                        <inertia-link :href="post.show_url" v-if="isLinked">
                            <!-- Normal, Linked (Post Listing) -->
                            <h2 class="mb-1 text-lg font-bold" v-if="post.group">{{ post.group }}</h2>
                            <h2 class="sr-only" v-else>Post by {{ post.author }}</h2>
                            <p>{{ post.body }}</p>
                        </inertia-link>
                        <div v-else>
                            <!-- Normal, Unlinked (Comment) -->
                            <h3 class="mb-1 text-lg font-bold" v-if="post.group">{{ post.group }}</h3>
                            <h3 class="sr-only" v-else>Post by {{ post.author }}</h3>
                            <p :class="{ 'text-lg': isFeatured }">{{ post.body }}</p>
                        </div>
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
            isFeatured: {
                type: Boolean,
                default: false,
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
