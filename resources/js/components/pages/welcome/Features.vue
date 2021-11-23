<template>
  <div id="features" class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
    <div v-if="!featuresOnly" :class="{'mb-10 md:mb-12':!featuresOnly }" class="max-w-xl md:mx-auto sm:text-center lg:max-w-2xl ">
      <div>
        <p
          class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-nt-blue uppercase rounded-full bg-nt-blue-lighter"
        >
          Core Features 100% Free
        </p>
      </div>
      <h2
        class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl md:mx-auto"
      >
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
          <span class="relative">The</span>
        </span>
        easiest way to do stuff for smart people
      </h2>
      <p class="text-base text-gray-700 dark:text-gray-300 md:text-lg">
        Laoreet magnis mus elit ut dictum justo sollicitudin praesent aliquet a at nostra montes sociosqu, adipiscing
        dictumst lacus conubia phasellus eleifend varius cras turpis est class platea. Blandit rutrum massa congue
        mollis elementum.
      </p>
    </div>
    <div class="grid max-w-screen-lg gap-8 row-gap-10 mx-auto md:grid-cols-2">
      <div class="flex flex-col max-w-md sm:mx-auto sm:flex-row">
        <div class="mr-4">
          <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-nt-blue-lighter">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nt-blue" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>
          </div>
        </div>
        <div>
          <h6 class="mb-3 text-xl font-bold leading-5">
            Feature 1
          </h6>
          <p class="mb-3 text-sm dark:text-gray-100 text-gray-900">
            Risus elementum nisl faucibus accumsan curabitur lorem quisque interdum venenatis purus in quam tempor.
          </p>
        </div>
      </div>
      <div class="flex flex-col max-w-md sm:mx-auto sm:flex-row">
        <div class="mr-4">
          <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-nt-blue-lighter">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nt-blue" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
              />
            </svg>
          </div>
        </div>
        <div>
          <h6 class="mb-3 text-xl font-bold leading-5">
            Feature 2
          </h6>
          <p class="mb-3 text-sm dark:text-gray-100 text-gray-900">
            Risus elementum nisl faucibus accumsan curabitur lorem quisque interdum venenatis purus in quam tempor.
          </p>
        </div>
      </div>
      <div class="flex flex-col max-w-md sm:mx-auto sm:flex-row">
        <div class="mr-4">
          <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-nt-blue-lighter">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nt-blue" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
        </div>
        <div>
          <h6 class="mb-3 text-xl font-bold leading-5">
            Feature 3
          </h6>
          <p class="mb-3 text-sm dark:text-gray-100 text-gray-900">
            Risus elementum nisl faucibus accumsan curabitur lorem quisque interdum venenatis purus in quam tempor.
          </p>
        </div>
      </div>
      <div class="flex flex-col max-w-md sm:mx-auto sm:flex-row">
        <div class="mr-4">
          <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-nt-blue-lighter">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nt-blue" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </div>
        </div>
        <div>
          <h6 class="mb-3 text-xl font-bold leading-5">
            Feature 4
          </h6>
          <p class="mb-3 text-sm dark:text-gray-100 text-gray-900">
            Risus elementum nisl faucibus accumsan curabitur lorem quisque interdum venenatis purus in quam tempor.
          </p>
        </div>
      </div>
      <div class="flex flex-col max-w-md sm:mx-auto sm:flex-row">
        <div class="mr-4">
          <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-nt-blue-lighter">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nt-blue" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
            </svg>
          </div>
        </div>
        <div>
          <h6 class="mb-3 text-xl font-bold leading-5">
            Feature 5
          </h6>
          <p class="mb-3 text-sm dark:text-gray-100 text-gray-900">
            Risus elementum nisl faucibus accumsan curabitur lorem quisque interdum venenatis purus in quam tempor.
          </p>
        </div>
      </div>
      <div class="flex flex-col max-w-md sm:mx-auto sm:flex-row">
        <div class="mr-4">
          <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-nt-blue-lighter">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nt-blue" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
              />
            </svg>
          </div>
        </div>
        <div>
          <h6 class="mb-3 text-xl font-bold leading-5">
            Feature 6
          </h6>
          <p class="mb-3 text-sm dark:text-gray-100 text-gray-900">
            Risus elementum nisl faucibus accumsan curabitur lorem quisque interdum venenatis purus in quam tempor.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  props: {
    featuresOnly: {
      type: Boolean,
      default: false
    }
  },
  data: () => ({}),

  methods: {}
}
</script>
