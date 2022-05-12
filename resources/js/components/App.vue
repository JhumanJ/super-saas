<template>
  <div id="app">
    <loading ref="loading" />

    <hotjar />

    <transition name="page" mode="out-in">
      <component :is="layout" v-if="layout" />
    </transition>
    <portal-target name="modals" multiple />
    <stop-impersonation />
  </div>
</template>

<script>
import Loading from './Loading'
import { mapState } from 'vuex'
import Hotjar from './service/Hotjar'
import StopImpersonation from "./pages/StopImpersonation";

// Load layout components dynamically.
const requireContext = require.context('~/layouts', false, /.*\.vue$/)

const layouts = requireContext.keys()
  .map(file =>
    [file.replace(/(^.\/)|(\.vue$)/g, ''), requireContext(file)]
  )
  .reduce((components, [name, component]) => {
    components[name] = component.default || component
    return components
  }, {})

export default {
  el: '#app',

  components: {
    StopImpersonation,
    Hotjar,
    Loading
  },

  data: () => ({
    metaTitle: 'SAAS Template by Jhumanj',
    metaDescription: 'A Laravel/Vue.js SPA SAAS Template by Jhumanj',

    layout: null,
    defaultLayout: 'default',
    alert: {
      type: null,
      autoClose: 0,
      message: '',
      confirmationProceed: null,
      confirmationCancel: null
    }
  }),

  mounted () {
    this.$loading = this.$refs.loading

    // Dark mode - Uncomment to enable
    // if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
    //   document.body.classList.add('dark')
    // }
  },

  methods: {
    /**
     * Set the application layout.
     *
     * @param {String} layout
     */
    setLayout (layout) {
      if (!layout || !layouts[layout]) {
        layout = this.defaultLayout
      }

      this.layout = layouts[layout]
    },
  },

  computed: {
    ...mapState({}),
  },

  watch: {}
}
</script>
