<template>
  <div class="relative mb-3">
    <label v-if="label" :for="id?id:name" class="text-gray-700 dark:text-gray-300 font-bold"
           :class="{'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>
    <vue-editor :id="id?id:name" ref="editor" v-model="form[name]" :disabled="disabled"
                :placeholder="placeholder" :class="{ 'ring-red-500 ring-2': validation && form.errors.has(name) }"
                :editor-toolbar="editorToolbar" class="rich-editor rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full bg-white text-gray-700 dark:bg-notion-dark-light dark:text-gray-300 dark:placeholder-gray-500 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent resize-y"
                :style="inputStyle"
    />

    <small v-if="help" class="text-gray-400 dark:text-gray-500" v-text="help" />
    <has-error v-if="validation" :form="form" :field="name" />
  </div>
</template>

<script>
import { VueEditor, Quill } from 'vue2-editor'

export default {
  name: 'RichTextAreaInput',
  components: { VueEditor },

  props: {
    id: { type: String, default: null },
    name: { type: String, required: true },
    label: { type: String, required: false },
    form: { type: Object, required: true },
    editorToolbar: {
      type: Array,
      default: () => {
        return [
          [{ header: 1 }, { header: 2 }],
          ['bold', 'italic', 'underline', 'link'],
          [{ list: 'ordered' }, { list: 'bullet' }]
        ]
      }
    },
    required: { type: Boolean, default: false },
    validation: { type: Boolean, default: true }, // If form is not really a form
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
    }
  },

  watch: {},

  created () {}
}
</script>

<style lang="scss">
.rich-editor {
  .ql-container {
    border-bottom: 0px !important;
    border-right: 0px !important;
    border-left: 0px !important;

    .ql-editor {
      min-height: 100px !important;
    }
  }

  .ql-toolbar {
    border-top: 0px !important;
    border-right: 0px !important;
    border-left: 0px !important;
  }

  .ql-snow .ql-toolbar .ql-picker-item.ql-selected, .ql-snow .ql-toolbar .ql-picker-item:hover, .ql-snow .ql-toolbar .ql-picker-label.ql-active, .ql-snow .ql-toolbar .ql-picker-label:hover, .ql-snow .ql-toolbar button.ql-active, .ql-snow .ql-toolbar button:focus, .ql-snow .ql-toolbar button:hover, .ql-snow.ql-toolbar .ql-picker-item.ql-selected, .ql-snow.ql-toolbar .ql-picker-item:hover, .ql-snow.ql-toolbar .ql-picker-label.ql-active, .ql-snow.ql-toolbar .ql-picker-label:hover, .ql-snow.ql-toolbar button.ql-active, .ql-snow.ql-toolbar button:focus, .ql-snow.ql-toolbar button:hover {
    @apply text-nt-blue;
  }
}
</style>
