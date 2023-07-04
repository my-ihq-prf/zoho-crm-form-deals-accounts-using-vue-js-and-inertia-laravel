
import consts from '@/src/consts.js'
import axios from '@/src/utils/axios.js'

export default function () {
   return {
      all: function () {
         return axios.get(`${consts.API_URL}/all-deals`).then(response => response.data)
      },
      allByAccId: function (data) {
         return axios.post(`${consts.API_URL}/all-deals-by-acc-id`, data).then(response => response.data)
      },
      create: function (data) {
         return axios.post(`${consts.API_URL}/add-deal`, data).then(response => response.data)
      },
      update: function (data) {
         return axios.post(`${consts.API_URL}/update-deal`, data).then(response => response.data)
      },
      delete: function (data) {
         return axios.post(`${consts.API_URL}/delete-deal`, data).then(response => response.data)
      }

   }
}
