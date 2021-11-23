<template>
  <div class="flex mt-6">
    <div class="w-full md:w-2/3 md:mx-auto md:max-w-md  px-4">
      <template v-if="mustVerifyEmail">
        <h1 class="my-6">
          {{ $t('register') }}
        </h1>
        <div class="text-green-500">
          {{ $t('verify_email_address') }}
        </div>
      </template>
      <template v-else>
        <h1 class="my-6">
          {{ $t('register') }}
        </h1>
        <form @submit.prevent="register" @keydown="form.onKeydown($event)">
          <!-- Name -->
          <text-input name="name" :form="form" :label="$t('name')" :required="true" />

          <!-- Email -->
          <text-input name="email" :form="form" :label="$t('email')" :required="true" />

          <select-input name="hear_about_us" :options="[
            {name: 'Facebook', value: 'facebook'},
            {name: 'Twitter', value: 'twitter'},
            {name: 'Reddit', value: 'reddit'},
            {name: 'Search Engine (Google, DuckDuckGo...)', value: 'search_engine'},
            {name: 'Friend or Colleague', value: 'friend_colleague'},
            {name: 'Blog/Article', value: 'blog_article'},
            {name: 'Other', value: 'other'},
          ]" :form="form" label="How did you hear about us?" :required="true"
          />

          <!-- Password -->
          <text-input native-type="password"
                      name="password" :form="form" :label="$t('password')" :required="true"
          />

          <!-- Password Confirmation-->
          <text-input class="mb-4" native-type="password"
                      name="password_confirmation" :form="form" :label="$t('confirm_password')" :required="true"
          />

          <!-- Submit Button -->
          <v-button class="w-full" :loading="form.busy">
            {{ $t('register') }}
          </v-button>

          <!-- GitHub Register Button -->
          <login-with-github />
        </form>
      </template>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'
import SelectInput from '../../components/forms/SelectInput'

export default {
  components: {
    SelectInput,
    LoginWithGithub
  },

  middleware: 'guest',

  metaInfo () {
    return { title: this.$t('register') }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'onboarding' })
      }
    }
  }
}
</script>
