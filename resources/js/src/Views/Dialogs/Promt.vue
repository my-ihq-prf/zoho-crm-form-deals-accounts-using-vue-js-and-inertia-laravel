<script setup>
import { ref } from 'vue'
import DialogModal from '@/src/Components/Override/DialogModal.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import JetButton from '@/Jetstream/Button.vue'

const emit = defineEmits(['ok'])

defineProps({
   button: {
      type: String,
      default: 'Confirm'
   }
})
const refDialog = ref()
const show = ref(false)

const onShowPromt = () => {
   show.value = true
}
const onClosePromt = () => {
   show.value = false
}

defineExpose({ show: onShowPromt, close: onClosePromt })

const onClickOkDlgPromt = () => {
   emit('ok')
}
</script>

<template>

  <DialogModal :show="show" ref="refDialog">
    <template #title>
      <slot name="header" />
    </template>

    <template #content>
      <slot />

      <div class="mt-4">

      </div>
    </template>

    <template #footer>
      <JetSecondaryButton @click="onClosePromt">
        Cancel
      </JetSecondaryButton>
      <!--  <JetButton class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
            @click="confirmPassword">
            {{ button }}
          </JetButton> -->
      <JetButton class="ml-3" @click="onClickOkDlgPromt">
        {{ button }}
      </JetButton>
    </template>
  </DialogModal>
</template>
