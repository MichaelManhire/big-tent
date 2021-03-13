<template>
    <div class="container">
        <section class="md:flex md:items-center md:justify-between md:space-x-5">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <img class="rounded-md" :src="user.image" alt="" width="64" height="64" loading="lazy">
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ user.name }}</h1>
                </div>
            </div>
        </section>

        <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
            <section class="lg:col-start-1 lg:col-span-2">
                <h2 class="sr-only">Posts</h2>
                <div v-if="user.posts.from">
                    <post-list :posts="user.posts" heading="h3" />
                </div>
                <p v-else>{{ user.name }} hasn't posted anything yet.</p>
            </section>

            <section class="lg:col-start-3 lg:col-span-1">
                <!-- Sidebar Content -->
            </section>
        </div>
    </div>
</template>

<script>
    import Post from '@/Shared/Post'
    import PostList from '@/Shared/PostList'

    export default {
        props: {
            user: {
                type: Object,
            },
        },

        components: {
            Post,
            PostList,
        },
    }
</script>
