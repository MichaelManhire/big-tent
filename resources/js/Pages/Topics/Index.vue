<template>
    <h1 class="sr-only">Topics</h1>

    <div v-if="topics.from">
        <ul class="grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <li class="col-span-1" v-for="topic in topics.data" :key="topic.slug">
                <topic :topic="topic" />
            </li>
        </ul>

        <pagination :pagination="topics" />
    </div>
    <p v-else>There are no topics here.</p>
</template>

<script>
    import Pagination from '@/Shared/Pagination'
    import Topic from '@/Shared/Topic'

    export default {
        props: {
            topics: {
                type: Object,
            },
        },

        components: {
            Pagination,
            Topic,
        },
    }
</script>
