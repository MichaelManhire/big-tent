<template>
    <div class="container">
        <section>
            <h1 class="sr-only">Posts</h1>

            <div v-if="posts.data.length">
                <post-list :posts="posts" />
            </div>
            <p v-else>There are no posts here.</p>
        </section>
    </div>
</template>

<script>
    import Post from '@/Components/Post'
    import PostList from '@/Components/PostList'

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
