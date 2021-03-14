<template>
    <h1 class="sr-only">Posts</h1>

    <div v-if="posts.from">
        <post-list :posts="posts" />
    </div>
    <p v-else>There are no posts here.</p>
</template>

<script>
    import Post from '@/Shared/Post'
    import PostList from '@/Shared/PostList'

    export default {
        props: {
            posts: {
                type: Object,
            },
        },

        components: {
            Post,
            PostList,
        },
    }
</script>
