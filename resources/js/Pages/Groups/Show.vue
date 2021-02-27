<template>
    <div class="container">
        <section class="md:flex md:items-center md:justify-between md:space-x-5">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <img class="h-16 w-16 rounded-md" src="https://source.unsplash.com/200x200" alt="" width="64" height="64" loading="lazy">
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ group.name }}</h1>
                    <!-- <p class="text-sm font-medium text-gray-500">Applied for <a href="#" class="text-gray-900">Front End Developer</a> on <time datetime="2020-08-25">August 25, 2020</time></p> -->
                </div>
            </div>
            <div class="mt-6 flex justify-stretch sm:justify-end md:mt-0">
                <primary-button>
                    Join Group
                </primary-button>
            </div>
        </section>

        <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-start-1 lg:col-span-2"></div>
            <section class="lg:col-start-3 lg:col-span-1">
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <h2 class="text-lg font-medium">Members</h2>
                    <ul class="mt-3 grid grid-cols-6 gap-2" v-if="group.members.length">
                        <li v-for="member in group.members">
                            <avatar :src="member.image" :width="48" :height="48" />
                        </li>
                    </ul>
                    <p class="mt-3" v-else>This group doesn't have any members in it.</p>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    import Avatar from '@/Components/Avatar'

    export default {
        props: {
            group: {
                type: Object,
            },
        },

        components: {
            Avatar,
        },
    }
</script>
