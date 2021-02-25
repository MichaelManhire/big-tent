<template>
    <div class="flex shadow-sm rounded-md border border-gray-200">
        <div class="flex-shrink-0 flex items-center justify-center w-24 bg-white rounded-l-md">
            <img class="rounded-l-md" src="https://source.unsplash.com/200x200" alt="" width="96" height="96" loading="lazy">
        </div>
        <div class="flex-1 flex justify-between bg-white rounded-r-md">
            <div class="flex-1 px-4 py-2 text-sm">
                <a class="text-gray-900 font-medium hover:text-gray-600" href="#">{{ group.name }}</a>
                <p class="mt-1 text-gray-500">16 Members</p>
            </div>
            <div class="flex-shrink-0 self-center pr-2">
                <button class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">Join Group</span>
                    <check-icon />
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import CheckIcon from '@/Icons/Check'

    export default {
        props: {
            group: {
                type: Object,
            },
        },

        components: {
            CheckIcon,
        },
    }
</script>
