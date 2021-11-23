import axios from 'axios'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'

// Request interceptor
axios.interceptors.request.use(request => {
  const token = store.getters['auth/token']
  if (token) {
    request.headers.common.Authorization = `Bearer ${token}`
  }

  const locale = store.getters['lang/locale']
  if (locale) {
    request.headers.common['Accept-Language'] = locale
  }

  // request.headers['X-Socket-Id'] = Echo.socketId()

  return request
})

// Response interceptor
axios.interceptors.response.use(response => response, error => {
  const { status } = error.response

  if (status >= 500) {
    console.log(status)
  }

  if (status === 433 && error.response.data.type === 'notion_error') {
    store.commit('notion/errors/set', {
      ...error.response.data,
      workspace_id: error.response.config.url.split('workspaces/')[1].split('/')[0]
    })
  }

  if (status === 401 && store.getters['auth/check']) {
    console.log(status)
    store.commit('auth/LOGOUT')

    router.push({ name: 'login' })
  }

  return Promise.reject(error)
})
