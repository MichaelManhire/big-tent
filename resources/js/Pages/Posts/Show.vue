<template>
    <div class="container">
        <section>
            <post :post="post" :is-featured="true" :is-linked="false" />
        </section>
        <section class="mt-6">
            <h2 class="text-2xl font-bold">Comments</h2>
            <ol class="mt-3" v-if="post.comments.length">
                <li :class="{ 'mt-6': index > 0 }" v-for="(comment, index) in post.comments" :key="comment.id">
                    <post :post="comment" :is-linked="false" />
                </li>
            </ol>
        </section>
    </div>
</template>

<script>
    import Post from '@/Components/Post'

    export default {
        props: {
            post: {
                type: Object,
            },
        },

        components: {
            Post,
        },
    }
</script>
