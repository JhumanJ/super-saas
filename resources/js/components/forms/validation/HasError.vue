<template>
  <div v-if="hasError" class="text-sm text-red-500 -bottom-3"
       v-html="errorMessage"
  />
</template>

<script>
export default {
  name: 'HasError',
  props: {
    form: {
      type: Object,
      required: true
    },
    field: {
      type: String,
      required: true
    }
  },
  computed: {
    hasError () {
      return this.form && this.form.errors && this.form.errors.has(this.field)
    },
    errorMessage () {
      if (this.hasError) {
        return this.form.errors.get(this.field)
      }
      return null
    }
  }
}
</script>
