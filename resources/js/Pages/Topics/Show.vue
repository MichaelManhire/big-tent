<template>
    <section class="md:flex md:items-center md:justify-between md:space-x-5">
        <div class="flex items-center space-x-5">
            <div class="flex-shrink-0">
                <rounded-image :src="topic.image" element="div" width="64" height="64" />
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ topic.name }}</h1>
            </div>
        </div>
        <div class="mt-6 flex justify-stretch sm:justify-end md:mt-0">
            <primary-button type="button">I'm Interested</primary-button>
        </div>
    </section>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
        <section class="lg:col-start-1 lg:col-span-2">
            <h2 class="sr-only">Posts</h2>
            <div v-if="topic.posts.from">
                <post-list :posts="topic.posts" heading="h3" />
            </div>
            <p v-else>This topic doesn't have any posts about it.</p>
        </section>

        <section class="lg:col-start-3 lg:col-span-1">
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h2 class="text-lg font-medium">Members</h2>
                <ul class="flex flex-wrap" v-if="topic.members.length">
                    <li class="mt-2 mr-2" v-for="member in topic.members" :key="member.slug">
                        <avatar :src="member.image" :name="member.name" :href="route('users.show', member)" :online="member.online" />
                    </li>
                </ul>
                <p class="mt-3" v-else>This topic doesn't have anyone interested in it.</p>
            </div>
        </section>
    </div>
</template>

<script>
    import Avatar from '@/Shared/Avatar'
    import Post from '@/Shared/Post'
    import PostList from '@/Shared/PostList'
    import PrimaryButton from '@/Shared/PrimaryButton'
    import RoundedImage from '@/Shared/RoundedImage'

    export default {
        props: {
            topic: {
                type: Object,
            },
        },

        components: {
            Avatar,
            Post,
            PostList,
            PrimaryButton,
            RoundedImage,
        },
    }
</script>
