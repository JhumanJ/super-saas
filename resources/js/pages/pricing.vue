<template>
  <div>
    <div class="mt-6 flex flex-col">
      <div class="w-full md:max-w-4xl md:mx-auto px-4 flex flex-wrap mb-10 md:pb-20 md:pt-16">
        <!--  For guests - we show basic features  -->
        <template v-if="!authenticated">
          <h1 id="pricing-title" class="sm:text-5xl">
            All of our core features are <span class="text-nt-blue">free</span>. You don't need to pay to create awesome
            stuff.
          </h1>
          <features class="py-16" :features-only="true" />
          <div class="flex justify-center w-full">
            <Motion
              :auto="[
                'scale-100 rotate-2',
                'scale-105 -rotate-2 -mt-5 mb-5',
              ]"
              :options="motionOptions"
            >
              <img alt="3d Rocket image, as pro subscription will take you to space" class="w-24"
                   src="/img/icons/rocket.png"
              >
            </Motion>
          </div>
        </template>
        <!--   Upgrade options     -->
        <div v-if="user && user.is_subscribed && !user.has_enterprise_subscription" class="mb-20">
          <h2 class="text-5xl">
            Need to collaborate? <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Upgrade now</span>
          </h2>
          <div class="flex justify-center mt-10">
            <div class="w-full md:w-1/2 lg:w-full max-w-sm mt-2 p-2">
              <div class="relative flex flex-col h-full p-8 transition duration-500 ease-in-out transform bg-white border rounded-lg shadow-xl">
                <h2 class="mb-4 text-black">
                  <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Enterprise</span>
                </h2>
                <p class="flex text-gray-900 items-center mb-8 text-base font-medium leading-relaxed text-blueGray-700">
                  Collaborate, and connect multiple workspaces.
                </p>
                <div class="flex items-center justify-center">
                  <transition name="fade" mode="out-in">
                    <strong v-if="monthly" key="monthly" class="flex items-end text-3xl font-black leading-none text-black lg:text-4xl "> $39 <span class="text-sm"> /month </span>
                    </strong>
                    <strong v-else key="yearly" class="flex items-end text-3xl font-black leading-none text-black lg:text-4xl "> $399 <span class="text-sm"> /year </span>
                    </strong>
                  </transition>
                </div>
                <p class="flex text-gray-900 items-center mt-8 mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                  <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5" />
                    </svg>
                  </span>Everything in Pro plan
                </p>
                <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                  <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5" />
                    </svg>
                  </span>Multiple users
                </p>
                <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                  <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5" />
                    </svg>
                  </span>Multiple Workspaces
                </p>
                <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                  <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5" />
                    </svg>
                  </span>20 mb file uploads
                </p>
                <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                  <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5" />
                    </svg>
                  </span>Priority Support
                </p>
                <div class="flex-grow w-full" />
                <v-button :loading="billingLoading" class="w-full mt-4" @click="openBilling()">
                  Upgrade Now
                </v-button>
              </div>
            </div>
          </div>
        </div>
        <!--   Unsubscribed users - show -->
        <div v-if="!user || !user.is_subscribed" class="w-full mt-5">
          <h2 class="text-center text-5xl">
            <span class="relative inline-block">
              <svg viewBox="0 0 52 24" fill="currentColor"
                   class="text-nt-blue-light absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block"
              >
                <defs>
                  <pattern id="27df4f81-c854-45de-942a-fe90f7a300f9" x="0" y="0" width=".135" height=".30">
                    <circle cx="1" cy="1" r=".7" />
                  </pattern>
                </defs>
                <rect fill="url(#27df4f81-c854-45de-942a-fe90f7a300f9)" width="52" height="24" />
              </svg>
              <span class="relative">Make</span>
            </span>
            things better with our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">
              Pro</span> or <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Enterprise</span> plans
          </h2>
          <h4 class="text-center mt-5 text-xl leading-9">
            Personalize everything, make more complex stuff, collaborate, add integrations.
          </h4>
          <!--    For users to subscribe      -->
          <template v-if="user && !user.is_subscribed">
            <div class="w-full text-center font-semibold relative mt-10 pl-8">
              Monthly
              <v-switch v-model="monthly" class="inline mx-3" /> Yearly <span class=" ml-2
            bg-nt-blue text-white px-2 text-xs uppercase inline rounded-full font-semibold cursor-pointer"
              >-17%</span>
            </div>
            <div class="flex flex-wrap lg:flex-nowrap lg:flex-row justify-center">
              <div class="w-full md:w-1/2 lg:w-full max-w-sm mt-2 p-2">
                <div class="relative flex flex-col h-full p-8 transition duration-500 ease-in-out transform border rounded-lg shadow-xl bg-gradient-to-r from-blue-400 to-blue-600">
                  <h2 class="mb-4 text-black">
                    <span class="text-white">Pro</span>
                  </h2>
                  <p class="flex items-center mb-8 text-base font-medium leading-relaxed text-white">
                    Everything you need to create beautiful and professional stuff.
                  </p>
                  <div class="flex items-center justify-center text-white">
                    <transition name="fade" mode="out-in">
                      <strong v-if="monthly" key="monthly" class="flex items-end text-3xl font-black leading-none lg:text-4xl "> $15 <span class="text-sm"> /month </span>
                      </strong>
                      <strong v-else key="yearly" class="flex items-end text-3xl font-black leading-none lg:text-4xl "> $150 <span class="text-sm"> /year </span>
                      </strong>
                    </transition>
                  </div>
                  <p class="flex items-center mt-8 mb-2 text-base font-medium leading-relaxed text-white">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2  rounded-full text-blue-500 bg-white">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Everything in basic plan
                  </p>
                  <p class="flex items-center mb-2 text-base font-medium leading-relaxed text-white">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2  rounded-full text-blue-500 bg-white">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>1 Workspace
                  </p>
                  <p class="flex items-center mb-2 text-base font-medium leading-relaxed text-white">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2  rounded-full text-blue-500 bg-white">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Full form customization
                  </p>
                  <p class="flex items-center mb-2 text-base font-medium leading-relaxed text-white">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2  rounded-full text-blue-500 bg-white">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Remove our Branding
                  </p>
                  <p class="flex items-center mb-2 text-base font-medium leading-relaxed text-white">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2  rounded-full text-blue-500 bg-white">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Multiple Integrations
                  </p>
                  <p class="flex items-center mb-2 text-base font-medium leading-relaxed text-white">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2  rounded-full text-blue-500 bg-white">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Advanced features - <router-link class="ml-1 underline text-white" :to="{name:'pricing'}">
                      Read more
                    </router-link>
                  </p>
                  <p class="flex items-center mb-2 text-base font-medium leading-relaxed text-white">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2  rounded-full text-blue-500 bg-white">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>5 mb file uploads
                  </p>
                  <v-button color="gray" shade="lighter" class="w-full mt-4" @click="openCheckout('default')">
                    Buy Now
                  </v-button>
                </div>
              </div>
              <div class="w-full md:w-1/2 lg:w-full max-w-sm mt-2 p-2">
                <div class="relative flex flex-col h-full p-8 transition duration-500 ease-in-out transform bg-white border rounded-lg shadow-xl">
                  <h2 class="mb-4 text-black">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Enterprise</span>
                  </h2>
                  <p class="flex text-gray-900 items-center mb-8 text-base font-medium leading-relaxed text-blueGray-700">
                    Collaborate, and connect multiple workspaces.
                  </p>
                  <div class="flex items-center justify-center">
                    <transition name="fade" mode="out-in">
                      <strong v-if="monthly" key="monthly" class="flex items-end text-3xl font-black leading-none text-black lg:text-4xl "> $39 <span class="text-sm"> /month </span>
                      </strong>
                      <strong v-else key="yearly" class="flex items-end text-3xl font-black leading-none text-black lg:text-4xl "> $399 <span class="text-sm"> /year </span>
                      </strong>
                    </transition>
                  </div>
                  <p class="flex text-gray-900 items-center mt-8 mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Everything in Pro plan
                  </p>
                  <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Multiple users
                  </p>
                  <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Multiple Workspaces
                  </p>
                  <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>20 mb file uploads
                  </p>
                  <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
                    <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>Priority Support
                  </p>
                  <div class="flex-grow w-full" />
                  <v-button class="w-full mt-4" :to="{name:'register'}" @click="openCheckout('enterprise')">
                    Buy Now
                  </v-button>
                </div>
              </div>
            </div>
            <p class="w-full text-gray-400 text-center mt-10">
              Free 3-day trial - Cancel anytime
            </p>
          </template>
        </div>
        <!--   Subscribed users - show -->
        <div v-else class="w-full mt-5">
          <h2 class="text-center text-5xl">
            <span class="relative inline-block">
              <svg viewBox="0 0 52 24" fill="currentColor"
                   class="text-nt-blue-light absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block"
              >
                <defs>
                  <pattern id="27df4f81-c854-45de-942a-fe90f7a300f9" x="0" y="0" width=".135" height=".30">
                    <circle cx="1" cy="1" r=".7" />
                  </pattern>
                </defs>
                <rect fill="url(#27df4f81-c854-45de-942a-fe90f7a300f9)" width="52" height="24" />
              </svg>
              <span class="relative">Do</span>
            </span>
            even more with NotionForms <span v-if="!user.has_enterprise_subscription" class="text-nt-blue">Pro</span><span v-else class="text-nt-blue">Enterprise</span>
          </h2>
          <h4 class="text-center mt-5 text-xl leading-9">
            We're happy to have you as a <span v-if="!user.has_enterprise_subscription">Pro</span><span v-else>Enterprise</span> subscriber. If you're having any issue with NotionForms, or if you have a
            feature request, please <a href="#" @click.prevent="contactUs">contact us</a>.
          </h4>
        </div>
        <pro-features class="px-4 py-16" />
        <pricing-block v-if="!authenticated" />
        <div v-if="!authenticated" class="w-full mt-16 text-center">
          <h2>Create your first Form <span class="text-nt-blue">now</span></h2>
          <h4 class="my-5 text-xl">
            NotionForms is the best and easiest solution to create forms for Notion users. You don't need take our word
            for it, just try for free!
          </h4>
          <fancy-link :to="{name:'register'}">
            Create a Form
          </fancy-link>
        </div>
      </div>
      <saas-footer />
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Motion from 'tinymotion'
import { mapGetters } from 'vuex'
import Features from '../components/pages/welcome/Features'
import FancyLink from '../components/common/FancyLink'
import ProFeatures from '../components/pages/pricing/ProFeatures'
import SaasFooter from "../components/pages/SaasFooter"
import VSwitch from '../components/forms/components/VSwitch'
import PricingBlock from '../components/pages/welcome/PricingBlock'

