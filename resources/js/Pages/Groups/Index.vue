<template>
    <div class="container">
        <section>
            <h1 class="sr-only">Groups</h1>

            <div v-if="groups.from">
                <ul class="grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <li class="col-span-1" v-for="group in groups.data" :key="group.slug">
                        <group :group="group" />
                    </li>
                </ul>

                <pagination :pagination="groups" />
            </div>
            <p v-else>There are no groups here.</p>
        </section>
    </div>
</template>

<script>
    import Group from '@/Shared/Group'
    import Pagination from '@/Shared/Pagination'

    export default {
        props: {
            groups: {
                type: Object,
            },
        },

        components: {
            Group,
            Pagination,
        },
    }
</script>
