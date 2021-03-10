<template>
    <nav class="py-6 flex items-center justify-between" aria-label="Pagination">
        <div class="flex-1 flex justify-end">
            <inertia-link v-if="pagination.prev_page_url" :href="pagination.prev_page_url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Previous
            </inertia-link>
            <inertia-link v-if="pagination.next_page_url" :href="pagination.next_page_url" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Next
            </inertia-link>
        </div>
    </nav>
</template>

<script>
    export default {
        props: {
            pagination: {
                type: Object,
            },
        },
    }
</script>
