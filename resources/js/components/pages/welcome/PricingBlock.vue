<template>
  <div id="pricing" class="flex flex-wrap items-center justify-center w-full gap-4">
    <h2 v-if="$route.name!=='pricing'" class="text-center w-full sm:text-4xl mb-4">
      Pricing
    </h2>
    <div class="w-full text-center font-semibold relative pl-8">
      Monthly
      <v-switch v-model="monthly" class="inline mx-3" /> Yearly <span class=" ml-2
      bg-nt-blue text-white px-2 text-xs uppercase inline rounded-full font-semibold cursor-pointer"
      >-17%</span>
    </div>
    <div class="flex flex-wrap lg:flex-nowrap lg:flex-row items-center justify-center">
      <div class="w-full md:w-1/2 lg:w-full max-w-sm mt-2 p-4 lg:p-0">
        <div class="relative flex flex-col h-full p-8 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:rounded-r-none lg:border-r-0 shadow-xl">
          <h2 class="mb-4 text-black">
            Basic
          </h2>
          <p class="flex items-center mb-8 text-gray-900 text-base font-medium leading-relaxed text-blueGray-700">
            All the basics tools to do nice things.
          </p>
          <p class="text-center">
            <strong class="text-3xl font-black leading-none text-black lg:text-4xl"> Free </span>
            </strong>
          </p>
          <p class="flex text-gray-900 items-center mt-8 mb-2 text-base font-medium leading-relaxed text-blueGray-700">
            <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5" />
              </svg>
            </span>1 Workspace
          </p>
          <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
            <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5" />
              </svg>
            </span>As many stuff as you like
          </p>
          <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
            <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5" />
              </svg>
            </span>No usage limit
          </p>
          <p class="flex text-gray-900 items-center mb-2 text-base font-medium leading-relaxed text-blueGray-700">
            <span class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5" />
              </svg>
            </span>Embed your form anywhere
          </p>
          <fancy-link class="w-full mt-4" :to="{name:'register'}" shade="lighter" color="gray">
            Try Now
          </fancy-link>
        </div>
      </div>
      <div class="w-full md:w-1/2 lg:w-full max-w-sm mt-2 p-4 lg:p-0">
        <div class="relative flex flex-col h-full p-8 transition duration-500 ease-in-out transform border rounded-lg shadow-xl bg-gradient-to-r from-blue-400 to-blue-600">
          <h2 class="mb-4 text-black">
            <span class="text-white">Pro</span>
          </h2>
          <p class="flex items-center mb-8 text-base font-medium leading-relaxed text-white">
            Everything you need to create beautiful and professional things.
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
            </span>Everything in Basic plan
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
            </span>Full customization
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
            </span>
            Multiple Integrations
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
          <fancy-link v-if="!authenticated" color="gray" shade="lighter" class="w-full mt-4" :to="{name:'register'}">
            Buy Now
          </fancy-link>
          <fancy-link v-else color="gray" shade="lighter" class="w-full mt-4" :to="{name:'pricing'}">
            Buy Now
          </fancy-link>
        </div>
      </div>
      <div class="w-full md:w-1/2 lg:w-full max-w-sm mt-2 p-4 lg:p-0">
        <div class="relative flex flex-col h-full p-8 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:rounded-l-none lg:border-l-0 shadow-xl">
          <h2 class="mb-4 text-black">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Enterprise</span>
          </h2>
          <p class="flex text-gray-900 items-center mb-8 text-base font-medium leading-relaxed text-blueGray-700">
            Collaborate, and do beautiful things.
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
          <fancy-link v-if="authenticated" class="w-full mt-4" :to="{name:'register'}">
            Buy Now
          </fancy-link>
          <fancy-link v-else class="w-full mt-4" :to="{name:'pricing'}">
            Buy Now
          </fancy-link>
        </div>
      </div>
    </div>
    <p class="w-full text-gray-400 text-center">
      Free 3-day trial - Cancel anytime
    </p>
    <p v-if="$route.name!=='pricing'" class="text-center w-full my-10 font-semibold">
      <router-link :to="{name:'pricing'}">
        Read more about our different plans
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
             stroke="currentColor"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </router-link>
    </p>
  </div>
</template>

<script>
import VSwitch from '../../forms/components/VSwitch'
import { mapGetters } from 'vuex'
export default {
  components: { VSwitch },
  props: {
  },
  data: () => ({
    monthly: true
  }),

  computed: {
    ...mapGetters({
      authenticated: 'auth/check'
    })
  },

  methods: {

  }
}
</script>
