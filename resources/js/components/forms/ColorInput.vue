<template>
  <div class="relative mb-3">
    <input :id="id?id:name" v-model="form[name]" :disabled="disabled"
           type="color"
           :name="name"
    >
    <label v-if="label" :for="id?id:name" class="text-gray-700 dark:text-gray-300">
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>
    <has-error :form="form" :field="name" />
  </div>
</template>

<script>
export default {
  name: 'ColorInput',

  props: {
    id: { type: String, default: null },
    nativeType: { type: String, default: 'text' },
    name: { type: String, required: true },
    label: { type: String, required: false },
    form: { type: Object, required: true },
    disabled: { type: Boolean, default: false },
    required: { type: Boolean, default: false }
  },

  data: () => ({}),

  computed: {
    inputStyle () {
      return {
        '--tw-ring-color': this.color
      }
    }
  },

  watch: {},

  created () {}
}
</script>
