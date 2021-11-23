function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  // Logged Users
  { path: '/home', name: 'home', component: page('home.vue') },

  // Subscription
  { path: '/subscriptions/success', name: 'subscriptions.success', component: page('subscriptions/success.vue') },
  { path: '/subscriptions/error', name: 'subscriptions.error', component: page('subscriptions/error.vue') },

  // Settings
  {
    path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.workspaces' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'account', name: 'settings.account', component: page('settings/account.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') },
      { path: 'admin', name: 'settings.admin', component: page('settings/admin.vue') }
    ]
  },

  // Auth Routes
  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  // Legal Routes
  { path: '/privacy-policy', name: 'privacy-policy', component: page('legal-help/privacy-policy.vue') },
  { path: '/terms-conditions', name: 'terms-conditions', component: page('legal-help/terms-conditions.vue') },

  // Guest Routes
  { path: '/', name: 'welcome', component: page('welcome.vue') },
  { path: '/pricing', name: 'pricing', component: page('pricing.vue') },

  { path: '*', component: page('errors/404.vue') }
]
