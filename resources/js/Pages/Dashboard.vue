<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
// import Welcome from '@/Jetstream/Welcome.vue'
import Main from '@/src/Layouts/Main.vue'
</script>

<template>
  <AppLayout title="Dashboard">
    <!--<template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>-->

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:pr-6 lg:pr-8">
        <div class="
              bg-white
            ">
          <Main />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
