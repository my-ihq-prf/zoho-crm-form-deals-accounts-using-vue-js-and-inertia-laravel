<script setup>
import { computed, ref } from 'vue'

import DialogPromt from '@/src/Views/Dialogs/Promt.vue'
import FormDeal from '@/src/Views/Forms/FormDeal.vue'

import consts from '@/src/consts.js'
import { store } from '@/src/store'

import useDeals from '@/src/Composables/API/private/use-deals.js'
import axios from '@/src/utils/axios.js'

const mainAccount = computed(() => {
   if (store.mainAccountId) {
      const acc = store.mainAccounts.find(_acc => _acc.id === store.mainAccountId)
      if (acc && acc.id) {
         return acc
      }
   }
   return null
})

const accountDeals = computed(() => {
   if (store.mainAccountDeals && store.mainAccountDeals.length) {
      if (mainAccount.value) {
         return store.mainAccountDeals
      }
   }
   return []
})
const onClickBack = (cmpN) => {
   consts.viewsRoute(cmpN)
}

const refDialogPromt = ref()
const refDialogPromtButton = ref('')
const refDialogPromtHeader = ref('')

const refFormDeal = ref()

const formDealCrud = ref('read')
const formDealItm = ref(null)
const formDealAcc = ref(null)

const onNextFormDeal = ref()
const onCloseFormDeal = ref()

const onClickCrudBtn = (k, itm) => {
   formDealCrud.value = k

   formDealItm.value = itm
   formDealAcc.value = {

      name: mainAccount.value.Account_Name,
      id: mainAccount.value.id

   }

   onNextFormDeal.value = () => refDialogPromt.value.show
   onCloseFormDeal.value = () => {
      refDialogPromt.value.close()
   }
   if (k === 'update') {
      refDialogPromtButton.value = 'Ok'
      refDialogPromtHeader.value = 'Edit Deal'
   } else if (k === 'create') {
      refDialogPromtButton.value = 'Add'
      refDialogPromtHeader.value = 'New Deal'
   } else if (k === 'delete') {
      refDialogPromtButton.value = 'Delete'
      refDialogPromtHeader.value = 'Delete Deal'
      onNextFormDeal.value = () => {
         console.log('Delete Deal')
         refresMainDeals(mainAccount.value)
      }
   }
   refDialogPromt.value.show()
}
const onClickOkDialogPromt = () => {
   refFormDeal.value.submit(() => {
      refresMainDeals(mainAccount.value)
      refDialogPromt.value.close()
   })
}
const refresMainDeals = (acc) => {
   useDeals().all().then(({ data, info }) => {
      if (info.count) {
         if (typeof ok === 'function') {
         // ok(data)
         }
         axios.get('https://randomuser.me/api?results=1&inc=picture').then(({ data: { results, info } }) => {
            if (info.results) {
               randomUserPicture.value = results[0].picture.large
            }
         })

         store.mainAccountDeals = data.map(d => {
            return ['Account_Name', 'Deal_Name', 'Stage', 'Amount', 'Closing_Date', 'id'].reduce((carry, key) => {
               carry[key] = d[key]
               return carry
            }, {})
         }).filter(_d => _d.Account_Name.id === acc.id)
      }
   })
}

const randomUserPicture = ref('https://randomuser.me/api/portraits/men/32.jpg')
// randomPicsumPhotos = ref('https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80')
if (mainAccount.value) {
   refresMainDeals(mainAccount.value)
}

</script>

