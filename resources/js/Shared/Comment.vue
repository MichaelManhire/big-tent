<template>
    <article>
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
            <div class="px-4 py-5 sm:p-6">
                <media-object>
                    <template #media>
                        <avatar :src="comment.image" :name="comment.author.name" :href="route('users.show', comment.author)" />
                    </template>
                    <template #content>
                        <p>{{ comment.body }}</p>
                    </template>
                </media-object>
            </div>
            <div class="px-4 py-4 sm:px-6">
                <byline :post="comment" />
            </div>
        </div>

        <ol class="nested-comments ml-auto">
            <li class="mt-6" v-for="reply in comment.replies" :key="reply.id">
                <comment :comment="reply" />
            </li>
        </ol>
    </article>
</template>

<script>
    import Avatar from '@/Shared/Avatar'
    import Byline from '@/Shared/Byline'
    import MediaObject from '@/Shared/MediaObject'

    export default {
        props: {
            comment: {
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
