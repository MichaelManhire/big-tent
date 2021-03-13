<template>
    <div class="container">
        <section>
            <post :post="post" heading="h1" :is-linked="false" />
        </section>
        <section class="mt-6">
            <h2 class="text-lg font-bold">Comments</h2>
            <div v-if="post.comments.from" class="mt-2">
                <ol>
                    <li v-for="(comment, index) in post.comments.data" :key="comment.id" :class="{ 'mt-6': index > 0 }">
                        <comment :comment="comment" />
                    </li>
                </ol>

                <pagination :pagination="post.comments" />
            </div>
            <p v-else class="mt-2">This post doesn't have any comments on it.</p>
        </section>
    </div>
</template>

<script>
    import Comment from '@/Shared/Comment'
    import Pagination from '@/Shared/Pagination'
    import Post from '@/Shared/Post'

    export default {
        props: {
            post: {
                type: Object,
            },
        },

        components: {
            Comment,
            Pagination,
            Post,
        },
    }
</script>
