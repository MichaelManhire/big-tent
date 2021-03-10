<template>
    <div class="container">
        <section>
            <post :post="post" heading="h1" :is-linked="false" />
        </section>
        <section class="mt-6">
            <h2 class="text-lg font-bold">Comments</h2>
            <div v-if="post.comments.data.length" class="mt-2">
                <ol>
                    <li :class="{ 'mt-6': index > 0 }" v-for="(comment, index) in post.comments.data" :key="comment.id">
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
    import Comment from '@/Components/Comment'
    import Pagination from '@/Components/Pagination'
    import Post from '@/Components/Post'

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
