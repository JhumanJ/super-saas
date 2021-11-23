<template>
  <div id="create-form-steps">
    <p class="text-center w-full mb-4">
      <span class="font-semibold text-nt-blue bg-nt-blue-lighter rounded-full py-1 px-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1 inline" fill="none" viewBox="0 0 24 24"
             stroke="currentColor"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
        3 min
      </span>
    </p><h2 class="sm:text-4xl text-center w-full">
      <span class="relative inline-block">
        <svg viewBox="0 0 52 24" fill="currentColor" class="text-nt-blue-light absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
          <defs>
            <pattern id="27df4f81-c854-45de-942a-fe90f7a300f9" x="0" y="0" width=".135" height=".30">
              <circle cx="1" cy="1" r=".7" />
            </pattern>
          </defs>
          <rect fill="url(#27df4f81-c854-45de-942a-fe90f7a300f9)" width="52" height="24" />
        </svg>
        <span class="relative">How</span>
      </span> to use our product
    </h2>
    <div class="flex flex-wrap mt-10">
      <div class="w-full sm:w-2/3 flex flex-col justify-center pr-0 sm:pr-10">
        <p>
          <span class="text-nt-blue bg-nt-blue-lighter rounded-full py-1 px-2 text-xs font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1 inline" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            1 min
          </span>
        </p>
        <h3 class="text-2xl font-semibold mt-4">
          1. Step one
        </h3>
        <p class="mt-4">
          <router-link :to="{name:'register'}">
            Click here
          </router-link> to create an account.
        </p>
      </div>
      <div class="w-full sm:w-1/3 p-4">
        <img src="/img/pages/welcome/step1.png"
             class="rounded-xl shadow-lg transform rotate-3 sm:rotate-6 w-56 mx-auto mt-8 sm:w-full sm:mt-0"
             alt="Image of a computer connected to notion"
        >
      </div>
    </div>
    <div class="flex flex-wrap flex-col-reverse sm:flex-row mt-10">
      <div class="w-full sm:w-1/3 p-4">
        <img src="/img/pages/welcome/step2.png"
             class="rounded-xl shadow-lg transform -rotate-3 sm:-rotate-6 w-56 mx-auto mt-8 sm:w-full sm:mt-0"
             alt="Image of a computer connected to notion"
        >
      </div>
      <div class="w-full sm:w-2/3 flex flex-col justify-center pl-0 sm:pl-10">
        <p>
          <span class="text-nt-blue bg-nt-blue-lighter rounded-full py-1 px-2 text-xs font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1 inline" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            1 min
          </span>
        </p>
        <h3 class="text-2xl font-semibold mt-4">
          2. Do the step 2
        </h3>
        <p class="mt-4">
          Ornare cum nulla leo id ridiculus atOrnare cum nulla leo id ridiculus at.
        </p>
      </div>
    </div>
    <div class="flex flex-wrap mt-10">
      <div class="w-full sm:w-2/3 flex flex-col justify-center pr-0 sm:pr-10">
        <p>
          <span class="text-nt-blue bg-nt-blue-lighter rounded-full py-1 px-2 text-xs font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1 inline" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            1 min
          </span>
        </p>
        <h3 class="text-2xl font-semibold mt-4">
          3. And then the step 3
        </h3>
        <p class="mt-4">
          Nisl cras mus porttitor sit etiam vulputate.
        </p>
      </div>
      <div class="w-full sm:w-1/3 p-4">
        <img src="/img/tutorial/example.gif"
             class="rounded-xl shadow-lg transform rotate-3 sm:rotate-6 w-56 mx-auto mt-8 sm:w-full sm:mt-0"
             alt="Image of a computer connected to notion"
        >
      </div>
    </div>
    <div class="flex flex-wrap flex-col-reverse sm:flex-row mt-10">
      <div class="w-full sm:w-1/3 p-4">
        <img src="/img/tutorial/integrate_to_notion.gif"
             class="rounded-xl shadow-lg transform -rotate-3 sm:-rotate-6 w-56 mx-auto mt-8 sm:w-full sm:mt-0"
             alt="Image of a computer connected to notion"
        >
      </div>
      <div class="w-full sm:w-2/3 flex flex-col justify-center pl-0 sm:pl-10">
        <p>
          <span class="text-nt-blue bg-nt-blue-lighter rounded-full py-1 px-2 text-xs font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1 inline" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            0 min
          </span>
        </p>
        <h3 class="text-2xl font-semibold mt-4">
          4. Share!
        </h3>
        <p class="mt-4">
          Viverra semper fames nibh hac blandit integer!
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({}),

  methods: {}
}
</script>
