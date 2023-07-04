<script setup>

import { store } from '@/src/store'

const onClick = () => {
   store.showDlgAddNewAccount = true
}

</script>

<template>
  <button data-modal-target="modal-get-started" data-modal-toggle="modal-get-started" @click="onClick" class="relative inline-flex items-center justify-center p-1 mb-2 mr-2 overflow-hidden
                font-medium text-gray-900 group bg-gradient-to-br from-purple-600 to-blue-500
                group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4
                focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 rounded-2xl text-3xl ">
    <span class=" relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900
                group-hover:bg-opacity-0 rounded-xl">
      <slot />
    </span>
  </button></template>
