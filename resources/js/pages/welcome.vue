<template>
  <div>
    <div class="mt-6 flex flex-col">
      <div class="w-full dark:bg-notion-dark-light">
        <hero/>
        <div class="bg-white w-full dark:bg-notion-dark relative">
          <div class="z-10 w-full md:max-w-3xl md:mx-auto px-4 flex flex-wrap pb-10">
            <h3 class="mb-4 text-sm font-semibold tracking-widest uppercase title-font w-full text-center">
              People from the world best organizations use <span class="text-nt-blue text-uppercase">{{title}}</span>
            </h3>
            <div class="flex flex-wrap justify-center w-full">
              <div class="customer-logo-container">
                <img class="w-full max-w-80" alt="Logo Harvard" src="/img/customers/harvard.png">
              </div>
              <div class="customer-logo-container">
                <img alt="Logo DBS" src="/img/customers/dbs.png">
              </div>
              <div class="customer-logo-container">
                <img alt="Logo Hyundai" src="/img/customers/hyundai.png">
              </div>
              <div class="customer-logo-container">
                <img alt="Logo Yale" src="/img/customers/yale.png">
              </div>
              <div class="customer-logo-container">
                <img alt="Logo SciencesPo" src="/img/customers/sciencespo.png">
              </div>
            </div>
          </div>

          <div class="z-0 absolute bottom-0 inset-x-0 z-0 w-full opacity-30 dark:opacity-70">
            <img class="mx-auto" src="/img/pages/welcome/homebackdrop.png" alt="Backdrop decoration image">
          </div>
        </div>

        <div class="bg-gray-50 dark:bg-notion-dark-light">
          <div class="w-full md:max-w-4xl md:mx-auto px-4 flex flex-wrap">
            <features class="pt-16 pb-8" />
            <p class="text-center w-full mb-8 font-semibold">
              And much more.
              <router-link :to="{name:'pricing'}">
                See all our features
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </router-link>
            </p>
          </div>
        </div>

        <div class="bg-gradient-to-r from-blue-400 to-blue-600 dark:bg-notion-dark-light py-16 transform skew-y-2">
          <div class="w-full md:max-w-4xl md:mx-auto px-4 flex flex-wrap transform -skew-y-2">
            <div class="text-white text-center">
              <h3 class="text-white text-center text-2xl font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg> Safety First
              </h3>
              <p class="text-white text-center my-6">
                Adipiscing fames congue enim praesent scelerisque, facilisi sem sapien felis odio, primis ac interdum
                condimentum. Dolor aptent lectus cubilia viverra congue montes, torquent cursus odio ante ornare,
                senectus blandit condimentum ultricies mollis. Dis congue cubilia vehicula curabitur blandit ligula
                vitae ultrices euismod, platea suscipit mollis vivamus porta ultricies egestas placerat, sagittis
                potenti a posuere ridiculus hendrerit aenean conubia.
              </p>
            </div>
            <p class="text-center w-full">
              <fancy-link color="gray" shade="lighter" class="px-8 mx-1" :to="{ name: 'register' }">
                Try For Free
              </fancy-link>
            </p>
          </div>
        </div>

        <div class="bg-gray-50 dark:bg-notion-dark-light pt-10 -mt-10">
          <div class="w-full md:max-w-3xl md:mx-auto px-4 flex flex-wrap mb-10">
            <how-to class="px-4 md:px-0 mt-20" />
          </div>
        </div>
        <div class="w-full dark:bg-notion-dark p-10">
          <div class="md:max-w-5xl md:mx-auto flex flex-wrap">
            <pricing-block />
          </div>
        </div>
        <saas-footer class="mt-10" />
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import HowTo from '~/components/pages/welcome/HowTo'
import Features from '~/components/pages/welcome/Features'
import FancyLink from '../components/common/FancyLink'
import PricingBlock from '../components/pages/welcome/PricingBlock'
import SaasFooter from '../components/pages/SaasFooter'
import Hero from "../components/pages/welcome/Hero"

export default {
  components: { PricingBlock, SaasFooter, FancyLink, HowTo, Features, Hero },

  layout: 'default',

  data: () => ({
    title: window.config.appName
  }),

  mounted () {},

  methods: {},

  computed: {
    ...mapGetters({
      authenticated: 'auth/check'
    })
  }
}
</script>

<style lang="scss" scoped>
.customer-logo-container {
  max-width: 130px;
  width: 100%;
}
</style>
