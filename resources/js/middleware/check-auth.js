import store from '~/store'

function initCrisp (user) {
  return new Promise((resolve, reject) => {
    const intervalId = window.setInterval(function () {
      if (window.hasOwnProperty('$crisp')) {
        window.$crisp.push(['set', 'user:email', user.email])
        window.$crisp.push(['set', 'user:nickname', user.name])
        window.$crisp.push(['set', 'session:data', [[['pro-subscription', user.is_subscribed]]]])
        clearInterval(intervalId)
        resolve()
      }
    }, 500)
  })
}

export default async (to, from, next) => {
  if (!store.getters['auth/check'] && store.getters['auth/token'] !== null && store.getters['auth/token'] !== undefined) {
    try {
      const user = await store.dispatch('auth/fetchUser')
      initCrisp(user)
    } catch (e) {
      console.log(e)
    }
  }
  next()
}
