<template>
    <section class="md:flex md:items-center md:justify-between md:space-x-5">
        <div class="flex items-center space-x-5">
            <div class="flex-shrink-0">
                <avatar :src="member.image" :name="member.name" :online="member.online" element="div" width="64" height="64" />
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ member.name }}</h1>
            </div>
        </div>
    </section>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
        <section class="lg:col-start-1 lg:col-span-2">
            <h2 class="sr-only">Posts</h2>
            <div v-if="member.posts.from">
                <post-list :posts="member.posts" heading="h3" />
            </div>
            <p v-else>{{ member.name }} hasn't posted anything yet.</p>
        </section>

        <section class="lg:col-start-3 lg:col-span-1">
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h2 class="text-lg font-medium">Groups</h2>
                <ul class="flex flex-wrap" v-if="member.groups.length">
                    <!--
                    <li class="mt-2 mr-2" v-for="group in member.groups" :key="group.slug">
                        <avatar :src="group.image" :width="48" :height="48" :name="group.name" :href="route('groups.show', group)" />
                    </li>
                    -->
                </ul>
                <p class="mt-3" v-else>This member hasn't joined any groups.</p>
            </div>
        </section>
    </div>
</template>

<script>
    import Avatar from '@/Shared/Avatar'
    import Post from '@/Shared/Post'
    import PostList from '@/Shared/PostList'

    export default {
        props: {
            member: {
                type: Object,
            },
        },

        components: {
            Avatar,
            Post,
            PostList,
        },
    }
</script>
