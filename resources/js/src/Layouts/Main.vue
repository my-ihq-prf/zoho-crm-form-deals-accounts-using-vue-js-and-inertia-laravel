<script setup>
import { computed, ref } from 'vue'
import consts from '@/src/consts.js'
import { store } from '@/src/store'

import Sidebar from '@/src/Components/Sidebar.vue'
import Section from '@/src/Components/Section.vue'
import Dashboard from '@/src/Views/Dashboard.vue'
import Accounts from '@/src/Views/Accounts.vue'
import Account from '@/src/Views/Account.vue'

import ButtonGetStarted from '@/src/Components/Buttons/GetStarted.vue'
import DialogGetStarted from '@/src/Views/Dialogs/GetStarted.vue'
import AddNewAccount from '@/src/Views/Forms/AddNewAccount.vue'

// a computed ref
const mainCmpN = computed(() => {
   return store.mainCmpN
})

const mainAccounts = computed(() => {
   return store.mainAccounts
})
const mainAccount = computed(() => {
   return store.mainAccount
})

defineProps({
   title: {
      type: String,
      default: 'Confirm Password'
   },
   content: {
      type: String,
      default: 'For your security, please confirm your password to continue.'
   },
   button: {
      type: String,
      default: 'Confirm'
   }
})

const refAddNewAccount = ref()
const refDialogGetStarted = ref()

const onDialogGetStartedSubmitted = () => {
   refAddNewAccount.value.onSubmit(refDialogGetStarted.value.close)
}
consts.refresMainAccounts()

