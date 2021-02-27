<template>
    <ol>
        <li :class="{ 'mt-6': index > 0 }" v-for="(post, index) in posts" :key="post.id">
            <post :post="post" :heading="heading" />
        </li>
    </ol>
</template>

<script>
    import Post from '@/Components/Post'

    export default {
        props: {
            heading: {
                type: String,
            },
            posts: {
                type: Array,
            },
        },

        components: {
            Post,
        },
    }
</script>
