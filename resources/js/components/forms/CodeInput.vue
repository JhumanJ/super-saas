<template>
  <div class="relative" :class="marginBottom">
    <label v-if="label" :for="id?id:name"
           :class="[theme.CodeInput.label,{'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}]"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>

    <prism-editor :id="id?id:name" v-model="compVal" :disabled="disabled"
                  class="code-editor"
                  :class="[theme.CodeInput.input,{ 'ring-red-500 ring-2': form && form.errors.has(name), 'cursor-not-allowed bg-gray-200':disabled }]"
                  :style="inputStyle" :name="name"
                  :placeholder="placeholder"
                  :highlight="highlighter"
    />

    <small v-if="help" :class="theme.CodeInput.help" v-text="help"/>
    <has-error v-if="form" :form="form" :field="name"/>
  </div>
</template>

<script>
// import Prism Editor
import {PrismEditor} from 'vue-prism-editor'
import 'vue-prism-editor/dist/prismeditor.min.css'
import {highlight, languages} from 'prismjs/components/prism-core'
import 'prismjs/components/prism-clike'
import 'prismjs/components/prism-markup'
import 'prismjs/themes/prism-tomorrow.css' // import syntax highlighting styles
import inputMixin from '~/mixins/forms/input'

export default {
  name: 'CodeInput',

  mixins: [inputMixin],

  components: {PrismEditor},

  props: {},

  methods: {
    highlighter(code) {
      return highlight(code, languages.markup) // languages.<insert language> to return html with markup
    }
  }
}
</script>
