<template>
  <div class="relative mb-3">
    <label v-if="label" :for="id?id:name" class="text-gray-700 dark:text-gray-300 font-bold"
           :class="{'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>

    <prism-editor :id="id?id:name" v-model="form[name]" :disabled="disabled"
                  class="code-editor rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full bg-white text-gray-700 dark:bg-notion-dark-light dark:text-gray-300 dark:placeholder-gray-500 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent p-2"
                  :class="{ 'ring-red-500 ring-2': validation && form.errors.has(name), 'cursor-not-allowed bg-gray-200':disabled }"
                  :style="inputStyle" :name="name"
                  :placeholder="placeholder"
                  :highlight="highlighter" @change="onChange"
    />

    <small v-if="help" class="text-gray-400 dark:text-gray-500" v-text="help" />
    <has-error v-if="validation" :form="form" :field="name" />
  </div>
</template>

<script>
// import Prism Editor
import { PrismEditor } from 'vue-prism-editor'
import 'vue-prism-editor/dist/prismeditor.min.css' // import the styles somewhere
// import highlighting library (you can use any library you want just return html string)

import { highlight, languages } from 'prismjs/components/prism-core'
import 'prismjs/components/prism-clike'
import 'prismjs/components/prism-markup'
import 'prismjs/themes/prism-tomorrow.css' // import syntax highlighting styles

export default {
  name: 'CodeInput',

  components: { PrismEditor },

  props: {
    id: { type: String, default: null },
    name: { type: String, required: true },
    label: { type: String, required: false },
    form: { type: Object, required: true },
    validation: { type: Boolean, default: true }, // If form is not really a form
    required: { type: Boolean, default: false },
    disabled: { type: Boolean, default: false },
    uppercaseLabels: { type: Boolean, default: true },
    placeholder: { type: String, default: null },
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
      const file = event.target.files[0]
      this.$set(this.form, this.name, file)
    },
    highlighter (code) {
      return highlight(code, languages.markup) // languages.<insert language> to return html with markup
    }
  }
}
</script>
