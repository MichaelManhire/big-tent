<template>
    <div class="container">
        <section>
            <h1 class="sr-only">Groups</h1>

            <ul class="grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-3" v-if="groups.length">
                <li class="col-span-1" v-for="(group, index) in groups" :key="group.id">
                    <group :group="group" />
                </li>
            </ul>
            <p v-else>There are no groups here.</p>
        </section>
    </div>
</template>

<script>
    import Group from '@/Components/Group'

    export default {
        props: {
            groups: {
                type: Array,
            },
        },

        components: {
            Group,
        },
    }
</script>
