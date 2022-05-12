import {themes} from '~/config/form-themes'

export default {
  props: {
    id: {type: String, default: null},
    name: {type: String, required: true},
    label: {type: String, required: false},
    form: {type: Object, required: false},
    value: {required: false},
    disabled: {type: Boolean, default: false},
    placeholder: {type: String, default: null},
    uppercaseLabels: { type: Boolean, default: true },
    help: {type: String, default: null}, // Show help or bot
    theme: {type: Object, default: () => themes.default},
    color: { type: String, default: '#3B82F6' },
    required: { type: Boolean, default: false },
    marginBottom: { type: String, default: 'mb-3' },
  },

  data () {
    return {
      content: this.form ? this.form[this.name] : this.value,
    }
  },

  computed: {
    inputStyle () {
      return {
        '--tw-ring-color': this.color + ' !important'
      }
    },
    compVal: {
      set(val) {
        if (this.form) {
          this.$set(this.form, this.name, val)
        } else {
          this.content = val
        }
        this.$emit('input', this.compVal)
      },
      get() {
        if (this.form) {
          return this.form[this.name]
        }
        return this.content
      }
    }
  },
}
