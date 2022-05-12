<template>
  <div class="relative mb-3">
    <label v-if="label" :for="id?id:name"
           :class="[theme.default.label,{'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}]"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>
    <input :id="id?id:name" v-model="compVal" :disabled="disabled"
           :type="nativeType"
           :class="[theme.default.input,{ 'ring-red-500 ring-2': form && form.errors && form.errors.has(name), 'cursor-not-allowed bg-gray-200':disabled }]"
           :style="inputStyle" :name="name" :accept="accept"
           :placeholder="placeholder"
           @change="onChange" @keydown.enter.prevent="onEnterPress"
    >
    <small v-if="help" :class="theme.default.help" v-text="help"/>
    <has-error v-if="form" :form="form" :field="name"/>
  </div>
</template>

<script>
import inputMixin from '~/mixins/forms/input'

export default {
  name: 'TextInput',
  mixins: [inputMixin],

  props: {
    nativeType: {type: String, default: 'text'},
    accept: {type: String, default: null},
  },

  data: () => ({}),

  computed: {
    compVal: {
      set(val) {
        if (this.form) {
          this.$set(this.form, this.nativeType !== 'file' ? this.name : 'file-' + this.name, val)
        } else {
          this.content = val
        }
        this.$emit('input', val)
      },
      get() {
        if (this.form) {
          return this.form[this.nativeType !== 'file' ? this.name : 'file-' + this.name]
        }
        return this.content
      }
    }
  },

  watch: {},

  created() {
  },

  methods: {
    onChange(event) {
      if (this.nativeType !== 'file') return
      this.compVal = event.target.files[0]
    },
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
