<template>
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-20 sm:w-full sm:max-w-2xl sm:max-h-[80vh]">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start w-full">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full overflow-y-auto h-full">
                                <div class="fixed flex justify-between py-2 mb-4 border-b w-full">
                                    <h3 class="text-2xl font-semibold leading-6 text-gray-900" id="modal-title">{{ title }}
                                    </h3>
                                </div>
                                <div class="overflow-y-scroll h-[100vh]">
                                    <slot></slot>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white fixed w-full p-4 flex justify-between border-t sm:px-6">
                        <button type="button" class="bg-secondary text-gray-900 px-3 py-2 rounded-lg"
                            @click="closeModal">Cancel</button>
                        <div>
                            <button v-if="multiple" type="button"
                                class="border bg-transparent border-primary px-3 py-2 rounded-lg text-primary mr-2"
                                @click="addNew">Save and add another</button>
                            <button type="button" class="bg-primary px-3 py-2 rounded-lg text-white" @click="saveContent">{{
                                buttonLabel }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineEmits } from 'vue'

export default {
    name: "ModalComponent",
    props: ['title', 'multiple', 'buttonLabel'],
    setup(props, { emit }) {

        function closeModal() {
            emit('onClose')
        }

        const saveContent = () => {
            emit('onSave')
        }
        function addNew() {
            emit('onContinue')
        }

        return {
            closeModal,
            saveContent,
            addNew
        }
    }
}
</script>

<style></style>
