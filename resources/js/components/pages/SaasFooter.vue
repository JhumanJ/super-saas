<template>
  <div class="w-full bg-gray-50 dark:bg-gray-800 p-10">
    <div class="px-4 py-6 w-full md:max-w-3xl md:mx-auto md:px-24 lg:px-8">
      <div class="flex flex-wrap">
        <div class="md:max-w-md lg:col-span-2 mr-2 pr-2">
          <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
            <img src="/img/logo.svg" alt="saas logo" class="w-8 h-8 inline">
            <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 dark:text-gray-200">{{ title }}</span>
          </a>
          <div class="mt-4 lg:max-w-sm">
            <!--            <p class="text-sm text-gray-800">-->
            <!--              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.-->
            <!--            </p>-->
            <!--            <p class="mt-4 text-sm text-gray-800">-->
            <!--              Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.-->
            <!--            </p>-->
          </div>
        </div>
        <div class="grid grid-cols-2 gap-5 row-gap-8 lg:col-span-4 md:grid-cols-3">
          <div>
            <p class="font-semibold tracking-wide text-gray-800 dark:text-gray-200">
              Resources
            </p>
            <ul class="mt-2 space-y-2">
              <li>
                <a target="_blank" :href="helpUrl" class="text-gray-600 dark:text-gray-400 transition-colors duration-300 hover:text-nt-blue">
                  Help
                </a>
              </li>
              <li v-if="changelogUrl">
                <a target="_blank" :href="changelogUrl" class="text-gray-600 dark:text-gray-400 transition-colors duration-300 hover:text-nt-blue">
                  Product Updates
                </a>
              </li>
            </ul>
          </div>
          <div>
            <p class="font-semibold tracking-wide text-gray-800 dark:text-gray-200">
              Community
            </p>
            <ul class="mt-2 space-y-2">
              <li>
                <a target="_blank" :href="facebookGroupUrl" class="text-gray-600 dark:text-gray-400 transition-colors duration-300 hover:text-nt-blue">Facebook Group</a>
              </li>
              <li>
                <a target="_blank" :href="twitterUrl" class="text-gray-600 dark:text-gray-400 transition-colors duration-300 hover:text-nt-blue">Twitter</a>
              </li>
            </ul>
          </div>
          <div>
            <p class="font-semibold tracking-wide text-gray-800 dark:text-gray-200">
              Legal
            </p>
            <ul class="mt-2 space-y-2">
              <li>
                <router-link :to="{name:'privacy-policy'}" class="text-gray-600 dark:text-gray-400 transition-colors duration-300 hover:text-nt-blue">
                  Privacy Policy
                </router-link>
              </li>
              <li>
                <router-link :to="{name:'terms-conditions'}" class="text-gray-600 dark:text-gray-400 transition-colors duration-300 hover:text-nt-blue">
                  Terms & Conditions
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex flex-col justify-between pt-5 pb-10 border-t mt-4 sm:flex-row">
        <p class="text-sm text-gray-600 dark:text-gray-400">
          © Copyright 2021 {{ title }}. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SaasFooter',
  data: () => ({
    title: window.config.appName
  }),

  computed: {
    helpUrl: () => window.config.links.help_url,
    changelogUrl: () => window.config.links.changelog_url,
    facebookGroupUrl: () => window.config.links.facebook_group,
    twitterUrl: () => window.config.links.twitter,
    serviceStatusUrl: () => window.config.links.status
  },

  methods: {}
}
</script>
