// store.js
import { reactive } from 'vue'

export const store = reactive({
   sideBarOpen: true,
   mainCmpN: 'dashboard',
   mainAccountId: '',
   accActive: null,
   mainAccounts: [],
   mainAccountDeals: [],
   showDlgAddNewAccount: false,
   dlgIsLoaded: false
})
