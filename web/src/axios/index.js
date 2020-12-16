import Axios from 'axios'
// import { store } from '@/store'
// import { i18n } from '@/i18n'
// import Notification from '@/helpers/Notification'

const axios = Axios.create({
  baseURL: process.env.VUE_APP_API_HOST + process.env.VUE_APP_API_PATH || '/web/'
})

// axios.interceptors.request.use(request => {
//   // Отправка токена из локального хранилища
//   const token = localStorage.getItem('user-token')
//   if (token) {
//     request.headers.Authorization = 'Bearer ' + token
//     request.headers['Accept-Language'] = i18n.locale
//   }
//
//   return request
// })
//
// axios.interceptors.response.use(response => response, error => {
//   // Если статус "Не авторизован", то выходим из приложения
//   if (error.response.status === 401 || error.response.status === 403) {
//     store.dispatch('authorization/logout')
//
//     return false
//   } else {
//     Notification.showError('status.error', error.message)
//   }
//
//   return Promise.resolve(null)
// })

export default axios
