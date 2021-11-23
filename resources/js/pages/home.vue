<template>
  <div class="flex flex-col min-h-full mt-6">
    <div class="w-full flex-grow md:w-3/5 lg:w-1/2 md:mx-auto md:max-w-2xl px-4">
      <div>
        <div class="flex flex-wrap items-center mt-6 mb-4">
          <h2 class="text-nt-blue text-3xl font-bold flex-grow">
            Dashboard
          </h2>
        </div>
      </div>
    </div>
    <saas-footer class="mt-8" />
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import SaasFooter from "../components/pages/SaasFooter";

export default {
  components: { SaasFooter },

  middleware: 'auth',

  props: {},

  data () {
    return {}
  },

  mounted () {},

  methods: {},

  computed: {
    ...mapGetters({
      user: 'auth/user'
    })
  }
}
</script>
