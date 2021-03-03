<template>
    <ol>
        <li :class="{ 'mt-6': index > 0 }" v-for="(post, index) in posts.data" :key="post.id">
            <post :post="post" :heading="heading" />
        </li>
    </ol>

    <pagination :links="posts.links" :nextPageUrl="posts.next_page_url" :prevPageUrl="posts.prev_page_url" />
</template>

<script>
    import Pagination from '@/Components/Pagination'
    import Post from '@/Components/Post'

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
