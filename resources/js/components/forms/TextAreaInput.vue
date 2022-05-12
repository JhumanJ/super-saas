<template>
  <div class="relative" :class="marginBottom">
    <label v-if="label" :for="id?id:name"
           :class="[theme.default.label, {'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}]"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>
    <textarea :id="id?id:name" v-model="compVal" :disabled="disabled"
              :type="nativeType" :class="[theme.default.input,{ 'ring-red-500 ring-2': form && form.errors.has(name) }]"
              class="resize-y"
              :name="name" :style="inputStyle"
              :placeholder="placeholder"
    />
    <small v-if="help" :class="theme.default.help" v-text="help" />
    <has-error v-if="form" :form="form" :field="name" />
  </div>
</template>

<script>
import inputMixin from '~/mixins/forms/input'

export default {
  mixins: [inputMixin],
  name: 'TextAreaInput',

  props: {
    nativeType: { type: String, default: 'text' },
  },
}
</script>
