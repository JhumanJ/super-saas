<template>
  <div class="relative" :class="marginBottom">
    <v-select v-model="compVal"
              :dusk="name"
              :data="options"
              :label="label"
              :option-key="optionKey"
              :emit-key="optionKey"
              :required="required"
              :multiple="multiple"
              :searchable="searchable"
              :loading="loading"
              :color="color"
              :placeholder="placeholder"
              :uppercase-labels="uppercaseLabels"
              :theme="theme"
              :emptyable="emptyable"
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
    <small v-if="help" :class="theme.SelectInput.help" v-text="help" />
    <has-error v-if="form" :form="form" :field="name" />
  </div>
</template>

<script>
import inputMixin from '~/mixins/forms/input'

/**
 * Options: {name,value} objects
 */
export default {
  name: 'SelectInput',
  mixins: [inputMixin],

  props: {
    options: { type: Array, required: true },
    optionKey: { type: String, default: 'value' },
    displayKey: { type: String, default: 'name' },
    emitKey: { type: String, default: 'value' },
    loading: { type: Boolean, default: false },
    multiple: { type: Boolean, default: false },
    searchable: { type: Boolean, default: false },
    emptyable: { type: Boolean, default: false }
  },

  data: () => ({}),

  watch: {},

  created () {},

  methods: {
    getOptionName (val) {
      const option = this.options.find((option) => {
        return option[this.optionKey] === val
      })
      if (option) return option[this.displayKey]
      return null
    }
  }
}
</script>
