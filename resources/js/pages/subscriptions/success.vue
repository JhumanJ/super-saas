<template>
  <div class="flex flex-col min-h-screen">
    <div class="w-full md:max-w-3xl md:mx-auto px-4 mb-10 md:pb-20 md:pt-16 text-center flex-grow">
      <h1 class="text-4xl font-semibold">
        Thank you!
      </h1>
      <h4 class="text-xl mt-6">
        We're checking the status of your subscription please wait a moment...
      </h4>
      <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-nt-blue animate-spin mx-auto mt-20" fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
          />
        </svg>
      </div>
    </div>
    <saas-footer />
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import SaasFooter from "../../components/pages/SaasFooter";

export default {
  components: { SaasFooter },
  layout: 'default',
  middleware: 'auth',

  metaInfo () {
    return { title: 'Subscription Success' }
  },

  data: () => ({
    interval: null
  }),

  mounted () {
    this.redirectIfSubscribed()
    this.interval = setInterval(() => this.checkSubscription(), 5000)
  },

  beforeDestroy () {
    clearInterval(this.interval)
  },

  methods: {
    async checkSubscription () {
      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')
      this.redirectIfSubscribed()
    },
    redirectIfSubscribed () {
      if (this.user.is_subscribed) {
        // do something
        this.$router.push({ name: 'home' })
        this.alertSuccess('Your subscription is now confirmed!')
      }
    }
  },

  computed: {
    ...mapGetters({
      authenticated: 'auth/check',
      user: 'auth/user'
    })
  }
}
</script>
