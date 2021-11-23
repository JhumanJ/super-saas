import _ from 'lodash'

/**
 * Base mixin for all Vue components
 */
export default {
  computed: {},

  metaInfo () {
    const info = {}
    if (this.metaTitle) {
      info.title = this.metaTitle
      info.meta = [
        { vmid: 'og:title', property: 'og:title', content: this.metaTitle },
        { vmid: 'twitter:title', property: 'twitter:title', content: this.metaTitle }
      ]
    }
    if (this.metaDescription) {
      info.meta = [
        ...info.meta,
        { vmid: 'description', name: 'description', content: this.metaDescription },
        { vmid: 'og:description', property: 'og:description', content: this.metaDescription },
        { vmid: 'twitter:description', property: 'twitter:description', content: this.metaDescription }
      ]
    }

    return info
  },

  methods: {
    /**
     * Creates a debounced function that delays invoking a callback.
     */
    debouncer: _.debounce((callback) => callback(), 500),

    /**
     * Show an error message.
     */
    alertError (message) {
      this.$root.alert.type = 'error'
      this.$root.alert.autoClose = false
      this.$root.alert.message = message

      window.scrollTo({ top: 0, behavior: 'smooth' })
    },

    /**
     * Show a success message.
     */
    alertSuccess (message, autoClose = 6000) {
      this.$root.alert.type = 'success'
      this.$root.alert.autoClose = autoClose
      this.$root.alert.message = message

      window.scrollTo({ top: 0, behavior: 'smooth' })
    },

    /**
     * Show a warning message.
     */
    alertWarning (message, autoClose) {
      this.$root.alert.type = 'warning'
      this.$root.alert.autoClose = autoClose
      this.$root.alert.message = message

      window.scrollTo({ top: 0, behavior: 'smooth' })
    },

    /**
     * Show confirmation message.
     */
    alertConfirm (message, success, failure) {
      this.$root.alert.type = 'confirmation'
      this.$root.alert.autoClose = false
      this.$root.alert.message = message
      this.$root.alert.confirmationProceed = success
      this.$root.alert.confirmationCancel = failure

      window.scrollTo({ top: 0, behavior: 'smooth' })
    },

    /**
     * Show confirmation message.
     */
    closeAlert () {
      this.$root.alert = {
        type: null,
        autoClose: 0,
        message: '',
        confirmationProceed: null,
        confirmationCancel: null
      }
    },
  }
}
