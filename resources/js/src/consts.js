import { Notyf } from 'notyf'

import { store } from '@/src/store'

import useAccounts from '@/src/Composables/API/private/use-accounts.js'
export default {
   API_URL: '/api/zoho',
   notyf: new Notyf({
      duration: 10000,
      position: {
         x: 'right',
         y: 'bottom'
      },
      dismissible: true
   }),
   refresMainAccounts: (ok) => useAccounts().getAll().then(({ data, info }) => {
      if (info.count) {
         if (typeof ok === 'function') {
            ok(data)
         }
         store.mainAccounts = data
      }
   }),
   viewsRoute: (cmpN) => {
      // Inertia.post(route('logout'))
      store.mainCmpN = cmpN
   },
   setStateDlgLoaded: (on) => {
      store.dlgIsLoaded = on
   }

}
