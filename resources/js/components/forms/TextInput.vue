<template>
  <div class="relative mb-3">
    <label v-if="label" :for="id?id:name" class="text-gray-700 dark:text-gray-300 font-bold"
           :class="{'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>
    <input :id="id?id:name" v-model="form[nativeType!=='file'?name:'file-'+name]" :disabled="disabled"
           :type="nativeType"
           :class="{ 'ring-red-500 ring-2': validation && form.errors.has(name), 'cursor-not-allowed bg-gray-200':disabled }"
           class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 dark:bg-notion-dark-light dark:text-gray-300 dark:placeholder-gray-500 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent"
           :style="inputStyle" :name="name" :accept="accept"
           :placeholder="placeholder"
           @change="onChange" @keydown.enter.prevent="onEnterPress"
    >
    <small v-if="help" class="text-gray-400 dark:text-gray-500" v-text="help" />
    <has-error v-if="validation" :form="form" :field="name" />
  </div>
</template>

<script>
export default {
  name: 'TextInput',

  props: {
    id: { type: String, default: null },
    nativeType: { type: String, default: 'text' },
    name: { type: String, required: true },
    label: { type: String, required: false },
    form: { type: Object, required: true },
    validation: { type: Boolean, default: true }, // If form is not really a form
    required: { type: Boolean, default: false },
    disabled: { type: Boolean, default: false },
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
    onChange (event) {
      if (this.nativeType !== 'file') return

      const file = event.target.files[0]
      this.$set(this.form, this.name, file)
    },
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
