<template>
    <div class="container">
        <section>
            <h1 class="sr-only">Members</h1>

            <div v-if="users.data">
                <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <li class="col-span-1" v-for="(user, index) in users.data" :key="user.id">
                        <user :user="user" />
                    </li>
                </ul>

                <pagination :pagination="users" />
            </div>
            <p v-else>There are no members here.</p>
        </section>
    </div>
</template>

<script>
    import Pagination from '@/Components/Pagination'
    import User from '@/Components/User'

    export default {
        props: {
            users: {
                type: Object,
            },
        },

        components: {
            Pagination,
            User,
        },
    }
</script>
