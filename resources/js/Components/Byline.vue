<template>
    <p class="flex justify-between text-sm text-gray-500">
        <span class="flex">
            <!-- User -->
            <span class="sr-only">Posted by</span>
            <a class="flex" href="#">
                <span>
                    <user-icon />
                </span>
                <span class="inline-block ml-1">{{ post.author }}</span>
            </a>

            <!-- Time -->
            <span class="ml-3">
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
    <p v-if="post.group" class="mt-3 text-sm text-gray-500">
        <span class="sr-only">Posted in</span>
        <a class="flex" :href="post.group_show_url">
            <span>
                <template-icon />
            </span>
            <span class="inline-block ml-1">{{ post.group }}</span>
        </a>
    </p>
</template>

<script>
    import ChatIcon from '@/Icons/Chat'
    import ClockIcon from '@/Icons/Clock'
    import HeartIcon from '@/Icons/Heart'
    import TemplateIcon from '@/Icons/Template'
    import UserIcon from '@/Icons/User'

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
            HeartIcon,
            TemplateIcon,
            UserIcon,
        },
    }
</script>
