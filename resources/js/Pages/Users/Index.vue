<template>
    <h1 class="sr-only">Members</h1>

    <div v-if="members.from">
        <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <li class="col-span-1" v-for="member in members.data" :key="member.slug">
                <user :user="member" />
            </li>
        </ul>

        <pagination :pagination="members" />
    </div>
    <p v-else>There are no members here.</p>
</template>

<script>
    import Pagination from '@/Shared/Pagination'
    import User from '@/Shared/User'

    export default {
        props: {
            members: {
                type: Object,
            },
        },

        components: {
            Pagination,
            User,
        },
    }
</script>