</script>
<template>
  <div class="flex">
    <Sidebar />

    <Section>
      <template v-slot:header>
        <!-- content for the header slot -->
        <div v-if="mainCmpN==='dashboard'">

          <div>

            <div class="bg-white relative  p-4 pb-5 lg:pt-16 dark:bg-gray-900">
              <div class="relative xl:container m-auto px-6 md:px-12 lg:px-6">
                <h1
                  class="sm:mx-auto sm:w-10/12 md:w-2/3 font-black text-blue-900 text-4xl text-center sm:text-5xl md:text-6xl lg:w-auto lg:text-left xl:text-7xl dark:text-white">
                  Run successful remote and <br class="lg:block hidden"> <span
                    class="relative text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300">Hybrid
                    teams</span>.</h1>
                <div class="pt-10 pl-10">
                  <ButtonGetStarted> Get Started</ButtonGetStarted>
                </div>
                <div class="lg:flex">
                  <div
                    class="relative z-10 mt-8 md:mt-16 space-y-8 sm:w-10/12 md:w-2/3 lg:ml-0 sm:mx-auto text-center lg:text-left lg:mr-auto lg:w-7/12">
                    <p class="sm:text-lg text-gray-700 dark:text-gray-300 lg:w-11/12">
                      CRM takes chat and collaboration to the next level: daily standups, team check-ins, surveys,
                      kudos, best companion bot for your virtual watercooler, 1:1 intros, motivation tracking and more.
                    </p>
                    <span class="block font-semibold text-gray-500 dark:text-gray-400">The best companion bot for your
                      chat app.</span>
                    <div
                      class="grid grid-cols-3 space-x-4 md:space-x-6 md:flex md:justify-center lg:justify-start flex-wrap gap-3 whitespace-nowrap">
                      <a aria-label="add to slack" href="#"
                        class="p-4 border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-full duration-300 hover:border-cyan-400 hover:shadow-lg hover:shadow-cyan-600/20 dark:hover:border-cyan-300/30">
                        <div class="flex justify-center space-x-4">
                          <img class="w-6 h-6"
                            src="https://tailus.io/sources/blocks/tech-startup/preview/images/slack.png"
                            alt="slack logo" loading="lazy" width="128" height="128">
                          <span class="hidden font-medium md:block dark:text-white">Slack</span>
                        </div>
                      </a>
                      <a aria-label="add to chat" href="#"
                        class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-full duration-300 hover:border-green-400 hover:shadow-lg hover:shadow-lime-600/20 dark:hover:border-green-300/30">
                        <div class="flex justify-center space-x-4">
                          <img class="w-6 h-6"
                            src="https://tailus.io/sources/blocks/tech-startup/preview/images/chat.png" alt="chat logo"
                            loading="lazy" width="128" height="128">
                          <span class="hidden font-medium md:block dark:text-white">Google Chat</span>
                        </div>
                      </a>
                      <a aria-label="add to zoom" href="#"
                        class="p-4 border border-gray-200 dark:bg-gray-800  dark:border-gray-700 rounded-full duration-300 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-600/20 dark:hover:border-blue-300/30">
                        <div class="flex justify-center space-x-4">
                          <img class="w-6 h-6"
                            src="https://tailus.io/sources/blocks/tech-startup/preview/images/zoom.png" alt="chat logo"
                            loading="lazy" width="128" height="128">
                          <span class="hidden font-medium md:block dark:text-white">Zoom</span>
                        </div>
                      </a>
                    </div>

                    <div class="dark:text-gray-300">
                      🔥🌟
                      <span>Other integrations :</span>
                      <a href="#" class="font-semibold text-gray-700 dark:text-gray-200">Discord,</a>
                      <a href="#" class="font-semibold text-gray-700 dark:text-gray-200">Telegram</a>
                    </div>

                    <div class="pt-12 flex gap-6 lg:gap-12 justify-between grayscale lg:w-2/3">
                      <img src="https://tailus.io/sources/blocks/tech-startup/preview/images/clients/airbnb.svg"
                        class="h-8 sm:h-10 w-auto lg:h-12" alt="">
                      <img src="https://tailus.io/sources/blocks/tech-startup/preview/images/clients/ge.svg"
                        class="h-8 sm:h-10 w-auto lg:h-12" alt="">
                      <img src="https://tailus.io/sources/blocks/tech-startup/preview/images/clients/coty.svg"
                        class="h-8 sm:h-10 w-auto lg:h-12" alt="">
                      <img src="https://tailus.io/sources/blocks/tech-startup/preview/images/clients/microsoft.svg"
                        class="h-8 sm:h-10 w-auto lg:h-12" alt="">
                    </div>
                  </div>
                  <div class="mt-12 md:mt-0 lg:absolute -right-10 lg:w-7/12">
                    <div class="relative z-0  w-full">
                      <div aria-hidden="true"
                        class="absolute scale-75 md:scale-110 inset-0 m-auto w-full h-full md:w-96 md:h-96 rounded-full rotate-45 bg-gradient-to-r from-sky-500 to-cyan-300 blur-3xl">
                      </div>
                      <img src="https://tailus.io/sources/blocks/tech-startup/preview/images/globalization-cuate.svg"
                        class="relative w-full" alt="wath illustration" loading="lazy" width="320" height="280">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-6 text-gray-500">
              Are you looking for a way to streamline your sales process and boost your productivity?
              Do you want to manage your leads, contacts, and deals more effectively and efficiently?
              If so, you need a CRM that can help you achieve your goals and grow your business.
            </div>
            <div class="pt-10 pl-10 flex justify-center">

              <ButtonGetStarted> Get Started</ButtonGetStarted>
            </div>
            <div class="mt-12 mb-8 pr-5 text-3xl font-bold text-transparent
            bg-clip-text bg-gradient-to-r from-indigo-600
            to-pink-700
            dark:from-indigo-400 dark:to-violet-300
            text-center

            ">
              CRM is a powerful tool that allows you to organize, track,
              and analyze your customer interactions and sales activities. With CRM , you can:</div>

          </div>
          <div>
            <div class="mt-8 text-2xl">
              Welcome to your CRM app!
            </div>
            <div class="mt-6 text-gray-500 ">
              Welcome to our CRM site, where you can manage your customer relationships with ease
              and efficiency. Whether you need to track leads, contacts, accounts,
              opportunities, or campaigns, our CRM site has the tools and features
              you need to grow your business and satisfy your customers.
              You can also access analytics, reports, dashboards, and integrations
              with other platforms to enhance your CRM experience.
              Our CRM site is designed to be user-friendly, customizable, and scalable,
              so you can adapt it to your specific needs and goals. Thank you for choosing
              our CRM site as your partner in customer success.
              We hope you enjoy using it as much as we enjoy creating it for you.
            </div>
          </div>
        </div>
      </template>
      <Dashboard v-if="mainCmpN==='dashboard'" />
      <Accounts v-if="mainCmpN==='accounts' && mainAccounts.length" />
      <Account v-if="mainCmpN==='account' && mainAccounts.length" />
      <!-- Default Modal -->
      <!-- -->
      <DialogGetStarted ref="refDialogGetStarted" :button="'Add'" @submitted="onDialogGetStartedSubmitted">
        <template v-slot:header>
          New Account
        </template>
        <AddNewAccount ref="refAddNewAccount" />
      </DialogGetStarted>

    </Section>

  </div>
</template>
