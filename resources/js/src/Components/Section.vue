<script setup>
import ApplicationLogo from '@/src/Components/Assets/ApplicationLogo.vue'

// a computed ref

</script>
<template>

  <div class="w-full flex flex-col items-center">
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
      <div class="pt-10">
        <ApplicationLogo class="block h-24 w-auto" />
      </div>
      <slot name="header" />
    </div>

    <slot />

  </div>

</template>
