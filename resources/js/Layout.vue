<template>
    <header>
        <nav class="bg-gray-800">
            <div class="container">
                <div class="flex items-center justify-between h-16">
                    <div class="flex-1 flex items-stretch justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <p class="text-white text-lg font-semibold">Big Tent</p>
                        </div>
                        <div class="ml-6">
                            <div class="flex space-x-4">
                                <inertia-link
                                    :href="route('posts.index')"
                                    class="px-3 py-2 rounded-md text-sm font-medium"
                                    :class="route().current('posts.index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                                >
                                    Posts
                                </inertia-link>
                            </div>
                        </div>
                    </div>
                    <div v-if="$page.props.user" class="flex items-center ml-6">
                        <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <bell-icon />
                        </button>

                        <div class="ml-3 relative">
                            <div>
                                <button
                                    @click="isOpen = !isOpen"
                                    class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu"
                                    type="button"
                                    aria-expanded="false"
                                    aria-haspopup="true"
                                >
                                    <span class="sr-only">Open user menu</span>
                                    <img :src="$page.props.user.profile_photo_url" class="rounded-lg" alt="" width="32" height="32" loading="lazy">
                                </button>
                            </div>

                            <transition
                                enter-active-class="transition ease-out duration-100 transform"
                                enter-from-class="opacity-0 scale-95"
                                enter-to-class="opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75 transform"
                                leave-from-class="opacity-100 scale-100"
                                leave-to-class="opacity-0 scale-95"
                            >
                                <div
                                    v-show="isOpen"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="user-menu"
                                >
                                    <inertia-link
                                        :href="route('users.show', $page.props.user)"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem"
                                    >
                                        Your Profile
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('profile.show')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem"
                                    >
                                        Settings
                                    </inertia-link>
                                    <form
                                        @submit.prevent="logout"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem"
                                    >
                                        <button type="submit">Log Out</button>
                                    </form>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <div v-else class="flex items-center ml-6">
                        <div>
                            <secondary-button element="inertia-link" :href="route('login')">Log In</secondary-button>
                        </div>
                        <div class="ml-4">
                            <primary-button element="inertia-link" :href="route('register')">Join</primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-6">
        <slot />
    </main>
</template>

<script>
    import BellIcon from '@/Shared/Icons/Bell'
    import PrimaryButton from '@/Shared/PrimaryButton'
    import SecondaryButton from '@/Shared/SecondaryButton'

    export default {
        data: () => ({
            isOpen: false,
        }),

        methods: {
            logout() {
                this.$inertia.post(route('logout'))
            },
        },

        components: {
            PrimaryButton,
            SecondaryButton,
            BellIcon,
        },
    }
</script>
