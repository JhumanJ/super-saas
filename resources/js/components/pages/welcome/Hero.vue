<template>
  <div class="w-full md:mx-auto flex flex-wrap pb-10 md:pb-20 md:pt-10 relative max-w-7xl">
    <div
      class="flex flex-col justify-center w-full lg:w-1/2 text-center lg:text-left lg:pr-10 p-6 lg:p-10 lg:pl-24 relative z-10"
    >
      <h1 dusk="title" class="text-4xl lg:text-5xl">
        Easy to use <br>
        <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600"
        >{{title}}</span><br>
        for smart people
      </h1>
      <h3 class="mt-6 text-xl text-gray-500">
        Here's your tagline explaining what you do. And some lorem ipsum. Porttitor nec sagittis leo mollis dapibus molestie.
      </h3>
      <p class="mt-6">
        <router-link :to="{ name: 'register' }">
          <v-button>
            Start for free
          </v-button>
        </router-link>
      </p>
      <p class="text-gray-400 dark:text-gray-600 text-xs mt-2 ml-1">
        No card required
      </p>
    </div>
    <div class="w-full lg:w-1/2 relative px-6 sm:px-10 lg:px-0 z-10 lg:pr-10 flex items-center justify-center">
      <img class="w-full max-w-2xl lg:max-w-5xl" src="/img/pages/welcome/product-cover.png" alt="cover-product">
    </div>
  </div>
</template>

<script>
export default {

  props: {},
  data: () => ({
    title: window.config.appName
  }),

  methods: {}
}
</script>
