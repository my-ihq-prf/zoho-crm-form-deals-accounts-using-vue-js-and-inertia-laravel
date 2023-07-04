
<script setup>

import { useForm } from '@inertiajs/inertia-vue3'

import consts from '@/src/consts.js'

import JetInput from '@/Jetstream/Input.vue'
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import useAccounts from '@/src/Composables/API/private/use-accounts.js'

const form = useForm({
   Account_Name: 'Austyn Brakus',
   Website: 'adoppo.com',
   Phone: '+1-230-541-8578'
})

const submit = (_onSuccess) => {
   consts.setStateDlgLoaded(true)
   useAccounts().create({ ...form }).then((data) => {
      consts.setStateDlgLoaded(false)
      consts.refresMainAccounts()
      _onSuccess()
      consts.notyf.success(`The app has successfully created the account with ID:${form.Account_Name}`)
   }).catch(e => { consts.setStateDlgLoaded(false) })
}

defineExpose({ onSubmit: submit })
</script>
<template>

  <div class="flex flex-col items-center">
    <div class="pt-5">

      <svg class="w-16 h-16 text-gray-400" viewBox="0 0 115.34 122.88" fill="none" stroke="currentColor"
        stroke-linecap="round" stroke-linejoin="round" stroke-width="3">

        <path
          d="M57.34,116.35a3.27,3.27,0,0,1,0,6.53H7.6a7.61,7.61,0,0,1-7.6-7.6V7.6A7.61,7.61,0,0,1,7.6,0H98.36A7.61,7.61,0,0,1,106,7.6v54a10.65,10.65,0,0,1-.09,1.43h-.66l0,0h-.42l-.09,0,0,0h0l-.09,0-.08,0,0,0h0l-.08,0h0l-.09,0,0,0h0l-.08,0h0l-.09,0,0,0h0l-.08,0h0l-.08,0h-.08l-.09,0h0l-.08,0,0,0h0l-.08,0h0l-.08,0h-.09l-.08,0h0l-.08,0h0l0,0-.08,0h0l-.08,0h-.34l-.07,0h0l-.08,0h-.08l-.08,0H99.43V7.6a1.09,1.09,0,0,0-1.07-1.07H7.6a1.11,1.11,0,0,0-.76.31,1.13,1.13,0,0,0-.31.76V115.27a1,1,0,0,0,.32.75,1.12,1.12,0,0,0,.76.32Zm35.05.13L76,122.08l.13-18.25,16.29,12.65ZM80.73,97.72l17.68-24a1.6,1.6,0,0,1,1.91-.56L114.8,84a1.38,1.38,0,0,1,.15,2.06L97,110.38,80.73,97.72ZM29.13,62.84a6.51,6.51,0,0,1-.2-3.36c.46-3.55,1.38-4.21,4.66-5.12,3.68-1,7.84-1.09,11-3.27a10.9,10.9,0,0,0,.74-1.43c.37-.85.71-1.77.92-2.4a30.53,30.53,0,0,1-2.42-3.45l-2.45-3.9A7.17,7.17,0,0,1,40,36.35a2.85,2.85,0,0,1,.25-1.28,2.31,2.31,0,0,1,.84-1,1.93,1.93,0,0,1,.59-.3,62.62,62.62,0,0,1-.12-7,9.88,9.88,0,0,1,.3-1.59A9.43,9.43,0,0,1,46,19.93a13,13,0,0,1,3.47-1.54c.78-.22-.67-2.71.14-2.79,3.89-.4,10.18,3.15,12.9,6.09a9.47,9.47,0,0,1,2.39,6l-.15,6.36h0A1.74,1.74,0,0,1,66,35.38a5.44,5.44,0,0,1-.67,3.34h0l0,.09-2.8,4.59a23.76,23.76,0,0,1-3.42,4.72l.38.54A16.81,16.81,0,0,0,61.27,51a.16.16,0,0,1,.06.08c2.36,1.66,7.2,2.4,10.79,3.34,3,.79,4.1,1,4.77,4.28.34,1.62.35,3.4-.09,4.13ZM26.67,97.89a3.31,3.31,0,0,1,0-6.61H71l0,0,0,0h0l0,0v0l0,0,0,0h0l-.06.09h0v0l0,0v0l0,0h0l0,.05h0l0,0v0l0,0v0l0,0h0l0,0h0l0,0v0l0,0h0l0,0h0l0,0h0l0,0v0l0,0v0l0,0h0l0,.05h0l0,0v0l0,0h0l0,0h0l0,0h0l0,0v0l0,0h0l0,0h0l0,0v0l0,0V93h0l0,0h0l0,0v.13h0l0,0h0l0,0h0v0l0,0v0l0,0h0l0,0h0l0,0v.08h0l0,0h0l0,0h0V94h0l0,0h0v.12h0v0l-.07,0-.06,0h0l-.06,0-.06,0h0l0,0-.06,0,0,0,0,0-.06,0,0,0h0l-.06,0,0,0h0l-.07.05-.06,0h0l-.06,0-.06.06h0l-.05,0-.06,0,0,0,0,0-.06.05,0,0,0,0-.06,0,0,0h0l-.06.06-.05,0h0l-.06.06,0,0h0l0,0-.06.06h0l0,0-.06.06,0,0,0,0,0,.06,0,0,0,0,0,.06,0,.05h0l0,.06,0,0h0l-.06.06,0,.06h0l-.05,0,0,.06v0l0,0,0,.06,0,0,0,0-.05.06,0,0,0,0,0,.06,0,0h0l0,.07,0,.06h0l0,.07,0,.06h0l-.05.06,0,.06v0l0,0,0,.07,0,0,0,0,0,.07,0,0,0,0,0,.07,0,0h0l0,.07,0,.07h0l0,.07Zm1.27-18.16a3.27,3.27,0,1,1,0-6.53H75.78a3.27,3.27,0,1,1,0,6.53Z" />
      </svg>

    </div>
    <JetValidationErrors class="mb-4" />

    <form @submit.prevent="onSubmit" class="w-full max-w-md py-8">

      <div>
        <JetLabel for="name" value="Name" />
        <JetInput id="name" v-model="form.Account_Name" type="text" class="mt-1 block w-full" required autofocus
          autocomplete="name" />
      </div>

      <div class="mt-4">
        <JetLabel for="website" value="Website" />
        <JetInput id="website" v-model="form.Website" type="text" class="mt-1 block w-full" required autofocus
          autocomplete="website" />
      </div>
      <div class="mt-4">
        <JetLabel for="phone" value="Phone" />
        <JetInput id="phone" v-model="form.Phone" type="text" class="mt-1 block w-full" required autofocus
          autocomplete="phone" />
      </div>

      <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
        <JetLabel for="terms">
          <div class="flex items-center">
            <JetCheckbox id="terms" name="terms" />

            <div class="ml-2">
              I agree to the <a target="_blank" :href="route('terms.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank"
                :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy
                Policy</a>
            </div>
          </div>
        </JetLabel>
      </div>

    </form>

  </div>
</template>
