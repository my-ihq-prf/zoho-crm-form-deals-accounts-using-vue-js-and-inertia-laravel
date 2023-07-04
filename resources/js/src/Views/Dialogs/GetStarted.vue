<script setup>
import { computed } from 'vue'
import { store } from '@/src/store'

import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import JetButton from '@/Jetstream/Button.vue'
import DialogModal from '@/src/Components/Override/DialogModal.vue'
const emit = defineEmits(['submitted'])
defineProps({
   button: {
      type: String,
      default: 'Confirm'
   }
})
const showDlgAddNewAccount = computed(() => {
   return store.showDlgAddNewAccount
})
const closeDlgAddNewAccount = () => {
   store.showDlgAddNewAccount = false
}
const onDlgAddNewAccount = () => {
   // store.showDlgAddNewAccount = false
   emit('submitted')
}
defineExpose({ close: closeDlgAddNewAccount })
</script>

<template>

  <DialogModal :show="showDlgAddNewAccount" @close="closeDlgAddNewAccount">
    <template #title>
      <slot name="header" />
    </template>

    <template #content>
      <slot />

      <div class="mt-4">

      </div>
    </template>

    <template #footer>
      <JetSecondaryButton @click="closeDlgAddNewAccount">
        Cancel
      </JetSecondaryButton>
      <!--  <JetButton class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
            @click="confirmPassword">
            {{ button }}
          </JetButton> -->
      <JetButton class="ml-3" @click="onDlgAddNewAccount">
        {{ button }}
      </JetButton>
    </template>
  </DialogModal>
</template>
