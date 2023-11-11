<template>
    <navbar @toggle="toggleMenu" />
    <div class="app">
        <side-nav :class="isExpanded && 'is-expanded'" class="" />
        <div class="main px-5 md:px-20" :class="isExpanded && 'md:is-expanded'">
            <div class="flex justify-between items-end md:items-center border-b">
                <div class="font-semibold text-3xl">User Profile</div>
                <div class="border rounded-t-xl p-3 flex items-center text-base">
                    <p class="flex items-center">Preview <span class="hidden md:block md:ml-1">Talent Profile</span></p>
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
                <article class="flex flex-col md:flex-row justify-between gap-4 w-full items-start">
                    <div class="flex flex-none items-start md:items-center w-[100%] md:w-[70%] py-4 border-b">
                        <img src="./assets/png/userCountry.png" alt="user">
                        <div class="ml-4 md:ml-2">
                            <h1 class="flex items-start font-medium text-3xl">Beth Amarachi
                                <Icons name="checkmark" />
                            </h1>
                            <ul class="flex flex-wrap list-disc list-outside items-center">
                                <li class="list-none mr-6">DevOps Engineer</li>
                                <li class="text-gray-500 px-0 mr-6">Member</li>
                                <li class="text-gray-500 px-0 mr-6">Senior Level</li>
                                <li class="text-gray-500 px-0 underline"><a href="#" class="text-primary">52 claimed
                                        perks</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-[#F1EEF6] flex-none w-[100%] md:w-[30%] rounded-2xl">
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
                <article class="flex flex-col-reverse md:flex-row justify-between items-start mt-10 gap-4 w-full">
                    <div v-if="editPersonalInfo" class="bg-[#F7F8F8] rounded-2xl py-4 px-3 w-[100%] md:w-[70%] flex-initial">
                        <div class="flex items-center justify-between py-4 border-b">
                            <div class="text-xl md:text-2xl text-[#384747]">Personal Info</div>
                            <div class="flex items-center">
                                <button
                                    class="bg-transparent text-red-500 text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3 mr-2 font-semibold">
                                    <Icons name="circleCancel" class="fill-red-800 w-[20px] h-[20px] mr-1" />Cancel
                                </button>
                                <button
                                    class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3"
                                    @click="editPersonalInfo = false">
                                    <Icons name="circleCheck" class="fill-white w-[20px] h-[20px] mr-1" />Save
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-center items-center w-full my-4">
                            <form class="w-[100%] md:w-[50%] my-5 mx-auto">
                                <div class="flex flex-col">
                                    <label for="full_name" class="font-medium text-sm mb-1">Full Name</label>
                                    <input type="text" v-model="personalInfo.full_name" placeholder="Full Name"
                                        class="form-input border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="email" class="font-medium text-sm mb-1">Email</label>
                                    <input type="email" v-model="personalInfo.email" placeholder="First Name"
                                        class="form-input border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="gender" class="font-medium text-sm mb-1">Gender</label>
                                    <select v-model="personalInfo.gender"
                                        class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="country" class="font-medium text-sm mb-1">Country</label>
                                    <select v-model="personalInfo.country"
                                        class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Country</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Nigeria">Nigeria</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="email" class="font-medium text-sm mb-1">Phone Number</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center mr-4">
                                            <select v-model="personalInfo.countryCode" id="countrycode" name="countrycode"
                                                class="h-full rounded-xl border-0 bg-transparent py-3 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                <option>+234</option>
                                                <option>+254</option>
                                                <option>+1</option>
                                            </select>
                                        </div>
                                        <input v-model="personalInfo.phone" type="text" name="phone" id="phone"
                                            class="block w-full rounded-xl border-0 py-3 pl-20 pr-7 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="090...">
                                    </div>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="about" class="font-medium text-sm mb-1">About me</label>
                                    <textarea v-model="personalInfo.about" name="about" id="about"
                                        class="py-3 px-4 rounded-xl border-[#E4E7E7] form-textarea w-full" cols="30"
                                        rows="5"></textarea>
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
                                    class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3"
                                    @click="editPersonalInfo = false">
                                    <Icons name="circleCheck" class="fill-white w-[20px] h-[20px] mr-1" />Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-else class="w-[100%] md:w-[70%] flex-initial">
                        <div class="flex items-center justify-between py-4 border-b">
                            <div class="text-2xl text-[#384747]">Personal Info</div>
                            <button class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3"
                                @click="editPersonalInfo = true">
                                <Icons name="pen" class="fill-white w-[20px] h-[20px] mr-1" />Edit
                            </button>
                        </div>
                        <div class="flex flex-wrap items-start w-full mt-6">
                            <div class="flex-initial w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Full Name</h5>
                                <p class="text-base">{{ personalInfo.full_name }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Email address</h5>
                                <p class="text-base">{{ personalInfo.email }}</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-start w-full mt-6">
                            <div class="flex-initial w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Gender</h5>
                                <p class="text-base">{{ personalInfo.gender }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Country of residence</h5>
                                <p class="text-base">{{ personalInfo.country }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Phone number</h5>
                                <p class="text-base">{{ `${personalInfo.countryCode}-${personalInfo.phone}` }}</p>
                            </div>
                        </div>
                        <div class="flex-initial w-full mt-6">
                            <h5 class="font-semibold text-base">About Me</h5>
                            <p class="text-base">{{ personalInfo.about }}</p>
                        </div>
                    </div>
                    <div class="flex-initial rounded-xl bg-lighterBlue border border-lightBlue p-4 w-[100%] md:w-[30%]">
                        <h6 class="font-medium text-base text-gray-600">Resume/CV</h6>
                        <p class="text-sm text-gray-500">Update your resume.</p>
                        <div class="bg-lightBlue p-2 flex items-center border-lightBlue rounded-xl mt-3">
                            <Icons name="upload" class="mr-1" />
                            <p class="text-sm font-medium text-gray-600">Upload (pdf, docx 20mb max)</p>
                        </div>
                    </div>
                </article>
                <article class="flex justify-between items-start mt-20 gap-4 w-full">
                    <div v-if="editWorkInfo" class="bg-[#F7F8F8] rounded-2xl py-4 px-3 w-[100%] md:w-[70%] flex-initial">
                        <div class="flex items-center justify-between py-4 border-b">
                            <div class="text-xl md:text-2xl text-[#384747]">Work Info</div>
                            <div class="flex items-center">
                                <button
                                    class="bg-transparent text-red-500 text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3 mr-2 font-semibold">
                                    <Icons name="circleCancel" class="fill-red-800 w-[20px] h-[20px] mr-1" />Cancel
                                </button>
                                <button
                                    class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3"
                                    @click="editWorkInfo = false">
                                    <Icons name="circleCheck" class="fill-white w-[20px] h-[20px] mr-1" />Save
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-center items-center w-full my-4">
                            <form class="w-[100%] md:w-[70%] my-5 mx-auto">
                                <div class="flex flex-col">
                                    <label for="employment_status" class="font-medium text-sm mb-1">Employment
                                        Status</label>
                                    <select v-model="workInfo.employment_status"
                                        class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Status</option>
                                        <option value="Actively seeking opportunities">Actively looking for an opportunity
                                        </option>
                                        <option value="Not really seeking">Not really searching</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-6">
                                    <label for="primary_role" class="font-medium text-sm mb-1">Primary Role</label>
                                    <select v-model="workInfo.primary_role"
                                        class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Status</option>
                                        <option value="DevOps Engineer">DevOps Engineer</option>
                                        <option value="Frontend">Frontend Engineer</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-6">
                                    <label for="secondary_role" class="font-medium text-sm mb-1">Secondary Role</label>
                                    <MultiSelect display="chip" v-model="workInfo.secondary_roles"
                                        :options="['Data Engineer', 'Cybersecurity', 'Backend Engineer', 'Frontend']"
                                        placeholder="Select Roles" :maxSelectedLabels="3"
                                        class="w-full bg-white px-4 py-3 border-[#E4E7E7] rounded-xl" />
                                    <div class="flex flex-wrap items-center mt-3">
                                        <div class="flex items-center bg-tagBlue text-gray-500 py-1 px-2 rounded-full font-medium text-sm my-1 mr-3"
                                            v-for="(item, index) in workInfo.secondary_roles" :key="index">
                                            <span class=" mr-2">{{ item }}</span>
                                            <button class="bg-transparent"
                                                @click.prevent="removeSecondaryRoles(index)">x</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-6">
                                    <label for="portfolio" class="font-medium text-sm mb-1">Github/Portfolio</label>
                                    <input type="text" v-model="workInfo.portfolio" placeholder="Github/Portfolio"
                                        class="px-4 py-3 border-[#E4E7E7] rounded-xl form-input">
                                </div>
                                <div class="flex justify-between items-center gap-4">
                                    <div class="flex flex-col mt-6 w-[50%]">
                                        <label for="years_of_experience" class="font-medium text-sm mb-1">Years of
                                            Experience</label>
                                        <select v-model="workInfo.years_of_experience"
                                            class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                            <option hidden>Select year</option>
                                            <option value="6">6 years</option>
                                            <option value="7">7 years</option>
                                            <option value="8">8 years</option>
                                            <option value="9">9 years</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col w-[50%] mt-6">
                                        <label for="prefered_salary" class="font-medium text-sm mb-1">Preferred Salary <span
                                                class="text-gray-400 font-light italic">(monthly)<span
                                                    class="text-red-600">*</span></span></label>
                                        <input type="text" v-model="workInfo.prefered_salary" placeholder="Prefered Salary"
                                            class="px-4 py-3 border-[#E4E7E7] rounded-xl form-input">
                                    </div>
                                </div>
                                <div class="flex flex-col mt-6">
                                    <label for="prefered_work" class="font-medium text-sm mb-1">Preferred Work</label>
                                    <MultiSelect display="chip" v-model="workInfo.prefered_work"
                                        :options="['Full-time', 'Contract', 'Remote', 'Hybrid']"
                                        placeholder="Select Prefered Work" :maxSelectedLabels="3"
                                        class="w-full bg-white px-4 py-3 border-[#E4E7E7] rounded-xl" />
                                    <div class="flex flex-wrap items-center mt-3">
                                        <div class="flex items-center bg-tagBlue text-gray-500 py-1 px-2 rounded-full font-medium text-sm my-1 mr-3"
                                            v-for="(item, index) in workInfo.prefered_work" :key="index">
                                            <span class=" mr-2">{{ item }}</span>
                                            <button class="bg-transparent"
                                                @click.prevent="removePreferedWork(index)">x</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center gap-4">
                                    <div class="flex flex-col mt-6 w-[50%]">
                                        <label for="relocation" class="font-medium text-sm mb-1">Relocation abroad</label>
                                        <select v-model="workInfo.relocation"
                                            class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                            <option hidden>Select Relocation</option>
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col w-[50%] mt-6">
                                        <label for="notice_period" class="font-medium text-sm mb-1">Notice Period</label>
                                        <input type="text" v-model="workInfo.notice_period" placeholder="Prefered Salary"
                                            class="px-4 py-3 border-[#E4E7E7] rounded-xl form-input">
                                    </div>
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
                                    class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3"
                                    @click="editWorkInfo = false">
                                    <Icons name="circleCheck" class="fill-white w-[20px] h-[20px] mr-1" />Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-else class="w-[100%] md:w-[70%] flex-initial">
                        <div class="flex items-center justify-between py-4 border-b">
                            <div class="text-2xl text-[#384747]">Work Info</div>
                            <button class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3"
                                @click="editWorkInfo = true">
                                <Icons name="pen" class="fill-white w-[20px] h-[20px] mr-1" />Edit
                            </button>
                        </div>
                        <div class="flex flex-wrap items-start w-full mt-8">
                            <div class="flex-initial w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Employment Status</h5>
                                <p class="text-base">{{ workInfo.employment_status }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Primary Role</h5>
                                <p class="text-base">{{ workInfo.primary_role }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Github/Portfolio</h5>
                                <p class="text-base">{{ workInfo.portfolio }}</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-start w-full mt-8">
                            <div class="flex-initial w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Preferred Work</h5>
                                <p class="text-base">{{ workInfo.prefered_work.join(', ') }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Relocation Abroad</h5>
                                <p class="text-base">{{ workInfo.relocation ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Years of Experience</h5>
                                <p class="text-base">{{ workInfo.years_of_experience }} Years</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-start w-full mt-8">
                            <div class="flex-initial w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Preferred Salary</h5>
                                <p class="text-base">{{ workInfo.prefered_salary }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Secondary Role</h5>
                                <p class="text-base">{{ workInfo.secondary_roles.join(', ') }}</p>
                            </div>
                            <div class="flex-initial mt-6 md:mt-0 w-[100%] md:w-[33.3%]">
                                <h5 class="font-semibold text-base">Notice Period</h5>
                                <p class="text-base">{{ workInfo.notice_period }}</p>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="flex justify-between items-start mt-20 gap-4 w-full">
                    <div class="flex-initial w-[100%] md:w-[70%]">
                        <div class="flex items-center justify-between py-4 border-b mb-10">
                            <div class="text-2xl text-[#384747]">Work Experience</div>
                            <button class="bg-black text-white text-sm flex items-center rounded-[20px] py-1 pl-1.5 pr-3"
                                @click="showModal = true">
                                <Icons name="circleAdd" class="fill-white w-[20px] h-[20px] mr-1" />Add
                            </button>
                        </div>
                        <div v-for="(item, index) in workExperience" :key="index"
                            class="border border-[#E4E7E7] rounded-xl my-5 p-5"
                            :class="item.selected && 'bg-lighterBlue border-0'">
                            <ol class="relative border-s border-[#E4E7E7]" :class="item.selected && 'border-lightBlue'">
                                <li class="mb-10 ms-4">
                                    <div class="absolute w-3 h-3 rounded-full mt-0 -start-1.5 border border-white"
                                        :class="item.selected ? 'bg-lightBlue' : 'bg-[#E4E7E7]'">
                                    </div>
                                    <div class="flex justify-between items-start md:items-center">
                                        <div>
                                            <h3 class="font-semibold text-xl">{{ item.title }}</h3>
                                            <div class="flex flex-wrap items-center text-base md:text-lg my-2">
                                                <p class="underline pr-2 md:border-r">{{ item.company }}</p>
                                                <p class="text-gray-500 px-2 md:border-r"
                                                    :class="item.selected ? 'text-gray-900' : 'text-gray-500'">{{
                                                        `${item.state}, ${item.country}` }}</p>
                                                <time class="text-gray-500 px-2"
                                                    :class="item.selected ? 'text-gray-900' : 'text-gray-500'">{{
                                                        `${item.start_month} ${item.start_year}` }} - {{ item.currently_there ?
        'Present' : `${item.end_month} ${item.end_year}` }}</time>
                                            </div>
                                        </div>
                                        <div v-if="item.selected" class="flex items-center">
                                            <button class="bg-white rounded-full p-2 mr-2">
                                                <Icons name="pen" class="fill-blue w-[24px] h-[24px]" />
                                            </button>
                                            <button class="bg-white rounded-full p-2">
                                                <Icons name="delete" />
                                            </button>
                                        </div>
                                    </div>
                                    <ul class="text-base leading-8 mt-3 font-normal list-disc"
                                        :class="item.selected ? 'text-gray-900' : 'text-gray-500'"
                                        v-html="item.accomplishment"></ul>
                                </li>
                            </ol>
                        </div>
                    </div>
                </article>
            </article>
        </div>

        <!-- MODALS -->

        <!-- Work Experience Modal -->
        <modal v-if="showModal" :title="'Work Experience'" :buttonLabel="'Save work experience'"
            @onClose="showModal = false" @onSave="showModal = false" @onContinue="showModal = false">
            <form class="w-[80%] my-5 mx-auto">
                                <div class="flex flex-col">
                                    <label for="full_name" class="font-medium text-sm mb-1">Full Name</label>
                                    <input type="text" v-model="personalInfo.full_name" placeholder="Full Name"
                                        class="form-input border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="email" class="font-medium text-sm mb-1">Email</label>
                                    <input type="email" v-model="personalInfo.email" placeholder="First Name"
                                        class="form-input border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="gender" class="font-medium text-sm mb-1">Gender</label>
                                    <select v-model="personalInfo.gender"
                                        class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="country" class="font-medium text-sm mb-1">Country</label>
                                    <select v-model="personalInfo.country"
                                        class="form-select border-[#E4E7E7] rounded-xl px-4 py-3 w-full">
                                        <option hidden>Select Country</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Nigeria">Nigeria</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="email" class="font-medium text-sm mb-1">Phone Number</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center mr-4">
                                            <select v-model="personalInfo.countryCode" id="countrycode" name="countrycode"
                                                class="h-full rounded-xl border-0 bg-transparent py-3 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                                <option>+234</option>
                                                <option>+254</option>
                                                <option>+1</option>
                                            </select>
                                        </div>
                                        <input v-model="personalInfo.phone" type="text" name="phone" id="phone"
                                            class="block w-full rounded-xl border-0 py-3 pl-20 pr-7 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="090...">
                                    </div>
                                </div>
                                <div class="flex flex-col mt-5">
                                    <label for="about" class="font-medium text-sm mb-1">About me</label>
                                    <textarea v-model="personalInfo.about" name="about" id="about"
                                        class="py-3 px-4 rounded-xl border-[#E4E7E7] form-textarea w-full" cols="30"
                                        rows="5"></textarea>
                                </div>
                            </form>
        </modal>
    </div>
</template>

<script>
import { reactive, ref } from 'vue';
import Icons from './components/Icons.vue';
import SideNav from './components/SideNav.vue';
import Navbar from './components/Navbar.vue';
import MultiSelect from 'primevue/multiselect';
import 'primevue/resources/themes/lara-light-teal/theme.css'
import Modal from './components/Modal.vue';

export default {
    components: { Icons, SideNav, Navbar, MultiSelect, Modal },
    setup() {
        const isExpanded = ref(localStorage.getItem('isExpanded') === "true");
        const editPersonalInfo = ref(false)
        const editWorkInfo = ref(false)
        const showModal = ref(false)

        const toggleMenu = () => {
            isExpanded.value = !isExpanded.value
            localStorage.setItem("isExpanded", isExpanded.value)
        }

        const personalInfo = reactive({
            full_name: "Beth Amarachi",
            email: "bethamarachi@gmail.com",
            gender: "Female",
            isGenderPublic: false,
            country: "Nigeria",
            phone: "9283924450",
            countryCode: "234",
            about: "I am a DevOps and Big Data engineer with 4 years experience and in-depth knowledge of R, Python, PowerBI and Tableau. I have an Msc. in Statistics and a big part of my career has been spent working at Jumia Nigeria, working as a BI Analyst and later a Commercial Planning Analyst."
        })

        const workInfo = reactive({
            employment_status: "Actively seeking opportunities",
            primary_role: "DevOps Engineer",
            portfolio: "https://amarachi.dev",
            prefered_work: ["Full-time", "Contract", "Remote"],
            relocation: true,
            years_of_experience: 8,
            prefered_salary: "13,500",
            secondary_roles: ["Data Engineer", "Cybersecurity"],
            notice_period: "3 weeks"
        })

        const workExperience = reactive([
            {
                title: "Software Engineer II, Mobile",
                company: "First bank",
                state: "Lagos",
                country: "Nigeria",
                start_month: "Jan",
                start_year: "2021",
                end_month: "",
                end_year: "",
                currently_there: true,
                accomplishment: `<ul>
                    <li>Extracted, analyzed, and interpreted data on key metrics, into meaningful and actional information using MS Excel, R and SQL to be proactive and give insight into nationwide stations backlogs, efficiency and overall business performance.</li>
<li>Collaborated with various stakeholders to develop and implement various KPIs and SLAs to improve overall business performance.</li>
<li>Extracted, analyzed, and interpreted data on key metrics, into meaningful and actional information using MS Excel, R and SQL to be proactive and give insight into nationwide stations backlogs, efficiency and overall business performance.</li>
<li>Collaborated with various stakeholders to develop and implement various KPIs and SLAs to improve overall business performance.</li>
                    </ul>`,
                selected: true
            },
            {
                title: "Software Engineer II, Mobile",
                company: "First bank",
                state: "Lagos",
                country: "Nigeria",
                start_month: "Jan",
                start_year: "2021",
                end_month: "",
                end_year: "",
                currently_there: true,
                accomplishment: `<ul>
                    <li>Extracted, analyzed, and interpreted data on key metrics, into meaningful and actional information using MS Excel, R and SQL to be proactive and give insight into nationwide stations backlogs, efficiency and overall business performance.</li>
<li>Collaborated with various stakeholders to develop and implement various KPIs and SLAs to improve overall business performance.</li>
<li>Extracted, analyzed, and interpreted data on key metrics, into meaningful and actional information using MS Excel, R and SQL to be proactive and give insight into nationwide stations backlogs, efficiency and overall business performance.</li>
<li>Collaborated with various stakeholders to develop and implement various KPIs and SLAs to improve overall business performance.</li>
                    </ul>`,
                selected: false
            },
        ])


        const removeSecondaryRoles = (index) => {
            workInfo.secondary_roles.splice(index, 1)
        }

        const removePreferedWork = (index) => {
            workInfo.prefered_work.splice(index, 1)
        }

        return {
            isExpanded,
            toggleMenu,
            editPersonalInfo,
            editWorkInfo,
            personalInfo,
            workInfo,
            workExperience,
            removePreferedWork,
            removeSecondaryRoles,
            showModal
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
        margin-left: calc(2rem + 0px);
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
}</style>
