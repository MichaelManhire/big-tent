<template>
    <ol>
        <li v-for="(post, index) in posts.data" :key="post.slug" :class="{ 'mt-6': index > 0 }">
            <post :post="post" :heading="heading" />
        </li>
    </ol>

    <pagination :pagination="posts" />
</template>

<script>
    import Pagination from '@/Shared/Pagination'
    import Post from '@/Shared/Post'

    export default {
        props: {
            heading: {
                type: String,
            },
            posts: {
                type: Object,
            },
        },

        components: {
            Pagination,
            Post,
        },
    }
</script>