<template>

  <!-- component -->
  <div class="w-full overflow-hidden rounded-lg border border-gray-200 shadow-md m-5 max-w-4xl">

    <div v-if="mainAccount" class="relative overflow-x-auto shadow-md sm:rounded-lg p-7">

      <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Account[All in one]</h5>
      </a>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
        acquisitions of 2021 so far.</p>
      <button @click="onClickBack('accounts')"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

        <svg aria-hidden="true" class="w-4 h-4
        -ml-1 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path
            d="m9.7068 3.293a1 1 0 0 0-1.414 0l-6 6a1 1 0 0 0 0 1.414l6 6a1 1 0 0 0 1.414-1.414l-4.293-4.293h11.586a1 1 0 1 0 0-2h-11.586l4.293-4.293a1 1 0 0 0 0-1.414z"
            clip-rule="evenodd" fill-rule="evenodd" />
        </svg>
        Back
      </button>

      <article class="mb-4 break-inside p-6 rounded-xl bg-white dark:bg-slate-800 flex flex-col bg-clip-border">
        <div class="flex pb-6 items-center justify-between">
          <div class="flex">
            <a class="inline-block mr-4" href="#">
              <img class="rounded-full max-w-none w-14 h-14" :src="randomUserPicture">
            </a>
            <div class="flex flex-col">
              <div class="flex items-center">
                <a class="inline-block text-lg font-bold mr-2" href="#">{{mainAccount.Account_Name}}</a>
              </div>
              <div class="text-slate-500 dark:text-slate-300">
                {{mainAccount.Website}}
              </div>
            </div>
          </div>
        </div>
        <h2 class="text-3xl font-extrabold">
          Linked Deals
        </h2>
        <div class="py-4">
          <p>
            Manage your leads, contacts, and deals more effectively and efficiently!
          </p>
        </div>
        <div class="w-full h-0 inline-flex justify-end">
          <div class="relative top-[-4.65rem]">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="#4f46e5"
              class="w-14 h-14 cursor-pointer" stroke-width="1.2" @click="onClickCrudBtn('create',{})">
              <path
                d="M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10">
              </path>
            </svg>
          </div>
        </div>

        <!--   <div class="py-4">
          <a class="inline-flex items-center" href="#">
            <span class="mr-2">
              <svg class="fill-rose-600 dark:fill-rose-400" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                <path
                  d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                </path>
              </svg>
            </span>
            <span class="text-lg font-bold">15</span>
          </a>
        </div>
        <div class="relative">
          <input
            class="pt-2 pb-2 pl-3 w-full h-11 bg-slate-100 dark:bg-slate-600 rounded-lg placeholder:text-slate-600 dark:placeholder:text-slate-300 font-medium pr-20"
            type="text" placeholder="Write a comment">
          <span class="flex absolute right-3 top-2/4 -mt-3 items-center">
            <svg class="mr-2" style="width: 26px; height: 26px;" viewBox="0 0 24 24">
              <path fill="currentColor"
                d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z">
              </path>
            </svg>
            <svg class="fill-blue-500 dark:fill-slate-50" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
              <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
            </svg>
          </span>
        </div>-->
      </article>

      <div class="flex justify-center pt-4 pb-12 overflow-x-auto">

        <div v-for="(d,index) in accountDeals" :key="index" class="py-2 px-2">
          <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
            <!--    <div class="w-1/3 bg-cover" style="background-image: url('https://picsum.photos/200/300')">
            </div> -->
            <div class="w-full min-w-[17em] p-4 max-w-[22em]">
              <div class="w-full h-0">
                <p class=" text-gray-600 text-sm relative top-[-14.5px] left-[-10px]">{{d.Closing_Date}}</p>
              </div>

              <h1 class="text-gray-900 font-bold text-2xl">{{d.Deal_Name}}</h1>
              <p class="mt-2 text-gray-600 text-sm">{{d.Stage}}</p>
              <div class="flex item-center mt-2">
                <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                  <path
                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
                <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                  <path
                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
                <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                  <path
                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
                <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                  <path
                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
                <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                  <path
                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
              </div>
              <div class="flex item-center justify-between mt-3">
                <h1 class="text-gray-700 font-bold text-xl">$ {{d.Amount}}</h1>
                <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Done</button>
              </div>
              <div class="w-full text-end h-0">
                <div class="inline-flex justify-end gap-2  relative top-[-1.7em] left-[-4.2em]">
                  <button @click="onClickCrudBtn('delete',d)"
                    class="border border-gray-200 rounded-full pt-[0.12rem] pl-[0.18rem] h-7 w-7 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"><svg
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                      </path>
                    </svg></button><button @click="onClickCrudBtn('update',d)"
                    class="border border-gray-200 rounded-full pt-[0.01rem] pl-[0.28rem] h-7 w-7 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"><svg
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125">
                      </path>
                    </svg></button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="pt-4">
        <p class="text-gray-500 dark:text-gray-400">Track work across the enterprise through an open, collaborative
          platform. Link issues across CRM and ingest data from other software development tools, so your IT support and
          operations teams have richer contextual information to rapidly respond to requests, incidents, and changes.
        </p>
        <div class="inline-flex items-center justify-center w-full">
          <hr class="w-64 h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
          <span
            class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">or</span>
        </div>
        <p class="text-gray-500 dark:text-gray-400">Deliver great service experiences fast - without the complexity of
          traditional ITSM solutions.Accelerate critical development work, eliminate toil.</p>
        <div class="h-4"></div>
      </div>
    </div>

    <DialogPromt ref="refDialogPromt" :button="refDialogPromtButton" @ok="onClickOkDialogPromt">
      <template v-slot:header>
        {{refDialogPromtHeader}}
      </template>
      <FormDeal ref="refFormDeal" :crud="formDealCrud" :itm="formDealItm" :on-next="onNextFormDeal" :acc=formDealAcc
        :on-close="onCloseFormDeal" />
    </DialogPromt>
  </div>

</template>
