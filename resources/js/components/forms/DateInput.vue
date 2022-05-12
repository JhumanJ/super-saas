<template>
  <div class="relative" :class="marginBottom">
    <label v-if="label" :for="id?id:name"
           :class="[theme.default.label,{'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}]"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>
    <t-datepicker :id="id?id:name" v-model="compVal" class="datepicker" :disabled="disabled"
                  :style="inputStyle" :name="name" :accept="accept" :fixed-classes="componentClasses"
                  :placeholder="placeholder" :timepicker="withTime" date-format="Z"
                  :user-format="withTime?'F j, Y - H:i':'F j, Y'"
    />
    <small v-if="help" :class="theme.default.help" v-text="help"/>
    <has-error v-if="form" :form="form" :field="name"/>
  </div>
</template>

<script>
import {fixedClasses} from '../../plugins/config/vue-tailwind/datePicker'
import inputMixin from '~/mixins/forms/input'

export default {
  name: 'DateInput',
  mixins: [inputMixin],

  props: {
    withTime: {type: Boolean, default: false},
    accept: {type: String, default: null},
  },

  data: () => ({
  }),

  computed: {
    componentClasses () {
      const classes = {...fixedClasses}
      classes.input = this.theme.default.input
      if (this.form && this.form.errors.has(this.name)) {
        classes.input = classes.input + ' ring-red-500 ring-2'
      }
      if (this.disabled) {
        classes.input = classes.input + ' cursor-not-allowed bg-gray-200'
      }

      return classes
    }
  },

  watch: {},

  mounted() {},

  methods: {
    /**
     * Pressing enter won't submit form
     * @param event
     * @returns {boolean}
     */
    onEnterPress(event) {
      event.preventDefault()
      return false
    }
  }
}
</script>
