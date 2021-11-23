<template>
  <div>
    <div class="mt-6 flex flex-col">
      <div class="w-full md:max-w-3xl md:mx-auto px-4 md:pt-16">
        <h1 class="sm:text-5xl">
          Terms & Conditions
        </h1>
      </div>
    </div>
    <saas-footer/>
  </div>
</template>

<script>
import SaasFooter from "../../components/pages/SaasFooter";

export default {
  components: {SaasFooter},
  layout: 'default',

  metaInfo () {
    return { title: 'Terms & Conditions' }
  },

  data: () => ({
  }),

  computed: {},

  mounted () {
  }
}
</script>
