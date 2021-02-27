<template>
    <div class="container">
        <section class="md:flex md:items-center md:justify-between md:space-x-5">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <img class="h-16 w-16 rounded-md" src="https://source.unsplash.com/200x200" alt="" width="64" height="64" loading="lazy">
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ group.name }}</h1>
                </div>
            </div>
            <div class="mt-6 flex justify-stretch sm:justify-end md:mt-0">
                <primary-button>
                    Join Group
                </primary-button>
            </div>
        </section>

        <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
            <section class="lg:col-start-1 lg:col-span-2">
                <h2 class="sr-only">Posts</h2>
                <div v-if="group.posts.length">
                    <post-list :posts="group.posts" />
                </div>
                <p v-else>This group doesn't have any posts in it.</p>
            </section>

            <section class="lg:col-start-3 lg:col-span-1">
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <h2 class="text-lg font-medium">Members</h2>
                    <ul class="flex flex-wrap" v-if="group.members.length">
                        <li class="mt-2 mr-2" v-for="member in group.members">
                            <avatar :src="member.image" :width="48" :height="48" :name="member.name" />
                        </li>
                    </ul>
                    <p class="mt-3" v-else>This group doesn't have any members in it.</p>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    import Avatar from '@/Components/Avatar'
    import Post from '@/Components/Post'
    import PostList from '@/Components/PostList'
    import PrimaryButton from '@/Components/PrimaryButton'

    export default {
        props: {
            group: {
                type: Object,
            },
        },

        components: {
            Avatar,
            Post,
            PostList,
            PrimaryButton,
        },
    }
</script>
