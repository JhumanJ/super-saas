<template>
  <div class="relative mb-3">
    <v-select v-model="form[name]"
              :dusk="name"
              :data="options"
              :label="label"
              :option-key="optionKey"
              :emit-key="emitKey"
              :required="required"
              :multiple="multiple"
              :searchable="searchable"
              :loading="loading"
              :color="color"
              :placeholder="placeholder"
              :uppercase-labels="uppercaseLabels"
    >
      <template #selected="{option}">
        <template v-if="multiple">
          <div class="flex items-center truncate mr-6">
            <span v-for="(item,index) in option" :key="item" class="truncate">
              <span v-if="index!==0">, </span>
              {{ getOptionName(item) }}
            </span>
          </div>
        </template>
        <template v-else>
          <slot name="selected" :option="option" :optionName="getOptionName(option)">
            <div class="flex items-center truncate mr-6">
              <div>{{ getOptionName(option) }}</div>
            </div>
          </slot>
        </template>
      </template>
      <template #option="{option, selected}">
        <slot name="option" :option="option" :selected="selected">
          <span class="flex hover:text-white">
            <p class="flex-grow hover:text-white">
              {{ option.name }}
            </p>
            <span v-if="selected" class="absolute inset-y-0 right-0 flex items-center pr-4">
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                />
              </svg>
            </span>
          </span>
        </slot>
      </template>
    </v-select>
    <small v-if="help" class="text-gray-400 dark:text-gray-500" v-text="help" />
    <has-error v-if="validation" :form="form" :field="name" />
  </div>
</template>

<script>
/**
 * Options: {name,value} objects
 */
export default {
  name: 'SelectInput',

  props: {
    options: { type: Array, required: true },
    optionKey: { type: String, default: 'value' },
    emitKey: { type: String, default: 'value' },
    label: { type: String, default: null },
    help: { type: String, default: null },
    loading: { type: Boolean, default: false },
    required: { type: Boolean, default: false },
    multiple: { type: Boolean, default: false },
    searchable: { type: Boolean, default: false },
    validation: { type: Boolean, default: true }, // If form is not really a form
    form: { type: Object, required: true },
    name: { type: String, required: true },
    placeholder: { type: String, default: null },
    color: { type: String, default: '#3B82F6' },
    uppercaseLabels: { type: Boolean, default: true }
  },

  data: () => ({}),

  watch: {},

  created () {},

  methods: {
    getOptionName (val) {
      return this.options.find((option) => {
        return option.value === val
      }).name
    }
  }
}
</script>
