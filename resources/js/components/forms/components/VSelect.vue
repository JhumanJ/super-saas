<template>
  <div class="v-select">
    <label v-if="label" class="text-gray-700 dark:text-gray-300 font-bold"
           :class="{'uppercase text-xs':uppercaseLabels, 'text-sm':!uppercaseLabels}"
    >
      {{ label }}
      <span v-if="required" class="text-red-500 required-dot">*</span>
    </label>

    <div v-on-clickaway="closeDropdown"
         class="relative"
    >
      <span class="inline-block w-full rounded-md shadow-sm">
        <button type="button" :dusk="dusk" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                class="cursor-pointer relative w-full rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full px-4 bg-white text-gray-700 placeholder-gray-400 dark:bg-notion-dark-light dark:text-gray-300 dark:placeholder-gray-600 shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent"
                :style="inputStyle" :class="{'py-2':!multiple || loading,'py-1': multiple}" @click="openDropdown"
        >
          <div :class="{'h-6':!multiple, 'min-h-8':multiple && !loading}">
            <svg v-if="loading" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-nt-blue animate-spin mx-auto"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
              />
            </svg>
            <div v-else-if="value" class="flex" :class="{'min-h-8':multiple}">
              <slot name="selected" :option="value" />
            </div>
            <slot v-else-if="data.lenght == 0 " name="empty-placeholder" />
            <slot v-else name="placeholder">
              <div class="text-gray-400 dark:text-gray-500 w-full text-left">
                {{ placeholder }}
              </div>
            </slot>
          </div>
          <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
              <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
        </button></span>
      <!-- Select popover, show/hide based on select state. -->
      <div v-show="isOpen" :dusk="dusk+'_dropdown'" class="absolute mt-1 w-full rounded-md bg-white dark:bg-notion-dark-light shadow-lg z-10">
        <ul tabindex="-1" role="listbox" aria-labelled by="listbox-label" aria-activedescendant="listbox-item-3"
            class="rounded-md text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5 relative"
            :class="{'max-h-42 py-1': !isSearchable,'max-h-48 pb-1': isSearchable}"
        >
          <div v-if="isSearchable" class="px-2 pt-2 sticky top-0 bg-white z-10">
            <text-input name="search" :form="form" :validation="false" placeholder="Search..." />
          </div>
          <div v-if="loading" class="w-full py-2 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-nt-blue animate-spin mx-auto"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
              />
            </svg>
          </div>
          <template v-if="filteredOptions.length>0">
            <li v-for="item in filteredOptions" :key="item[optionKey]" role="option"
                class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9  cursor-pointer hover:text-white hover:bg-nt-blue focus:outline-none focus:text-white focus:bg-nt-blue"
                :dusk="dusk+'_option'" @click="select(item)"
            >
              <slot name="option" :option="item" :selected="isSelected(item)" />
            </li>
          </template>
          <p v-else-if="!loading" class="w-full text-gray-500 text-center py-2">
            No option available.
          </p>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { directive as onClickaway } from 'vue-clickaway'
import TextInput from '../TextInput'
import Fuse from 'fuse.js'
import debounce from 'lodash/debounce'

export default {
  name: 'VSelect',
  components: { TextInput },
  directives: {
    onClickaway: onClickaway
  },
  props: {
    data: Array,
    value: { default: null },
    label: { type: String, default: null },
    dusk: { type: String, default: null },
    loading: { type: Boolean, default: false },
    required: { type: Boolean, default: false },
    multiple: { type: Boolean, default: false },
    searchable: { type: Boolean, default: false },
    remote: { type: Function, default: null },
    searchKeys: { type: Array, default: () => ['name'] },
    optionKey: { type: String, default: 'id' },
    emitKey: { type: String, default: null }, // Key used for emitted value, emit object if null,
    color: { type: String, default: '#3B82F6' },
    placeholder: { type: String, default: null },
    uppercaseLabels: { type: Boolean, default: true }
  },
  data () {
    return {
      isOpen: false,
      form: {
        search: ''
      }
    }
  },
  computed: {
    inputStyle () {
      return {
        '--tw-ring-color': this.color
      }
    },
    debouncedRemote () {
      if (this.remote) {
        return debounce(this.remote, 300)
      }
      return null
    },
    filteredOptions () {
      if (!this.data) return []
      if (!this.searchable || this.remote || this.form.search === '') {
        return this.data
      }

      // Fuze search
      const fuzeOptions = {
        keys: this.searchKeys
      }
      const fuse = new Fuse(this.data, fuzeOptions)
      return fuse.search(this.form.search).map((res) => {
        return res.item
      })
    },
    isSearchable () {
      return this.searchable || this.remote !== null
    }
  },
  watch: {
    'form.search': function (val) {
      if (!this.debouncedRemote) return
      if ((this.remote && val) || (val === '' && !this.value) || (val === '' && this.isOpen)) {
        return this.debouncedRemote(val)
      }
    }
  },
  methods: {
    isSelected (value) {
      if (!this.value) return false

      if (this.emitKey && value[this.emitKey]) {
        value = value[this.emitKey]
      }

      if (this.multiple) {
        return this.value.includes(value)
      }
      return this.value === value
    },
    closeDropdown () {
      this.isOpen = false
      this.form.search = ''
    },
    openDropdown () {
      this.isOpen = !this.isOpen
    },
    select (value) {
      if (!this.multiple) {
        this.closeDropdown()
      }

      if (this.emitKey) {
        value = value[this.emitKey]
      }

      if (this.multiple) {
        const emitValue = Array.isArray(this.value) ? [...this.value] : []

        // Already in value, remove it
        if (this.isSelected(value)) {
          this.$emit('input', emitValue.filter((item) => {
            if (this.emitKey) {
              return item !== value
            }
            return item[this.optionKey] !== value && item[this.optionKey] !== value[this.optionKey]
          }))
          return
        }

        // Otherwise add value
        emitValue.push(value)
        this.$emit('input', emitValue)
      } else {
        if (this.value === value) {
          this.$emit('input', null)
        } else {
          this.$emit('input', value)
        }
      }
    }
  }
}
</script>
