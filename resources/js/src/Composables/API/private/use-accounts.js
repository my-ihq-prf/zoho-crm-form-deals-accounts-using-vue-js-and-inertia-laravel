
import consts from '@/src/consts.js'
import axios from '@/src/utils/axios.js'

export default function () {
   return {
      getAll: function () {
         return axios.get(`${consts.API_URL}/all-accounts`).then(response => response.data)
      },
      create: function (data) {
         return axios.post(`${consts.API_URL}/add-new-account`, data).then(response => response.data)
      },
      update: function (data) {
         return axios.post(`${consts.API_URL}/update-account`, data).then(response => response.data)
      },
      delete: function (data) {
         return axios.post(`${consts.API_URL}/delete-account`, data).then(response => response.data)
      }

   }
}
