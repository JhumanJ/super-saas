<template>
  <nav v-if="hasNavbar" class="bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <router-link :to="{ name: user ? 'home' : 'welcome' }" class="flex-shrink-0 font-bold flex items-center">
            <img src="/img/logo.svg" alt="notion tools logo" class="w-8 h-8">
            <span class="ml-3 text-xl hidden sm:inline text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">
              {{ appName }}
            </span>
          </router-link>
        </div>
        <div class="block">
          <div class="ml-4 flex items-center md:ml-6">
            <div v-if="(user===null || (user && !user.is_subscribed)) && $route.name !== 'pricing'" class="hidden sm:block mr-4">
              <router-link :to="{ name: 'pricing' }"
                           class="text-gray-400 hover:text-gray-800 dark:hover:text-white px-0 sm:px-3 py-2 rounded-md text-sm font-medium router-link-exact-active text-gray-800 dark:text-white"
              >
                Pricing
              </router-link>
            </div>
            <div v-if="headwayAccountId && user" id="changelog" :class="{'md:block': showChangelog}"
                 class="hidden mr-10 relative"
            >
              <p id="changelog-trigger" href="#" class="text-sm text-gray-400 hover:text-gray-800 cursor-pointer mt-1">
                What's new
              </p>
            </div>
            <div class="ml-3 relative">
              <div class="relative inline-block text-left">
                <dropdown v-if="user" dusk="nav-dropdown">
                  <template #trigger="{toggle}">
                    <button id="dropdown-menu-button" type="button"
                            class="flex items-center justify-center w-full rounded-md  px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-50 hover:bg-gray-50 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gray-500"
                            dusk="nav-dropdown-button" @click.prevent="toggle()"
                    >
                      <img :src="user.photo_url" class="rounded-full w-6 h-6">
                      <p class="ml-2 hidden sm:inline">
                        {{ user.name }}
                      </p>
                    </button>
                  </template>

                  <template>
                    <router-link :to="{ name: 'home' }"
                                 class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600 flex items-center"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                      </svg>
                      Dashboard
                    </router-link>

                    <a v-if="user && user.has_customer_id" href="#"
                       class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600 flex items-center" @click.prevent="openBillingDashboard"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                      </svg>
                      Billing
                    </a>

                    <router-link :to="{ name: 'settings.profile' }"
                                 class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600 flex items-center"
                    >
                      <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                        />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                      </svg>
                      {{ $t('settings') }}
                    </router-link>
                  </template>

                  <a href="#"
                     class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600 flex items-center"
                     @click.prevent="logout"
                  >
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                      />
                    </svg>
                    {{ $t('logout') }}
                  </a>
                </dropdown>
                <div v-else>
                  <router-link :to="{ name: 'login' }"
                               class="text-gray-400 hover:text-gray-800 dark:hover:text-white px-0 sm:px-3 py-2 rounded-md text-sm font-medium"
                               active-class="text-gray-800 dark:text-white"
                  >
                    {{ $t('login') }}
                  </router-link>
                  <router-link :to="{ name: 'register' }"
                               class="text-gray-300 hover:text-gray-800 dark:hover:text-white pl-3 py-2 rounded-md text-sm font-medium"
                               active-class="text-gray-800 dark:text-white"
                  >
                    <v-button>
                      Register
                    </v-button>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'
import Dropdown from './common/Dropdown'
import axios from 'axios'

export default {
  components: {
    Dropdown
  },

  data: () => ({
    appName: window.config.appName,
    headwayAccountId: null, // TODO: add headway account id for changelog
    showChangelog: false,
  }),

  computed: {
    hasNavbar () {
      if (this.isIframe) return false

      if (this.form) {
        // If there is a cover, or if branding is hidden remove nav
        if (this.form.cover_picture || this.form.no_branding) {
          return false
        }
      }
      return true
    },
    isIframe () {
      return window.location !== window.parent.location || window.frameElement
    },
    ...mapGetters({
      user: 'auth/user'
    }),
  },

  watch: {
    user () {
      this.loadHeadwayChangelog()
    }
  },

  mounted () {
    this.loadHeadwayChangelog()
  },

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
    openBillingDashboard () {
      axios.get('/api/subscription/billing-portal').then((response) => {
        const url = response.data.portal_url
        window.location = url
      })
    },
    loadHeadwayChangelog () {
      if (this.user && this.headwayAccountId) {
        this.$loadScript('https://cdn.headwayapp.co/widget.js')
          .then(() => {
            // Script is loaded, do something
            Headway.init({
              selector: '#changelog', // CSS selector where to inject the badge
              account:this.headwayAccountId,
              trigger: '#changelog-trigger',
              callbacks: {
                onWidgetReady: (widget) => {
                  this.showChangelog = true
                }
              }
            })
          })
      }
    }
  }
}
</script>

<style>
#HW_badge_cont {
  right: -28px;
  bottom: -6px;
  position: absolute !important;
}
#HW_badge{
  background-color: #3B82F6;
}

.HW_softHidden {
  background-color: #d4d4d4 !important;
}
</style>
