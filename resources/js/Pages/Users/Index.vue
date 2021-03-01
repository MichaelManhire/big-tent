<template>
    <div class="container">
        <section>
            <h1 class="sr-only">Members</h1>

            <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3" v-if="users.length">
                <li class="col-span-1" v-for="(user, index) in users" :key="user.id">
                    <user :user="user" />
                </li>
            </ul>
            <p v-else>There are no members here.</p>
        </section>
    </div>
</template>

<script>
    import User from '@/Components/User'

    export default {
        props: {
            users: {
                type: Array,
            },
        },

        components: {
            User,
        },
    }
</script>
