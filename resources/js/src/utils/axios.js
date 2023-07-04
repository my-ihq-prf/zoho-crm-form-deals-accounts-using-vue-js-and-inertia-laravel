// import { AxiosResponse, default as Axios } from 'axios'
import axios from 'axios'
import consts from '@/src/consts.js'
// import { urlWithoutHash } from '@/src/utils/url.js'
const instance = axios.create()

// Add a request interceptor
axios.interceptors.request.use(function (config) {
   // Do something before request is sent
   return config
}, function (error) {
   // Do something with request error
   consts.notyf.error(`axios Request was: Error ${JSON.stringify(error)} :${JSON.stringify({ axios: this })}`)
   return Promise.reject(error)
})

// Add a response interceptor
axios.interceptors.response.use(function (response) {
   // Any status code that lie within the range of 2xx cause this function to trigger
   // Do something with response data
   return response
}, function (error) {
   // Any status codes that falls outside the range of 2xx cause this function to trigger
   // Do something with response error
   consts.notyf.error(`axios Response was: Error ${JSON.stringify(error)}} :${JSON.stringify({ axios: this })}`)
   return Promise.reject(error)
})

const onUploadProgress = (progressEvent) => {
   const { loaded, total } = progressEvent
   const percent = Math.floor((loaded * 100) / total)
   if (percent < 100) {
      console.log(`${loaded} bytes of ${total} bytes. ${percent}%`)
   }
}

const errFn = function (error, args) {
   consts.notyf.error(`axios Response was: Error ${JSON.stringify(error.message)}} :${JSON.stringify({ url: args[0] })}`)
}
export default Object.assign({
   get: function (...args) {
      return instance.get(...args).catch((error) => errFn(error, args))
   },
   post: function (...args) {
      args[2] = Object.assign(args[2] || {}, { onUploadProgress })

      return instance.post(...args).catch((error) => errFn(error, args))
   }
})
