<template>
  <div class="relative" :class="marginBottom">
    <v-checkbox :id="id?id:name" v-model="compVal" :disabled="disabled" :name="name">
      {{ label }}
    </v-checkbox>
    <small v-if="help" :class="theme.default.help" v-text="help" />
    <has-error v-if="form" :form="form" :field="name" />
  </div>
</template>

<script>
import VCheckbox from './components/VCheckbox'
import inputMixin from '~/mixins/forms/input'

export default {
  name: 'CheckboxInput',
  mixins: [inputMixin],
  components: { VCheckbox },

  mounted () {
    this.$emit('input', !!this.form[name])
  },
}
</script>
