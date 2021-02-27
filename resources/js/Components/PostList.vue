<template>
    <ol>
        <li :class="{ 'mt-6': index > 0 }" v-for="(post, index) in posts" :key="post.id">
            <post :post="post" />
        </li>
    </ol>
</template>

<script>
    import Post from '@/Components/Post'

    export default {
        props: {
            posts: {
                type: Array,
            },
        },

        components: {
            Post,
        },
    }
</script>
