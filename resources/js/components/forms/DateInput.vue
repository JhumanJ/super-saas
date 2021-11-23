<template>
  <div class="relative mb-3">
    <label v-if="label" :for="id?id:name" class="text-gray-700 dark:text-gray-300 font-bold"
           :class="{'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>
    <t-datepicker :id="id?id:name" v-model="form[name]" class="datepicker" :disabled="disabled"
                  :class="{ 'ring-red-500 ring-2': validation && form.errors.has(name), 'cursor-not-allowed bg-gray-200':disabled }"
                  :style="inputStyle" :name="name" :accept="accept"
                  :placeholder="placeholder" :timepicker="withTime" date-format="Z" :user-format="withTime?'F j, Y - H:i':'F j, Y'"
    />
    <small v-if="help" class="text-gray-400 dark:text-gray-500" v-text="help" />
    <has-error v-if="validation" :form="form" :field="name" />
  </div>
</template>

<script>
export default {
  name: 'DateInput',

  props: {
    id: { type: String, default: null },
    name: { type: String, required: true },
    label: { type: String, required: false },
    form: { type: Object, required: true },
    validation: { type: Boolean, default: true }, // If form is not really a form
    required: { type: Boolean, default: false },
    disabled: { type: Boolean, default: false },
    withTime: { type: Boolean, default: false },
    uppercaseLabels: { type: Boolean, default: true },
    placeholder: { type: String, default: null },
    accept: { type: String, default: null },
    help: { type: String, default: null },
    color: { type: String, default: '#3B82F6' }
  },

  data: () => ({}),

  computed: {
    inputStyle () {
      return {
        '--tw-ring-color': this.color
      }
    },
    formType () {
      return typeof this.form
    }
  },

  watch: {},

  created () {},

  methods: {
    /**
     * Pressing enter won't submit form
     * @param event
     * @returns {boolean}
     */
    onEnterPress (event) {
      event.preventDefault()
      return false
    }
  }
}
</script>
