<template>
    <div class="container">
        <section>
            <h1 class="sr-only">Posts</h1>

            <ol v-if="posts.length">
                <li :class="{ 'mt-6': index > 0 }" v-for="(post, index) in posts" :key="post.id">
                    <post :post="post" />
                </li>
            </ol>
            <p v-else>There are no posts here!</p>
        </section>
    </div>
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
