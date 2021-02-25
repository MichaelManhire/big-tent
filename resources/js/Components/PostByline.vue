<template>
    <p class="flex justify-between text-sm text-gray-500">
        <span class="flex">
            <span class="sr-only">Posted by</span>
            <a class="flex" href="#">
                <span>
                    <user-icon />
                </span>
                <span class="inline-block ml-1">{{ post.author }}</span>
            </a>
            <span class="ml-3">
                <clock-icon />
            </span>
            <time class="inline-block ml-1">{{ post.created_at }}</time>
        </span>
        <span class="flex">
            <span class="ml-3">
                <chat-icon />
            </span>
            <span class="inline-block ml-1">{{ post.comments_count }}</span>
            <span class="sr-only">comments</span>
            <span class="ml-3">
                <heart-icon />
            </span>
            <span class="inline-block ml-1">{{ post.hearts_count }}</span>
            <span class="sr-only">hearts</span>
        </span>
    </p>
</template>

<script>
    import ChatIcon from '@/Icons/Chat'
    import ClockIcon from '@/Icons/Clock'
    import HeartIcon from '@/Icons/Heart'
    import UserIcon from '@/Icons/User'

    export default {
        props: ['post'],

        components: {
            ChatIcon,
            ClockIcon,
            HeartIcon,
            UserIcon,
        },
    }
</script>
