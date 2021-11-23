<template>
  <router-link :class="`py-${sizes['p-y']} px-${sizes['p-x']}
    bg-${color}-${colorShades['main']} hover:bg-${color}-${colorShades['hover']} focus:ring-${color}-${colorShades['ring']}
    focus:ring-offset-${color}-${colorShades['ring-offset']} text-${colorShades['text']}
    transition ease-in duration-200 text-center text-${sizes['font']} font-semibold shadow-md focus:outline-none focus:ring-2
    focus:ring-offset-2 rounded-lg hover:no-underline inline-block`" :to="to" :target="target"
  >
    <template v-if="!loading">
      <slot />
    </template>
    <template v-else>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white animate-spin mx-auto" fill="none"
           viewBox="0 0 24 24"
           stroke="currentColor"
      >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
        />
      </svg>
    </template>
  </router-link>
</template>

<script>
export default {
  name: 'FancyLink',

  props: {
    to: {
      type: Object
    },

    color: {
      type: String,
      default: 'nt-blue'
    },

    target: {
      type: String,
      default: '_self'
    },

    shade: {
      type: String,
      default: 'normal'
    },

    size: {
      type: String,
      default: 'medium'
    },

    loading: {
      type: Boolean,
      default: false
    }
  },

  computed: {
    colorShades () {
      if (this.color === 'nt-blue') {
        return {
          main: 'default',
          hover: 'light',
          ring: 'light',
          'ring-offset': 'lighter',
          text: 'white'
        }
      }
      if (this.shade === 'lighter') {
        return {
          main: '200',
          hover: '300',
          ring: '100',
          'ring-offset': '50',
          text: 'gray-900'
        }
      }
      if (this.shade === 'light') {
        return {
          main: '400',
          hover: '500',
          ring: '300',
          'ring-offset': '150',
          text: 'white'
        }
      }
      return {
        main: '600',
        hover: '700',
        ring: '500',
        'ring-offset': '200',
        text: 'white'
      }
    },
    sizes () {
      if (this.size === 'small') {
        return {
          font: 'sm',
          'p-y': '1',
          'p-x': '2'
        }
      }
      return {
        font: 'base',
        'p-y': '2',
        'p-x': '4'
      }
    }
  }
}
</script>
