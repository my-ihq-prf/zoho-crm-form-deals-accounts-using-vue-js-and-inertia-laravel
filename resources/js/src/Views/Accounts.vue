<script setup>
import { computed, ref } from 'vue'
import consts from '@/src/consts.js'
import JetDropdown from '@/Jetstream/Dropdown.vue'

import DialogPromt from '@/src/Views/Dialogs/Promt.vue'
import FormAccount from '@/src/Views/Forms/FormAccount.vue'

import { store } from '@/src/store'
// a computed ref
const mainAccounts = computed(() => {
   return store.mainAccounts
})

const onSortAccounts = (k, t) => {
   let mainAccountsSorted = store.mainAccounts
   if (k === 'phone') {
      mainAccountsSorted = store.mainAccounts.sort((a, b) => {
         const k = 'Phone'

         const aV = Number(a[k].replace(/[^\d]/gi, ''))
         const bV = Number(a[k].replace(/[^\d]/gi, ''))
         if (Number.isNaN(aV)) {
            return -1
         } else if (Number.isNaN(bV)) {
            return 1
         } else if (aV > bV) {
            return 1
         } else if (aV < bV) {
            return -1
         }
         return 0
      })
   } else if (k === 'name') {
      const k = 'Account_Name'
      mainAccountsSorted = store.mainAccounts.sort(function (a, b) {
         if (a[k] < b[k]) { return -1 }
         if (a[k] > b[k]) { return 1 }
         return 0
      })
   }
   Object.assign(store, { mainAccounts: t === 'desc' ? mainAccountsSorted : mainAccountsSorted.reverse() })
}

const refDialogPromt = ref()
const refDialogPromtButton = ref('')
const refDialogPromtHeader = ref('')

const refFormAccount = ref()

const formAccountCrud = ref('read')
const formAccountId = ref(-1)

const onNextFormAccount = ref()
const onCloseFormAccount = ref()

const onClickCrudBtn = (k, id) => {
   formAccountCrud.value = k
   formAccountId.value = id
   onNextFormAccount.value = () => refDialogPromt.value.show
   onCloseFormAccount.value = () => {
      refDialogPromt.value.close()
   }
   if (k === 'update') {
      refDialogPromtButton.value = 'Ok'
      refDialogPromtHeader.value = 'Edit Account'
   } else if (k === 'create') {
      refDialogPromtButton.value = 'Add'
      refDialogPromtHeader.value = 'New Account'
   } else if (k === 'delete') {
      refDialogPromtButton.value = 'Delete'
      refDialogPromtHeader.value = 'Delete Account'
   }
   refDialogPromt.value.show()
}
const onClickOkDialogPromt = () => {
   refFormAccount.value.submit(refDialogPromt.value.close)
}
const onClickAccount = (id) => {
   store.mainAccountDeals = []
   consts.viewsRoute('account')
   store.mainAccountId = id
}

</script>

<template>

  <!-- component -->
  <div class="w-full overflow-hidden rounded-lg border border-gray-200 shadow-md m-5 max-w-4xl">

    <div v-if="mainAccounts.length" class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead
          class="text-xs text-gray-700 uppercase border-b border-gray-200 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center pl-6">
                Name
                <JetDropdown align="left" width="48">
                  <template #trigger>
                    <div class="cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1"
                        aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                        <path
                          d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                      </svg></div>
                  </template>
                  <template #content>
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      sort by "name"
                    </div>
                    <div class="border-t border-gray-100" />

                    <button @click="onSortAccounts('name','asc')"
                      class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                      ASC
                    </button>
                    <button @click="onSortAccounts('name','desc')"
                      class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                      DESC
                    </button>
                  </template>
                </JetDropdown>
              </div>

            </th>
            <th scope="col" class="px-6 py-3">
              <div class="flex items-center pl-6">
                phone
                <JetDropdown align="left" width="48">
                  <template #trigger>
                    <div class="cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1"
                        aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                        <path
                          d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                      </svg></div>
                  </template>
                  <template #content>
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      sort by "phone"
                    </div>
                    <div class="border-t border-gray-100" />

                    <button @click="onSortAccounts('phone','asc')"
                      class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                      ASC
                    </button>
                    <button @click="onSortAccounts('phone','desc')"
                      class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                      DESC
                    </button>
                  </template>
                </JetDropdown>
              </div>
            </th>
            <th scope="col" class="px-6 py-3"></th>
          </tr>
        </thead>
        <tbody>

          <tr v-for="(acc,index) in mainAccounts" :key="index" @click="onClickAccount(acc.id)"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cursor-pointer hover:bg-gray-50">
            <th scope="row" class="flex gap-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <div class="relative h-8 w-8">

                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" stroke-linecap="round"
                  stroke-linejoin="round" stroke-width="50" viewBox="-30 -30 1096.7 1097.1">
                  <path
                    d="m469.53 1020.9c-197.22-14.156-377.83-153.21-441.18-340.62-58.291-165.1-25.558-359.57 87.679-493.99 102.79-127.23 269.18-197.99 432.11-184.73 215.43 11.447 410 176.64 459.01 386.35 38.089 155.21 0.9073 327.74-103.22 450.04-100.47 122.6-260.27 192.78-418.57 183.22l-10.651-0.088zm97.333-25.078c208.43-20.877 389.67-191.28 424.11-397.67 34.072-179.32-42.625-373.55-191.16-480.08-168.25-128.17-420.66-125.6-586.12 6.2309-156.44 116.98-227.89 332.69-172.2 519.89 51.257 189.08 226.49 336.16 421.98 352.34 34.292 3.9503 69.061 1.5844 103.39-0.71247zm-336.69-165.29c-28.697-41.833-10.941-106.91-6.6623-156.49 20.976-81.575 94.765-144.57 177.91-155.48 66.459 38.51 152.44 38.557 218.9 0 105.89 12.551 176.21 113.07 184.67 220.29 6.7189 85.107 1.0104 93.584-56.578 95.822-171.61 6.6688-346.53-0.87398-518.24-4.1436zm250.02-310.69c-104.68-14.566-180.88-126.31-155.38-229.03 20.316-102.36 133.65-172.22 234.16-143.28 100.31 23.757 165.76 137 135.29 235.78-24.723 91.481-120.4 152.7-214.07 136.53z">
                  </path>
                </svg>

                <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
              </div>
              <div class="text-sm">
                <div class="font-medium text-gray-700"> {{acc.Account_Name}}</div>
                <div class="text-gray-400"> {{acc.Website}}</div>
              </div>
            </th>
            <td class="px-6 py-4">
              {{acc.Phone}}
            </td>
            <td class="px-6 py-4 text-right">
              <div class="flex justify-end gap-2">
                <button @click.stop="onClickCrudBtn('delete',acc.id)"
                  class="border border-gray-200 rounded-full p-2 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </button>

                <button @click.stop="onClickCrudBtn('update',acc.id)"
                  class="border border-gray-200 rounded-full p-2 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                  </svg>
                </button>
              </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>

    <DialogPromt ref="refDialogPromt" :button="refDialogPromtButton" @ok="onClickOkDialogPromt">
      <template v-slot:header>
        {{refDialogPromtHeader}}
      </template>
      <FormAccount ref="refFormAccount" :crud="formAccountCrud" :id="formAccountId" :on-next="onNextFormAccount"
        :on-close="onCloseFormAccount" />
    </DialogPromt>
  </div>

</template>
