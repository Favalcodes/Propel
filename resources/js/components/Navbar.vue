<template>
    <div class="fixed w-full z-20">
        <nav class="flex bg-white justify-between items-center px-3 border border-bottom-secondary">
            <div class="links">
                <button class="btn" @click="toggleMenu">
                    <span class="material-icons material-symbols-outlined">
                        <Icons name="menu" />
                    </span>
                </button>
            </div>
            <div class="flex items-center rounded-lg border border-[#F0F1F1] bg-secondary py-1 px-4">
                <img src="../assets/png/groupIcon.png" alt="group-icon" class="mr-2" />
                GirlsCanCode
            </div>
            <div class="flex items-center">
                <Icons name="lang" />
                <div class="flex items-center ml-2">
                    EN
                    <span class="material-symbols-outlined">
                        arrow_drop_down
                    </span>
                </div>
                <Icons name="notification" class="px-3 border-end" />
                <img src="../assets/png/user.png" alt="user" class="mx-2" />
                <div class="relative inline-block text-left">
                    <button type="button"
                        class="flex items-center border-0 w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm"
                        id="menu-button" aria-expanded="true" aria-haspopup="false" @click="showDropdown">
                        Beth Amarachi
                        <span class="material-symbols-outlined">
                            arrow_drop_down
                        </span>
                    </button>
                    <div v-show="dropdown"
                        class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-0">Account settings</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-1">Support</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-2">License</a>
                            <form method="POST" action="#" role="none">
                                <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm"
                                    role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import { ref, defineEmits } from 'vue';
import Icons from './Icons.vue';

export default {
    components: { Icons },
    setup() {
        const emit = defineEmits(['toggle'])

        const dropdown = ref(false)

        const showDropdown = () => {
            dropdown.value = !dropdown.value
        }

        const toggleMenu = () => {
            emit('toggle')
        };

        return {
            toggleMenu,
            dropdown,
            showDropdown
        }
    }
}
</script>

<style lang="scss">
nav {
    height: var(--header-height);
}
</style>
