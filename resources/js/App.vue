<template>
    <navbar @toggle="toggleMenu" />
    <div class="app">
        <side-nav :class="isExpanded && 'is-expanded'" class="" />
        <div class="main px-5 md:px-20" :class="isExpanded && 'is-expanded'">
            <div class="flex justify-between items-center border-b">
                <div class="font-semibold text-3xl">User Profile</div>
                <div class="border rounded-t-xl p-3 flex items-center text-base">
                    <p>Preview Talent Profile</p>
                    <Icons name="arrowUp" class="ml-2" />
                </div>
            </div>
            <div class="font-light flex items-center text-sm mt-1">
                <p class="underline">Home</p>
                <span class="material-symbols-outlined font-light text-sm mx-1">
                    expand_circle_right
                </span>
                <p>User Profile</p>
            </div>
            <article class="my-12">
                <article class="flex justify-between gap-4 w-full items-start">
                    <div class="flex flex-none items-center w-[70%] py-4 border-b">
                        <img src="./assets/png/userCountry.png" alt="user">
                        <div class="ml-2">
                            <h1 class="flex items-start font-medium text-3xl">Beth Amarachi
                                <Icons name="checkmark" />
                            </h1>
                            <ul class="flex list-disc list-outside items-center">
                                <li class="list-none mr-6">DevOps Engineer</li>
                                <li class="text-gray-500 px-0 mr-6">Member</li>
                                <li class="text-gray-500 px-0 mr-6">Senior Level</li>
                                <li class="text-gray-500 px-0 underline"><a href="#" class="text-primary">52 claimed
                                        perks</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-[#F1EEF6] flex-none w-[30%] rounded-2xl">
                        <div
                            class="flex justify-between p-4 items-center text-white h-[80%] w-full bg-[#9E5CD6E5] rounded-t-2xl">
                            <div>
                                <p class="font-medium text-sm">Member of</p>
                                <p class="font-bold text-lg">GirlsCanCode</p>
                            </div>
                            <img src="./assets/png/groupLogo.png" alt="logo">
                        </div>
                        <p class="p-3 flex items-center text-sm font-medium">Visit Community Wall <span
                                class="material-symbols-outlined">
                                arrow_right
                            </span></p>
                    </div>
                </article>
                <article class="flex justify-between items-start mt-10 gap-4 w-full">
                    <div v-if="editPersonalInfo" class="bg-[#F7F8F8] rounded-2xl py-4 px-3 w-[70%] flex-initial">
                        <div class="flex items-center justify-between py-4 border-b">
                            <div class="text-2xl text-[#384747]">Personal Info</div>
                            <div class="flex items-center">
                                <button
                                    class="bg-transparent text-red-500 text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3 mr-2 font-semibold">
                                    <Icons name="circleCancel" class="fill-red-800 w-[20px] h-[20px] mr-1" />Cancel
                                </button>
                                <button
                                    class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3" @click="editPersonalInfo = false">
                                    <Icons name="circleCheck" class="fill-white w-[20px] h-[20px] mr-1" />Save
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-center items-center w-full my-4">
                            <form class="w-[50%] my-5 mx-auto">
                                <div class="flex flex-col">
                                    <label for="full_name" class="font-medium text-sm mb-1">First Name</label>
                                    <input type="text" placeholder="Full Name"
                                        class="form-input border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="email" class="font-medium text-sm mb-1">Email</label>
                                    <input type="email" placeholder="First Name"
                                        class="form-input border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="gender" class="font-medium text-sm mb-1">Gender</label>
                                    <select class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="country" class="font-medium text-sm mb-1">Country</label>
                                    <select class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Country</option>
                                        <option value="Female">Kenya</option>
                                        <option value="Male">Nigeria</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="email" class="font-medium text-sm mb-1">Phone Number</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center mr-4">
                                            <select id="countrycode" name="countrycode"
                                                class="h-full rounded-xl border-0 bg-transparent py-3 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                <option>+234</option>
                                                <option>+254</option>
                                                <option>+1</option>
                                            </select>
                                        </div>
                                        <input type="text" name="phone" id="phone"
                                            class="block w-full rounded-xl border-0 py-3 pl-20 pr-7 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="090...">
                                    </div>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="about" class="font-medium text-sm mb-1">About me</label>
                                    <textarea name="about" id="about" class="py-3 px-4 rounded-xl border-[#E4E7E7] form-textarea w-full" cols="30" rows="5"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="flex items-center justify-end py-4 border-t">
                            <div class="flex items-center">
                                <button
                                    class="bg-transparent text-red-500 text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3 mr-2 font-semibold">
                                    <Icons name="circleCancel" class="fill-red-800 w-[20px] h-[20px] mr-1" />Cancel
                                </button>
                                <button
                                    class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3" @click="editPersonalInfo = false">
                                    <Icons name="circleCheck" class="fill-white w-[20px] h-[20px] mr-1" />Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-else class="w-[70%] flex-initial">
                        <div class="flex items-center justify-between py-4 border-b">
                            <div class="text-2xl text-[#384747]">Personal Info</div>
                            <button class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3" @click="editPersonalInfo = true">
                                <Icons name="pen" class="fill-white w-[20px] h-[20px] mr-1" />Edit
                            </button>
                        </div>
                        <div class="flex items-start w-full mt-6">
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">First Name</h5>
                                <p class="text-base">Beth Amarachi</p>
                            </div>
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">Email address</h5>
                                <p class="text-base">bethamarachi@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex items-start w-full mt-6">
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">Gender</h5>
                                <p class="text-base">Female</p>
                            </div>
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">Country of residence</h5>
                                <p class="text-base">Nigeria</p>
                            </div>
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">Phone number</h5>
                                <p class="text-base">+234-9283924450</p>
                            </div>
                        </div>
                        <div class="flex-initial w-full mt-6">
                            <h5 class="font-semibold text-base">About Me</h5>
                            <p class="text-base">I am a DevOps and Big Data engineer with 4 years experience and
                                in-depth
                                knowledge of R, Python, PowerBI and Tableau. I have an Msc. in Statistics and a big part
                                of
                                my career has been spent working at Jumia Nigeria, working as a BI Analyst and later a
                                Commercial Planning Analyst.</p>
                        </div>
                    </div>
                    <div class="flex-initial rounded-xl bg-lighterBlue border border-lightBlue p-4 w-[30%]">
                        <h6 class="font-medium text-base text-gray-600">Resume/CV</h6>
                        <p class="text-sm text-gray-500">Update your resume.</p>
                        <div class="bg-lightBlue p-2 flex items-center border-lightBlue rounded-xl mt-3">
                            <Icons name="upload" class="mr-1" />
                            <p class="text-sm font-medium text-gray-600">Upload (pdf, docx 20mb max)</p>
                        </div>
                    </div>
                </article>
                <article class="flex justify-between items-start mt-10 gap-4 w-full">
                    <div v-if="editPersonalInfo" class="bg-[#F7F8F8] rounded-2xl py-4 px-3 w-[70%] flex-initial">
                        <div class="flex items-center justify-between py-4 border-b">
                            <div class="text-2xl text-[#384747]">Personal Info</div>
                            <div class="flex items-center">
                                <button
                                    class="bg-transparent text-red-500 text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3 mr-2 font-semibold">
                                    <Icons name="circleCancel" class="fill-red-800 w-[20px] h-[20px] mr-1" />Cancel
                                </button>
                                <button
                                    class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3" @click="editPersonalInfo = false">
                                    <Icons name="circleCheck" class="fill-white w-[20px] h-[20px] mr-1" />Save
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-center items-center w-full my-4">
                            <form class="w-[50%] my-5 mx-auto">
                                <div class="flex flex-col">
                                    <label for="full_name" class="font-medium text-sm mb-1">First Name</label>
                                    <input type="text" placeholder="Full Name"
                                        class="form-input border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="email" class="font-medium text-sm mb-1">Email</label>
                                    <input type="email" placeholder="First Name"
                                        class="form-input border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="gender" class="font-medium text-sm mb-1">Gender</label>
                                    <select class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="country" class="font-medium text-sm mb-1">Country</label>
                                    <select class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Country</option>
                                        <option value="Female">Kenya</option>
                                        <option value="Male">Nigeria</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="email" class="font-medium text-sm mb-1">Phone Number</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center mr-4">
                                            <select id="countrycode" name="countrycode"
                                                class="h-full rounded-xl border-0 bg-transparent py-3 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                <option>+234</option>
                                                <option>+254</option>
                                                <option>+1</option>
                                            </select>
                                        </div>
                                        <input type="text" name="phone" id="phone"
                                            class="block w-full rounded-xl border-0 py-3 pl-20 pr-7 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="090...">
                                    </div>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="about" class="font-medium text-sm mb-1">About me</label>
                                    <textarea name="about" id="about" class="py-3 px-4 rounded-xl border-[#E4E7E7] form-textarea w-full" cols="30" rows="5"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="flex items-center justify-end py-4 border-t">
                            <div class="flex items-center">
                                <button
                                    class="bg-transparent text-red-500 text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3 mr-2 font-semibold">
                                    <Icons name="circleCancel" class="fill-red-800 w-[20px] h-[20px] mr-1" />Cancel
                                </button>
                                <button
                                    class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3" @click="editPersonalInfo = false">
                                    <Icons name="circleCheck" class="fill-white w-[20px] h-[20px] mr-1" />Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-else class="w-[70%] flex-initial">
                        <div class="flex items-center justify-between py-4 border-b">
                            <div class="text-2xl text-[#384747]">Personal Info</div>
                            <button class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3" @click="editPersonalInfo = true">
                                <Icons name="pen" class="fill-white w-[20px] h-[20px] mr-1" />Edit
                            </button>
                        </div>
                        <div class="flex items-start w-full mt-6">
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">First Name</h5>
                                <p class="text-base">Beth Amarachi</p>
                            </div>
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">Email address</h5>
                                <p class="text-base">bethamarachi@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex items-start w-full mt-6">
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">Gender</h5>
                                <p class="text-base">Female</p>
                            </div>
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">Country of residence</h5>
                                <p class="text-base">Nigeria</p>
                            </div>
                            <div class="flex-initial w-[33.3%]">
                                <h5 class="font-semibold text-base">Phone number</h5>
                                <p class="text-base">+234-9283924450</p>
                            </div>
                        </div>
                        <div class="flex-initial w-full mt-6">
                            <h5 class="font-semibold text-base">About Me</h5>
                            <p class="text-base">I am a DevOps and Big Data engineer with 4 years experience and
                                in-depth
                                knowledge of R, Python, PowerBI and Tableau. I have an Msc. in Statistics and a big part
                                of
                                my career has been spent working at Jumia Nigeria, working as a BI Analyst and later a
                                Commercial Planning Analyst.</p>
                        </div>
                    </div>
                    <div class="flex-initial rounded-xl bg-lighterBlue border border-lightBlue p-4 w-[30%]">
                        <h6 class="font-medium text-base text-gray-600">Resume/CV</h6>
                        <p class="text-sm text-gray-500">Update your resume.</p>
                        <div class="bg-lightBlue p-2 flex items-center border-lightBlue rounded-xl mt-3">
                            <Icons name="upload" class="mr-1" />
                            <p class="text-sm font-medium text-gray-600">Upload (pdf, docx 20mb max)</p>
                        </div>
                    </div>
                </article>
            </article>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import Icons from './components/Icons.vue';
import SideNav from './components/SideNav.vue';
import Navbar from './components/Navbar.vue';

export default {
    components: { Icons, SideNav, Navbar },
    setup() {
        const isExpanded = ref(localStorage.getItem('isExpanded') === "true");
        const editPersonalInfo = ref(true)
        const editWorkInfo = ref(true)

        const toggleMenu = () => {
            isExpanded.value = !isExpanded.value
            localStorage.setItem("isExpanded", isExpanded.value)
        }

        return {
            isExpanded,
            toggleMenu,
            editPersonalInfo,
            editWorkInfo
        }
    }
};
</script>

<style lang="scss" scoped>
.app {
    display: flex;
    position: relative;

    .main {
        flex: 1 1 auto;
        position: relative;
        transition: 0.3s ease;
        margin-left: calc(2rem + 16px);
        width: calc(100% - var(--sidenav-width));
        margin-top: var(--header-height);
        padding-top: 30px;

        .dashboard-header {
            position: fixed;
            // transition: 0.3s ease;
            z-index: 999;
            width: calc(100% - calc(2rem + 16px));
        }

        &.is-expanded {
            margin-left: var(--sidenav-width);

            .dashboard-header {
                width: calc(100% - var(--sidenav-width));
            }
        }

        @media (max-width: 768px) {
            padding-left: 3rem;
        }
    }
}
</style>