export default {
  components: { PricingBlock, VSwitch, SaasFooter, ProFeatures, FancyLink, Features, Motion },
  layout: 'default',

  props: {
    metaTitle: { type: String, default: 'Pricing' },
    metaDescription: { type: String, default: 'All of our core features are free, and there is no quantity limit. You can also created more advanced and customized forms with NotionForms Pro.' }
  },

  data: () => ({
    checkoutLoading: false,
    billingLoading: false,
    monthly: true
  }),

  mounted () {
  },

  computed: {
    ...mapGetters({
      authenticated: 'auth/check',
      user: 'auth/user'
    }),

    motionOptions () {
      return {
        repeat: true, // infinite animation until stopped
        duration: 1000, // default duration. might be overridden by duration-{value} Tailwind class,
        ease: 'linear'
      }
    }
  },
  methods: {
    openBilling () {
      this.billingLoading = true
      axios.get('/api/subscription/billing-portal').then((response) => {
        this.billingLoading = false
        const url = response.data.portal_url
        window.location = url
      })
    },
    openCheckout (plan) {
      this.checkoutLoading = true
      axios.get('/api/subscription/new/' + plan + '/' + (this.monthly ? 'monthly' : 'yearly') + '/checkout/with-trial').then((response) => {
        window.location = response.data.checkout_url
      }).catch((error) => {
        this.alertError(error.response.data.message)
      }).finally(() => {
        this.checkoutLoading = false
      })
    },
    contactUs () {
      window.$crisp.push(['do', 'chat:show'])
      window.$crisp.push(['do', 'chat:open'])
    }
  }
}
</script>

<style scoped lang="scss">
#pricing-title {
  line-height: 1.2 !important;
}
</style>
