<template>
    <p class="flex justify-between text-sm text-gray-500">
        <span class="flex">
            <!-- User -->
            <div v-if="post.author" class="mr-3">
                <span class="sr-only">Posted by</span>
                <inertia-link :href="route('users.show', post.author)" class="flex">
                    <span>
                        <user-icon />
                    </span>
                    <span class="inline-block ml-1">{{ post.author.name }}</span>
                </inertia-link>
            </div>

            <!-- Time -->
            <span>
                <clock-icon />
            </span>
            <time class="inline-block ml-1">{{ post.created_at }}</time>
        </span>
        <span class="flex">
            <!-- Comments -->
            <span class="ml-3">
                <chat-icon />
            </span>
            <span class="inline-block ml-1">{{ post.comments_count }}</span>
            <span class="sr-only">{{ comments }}</span>

            <!-- Hearts -->
            <span class="ml-3">
                <heart-icon />
            </span>
            <span class="inline-block ml-1">{{ post.hearts_count }}</span>
            <span class="sr-only">{{ hearts }}</span>
        </span>
    </p>
    <p v-if="post.topic" class="mt-3 text-sm text-gray-500">
        <span class="sr-only">Posted in</span>
        <inertia-link :href="route('topics.show', post.topic)" class="flex">
            <span>
                <hashtag-icon />
            </span>
            <span class="inline-block ml-1">{{ post.topic.name }}</span>
        </inertia-link>
    </p>
</template>

<script>
    import ChatIcon from '@/Shared/Icons/Chat'
    import ClockIcon from '@/Shared/Icons/Clock'
    import HashtagIcon from '@/Shared/Icons/Hashtag'
    import HeartIcon from '@/Shared/Icons/Heart'
    import UserIcon from '@/Shared/Icons/User'

    export default {
        props: {
            post: {
                type: Object,
            },
        },

        computed: {
            comments() {
                return `${this.post.comments_count === 1 ? 'comment' : 'comments'}`
            },

            hearts() {
                return `${this.post.hearts_count === 1 ? 'heart' : 'hearts'}`
            },
        },

        components: {
            ChatIcon,
            ClockIcon,
            HashtagIcon,
            HeartIcon,
            UserIcon,
        },
    }
</script>
