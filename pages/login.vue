<template>
  <v-container>
    <v-card class="pa-6 mx-auto" width="400">
      <v-row justify="center">
        <img src="logo.jpg" width="180">
      </v-row>
      <v-text-field
        v-model="login"
        :error-messages="loginErrors"
        prepend-icon="mdi-account"
        label="Логин"
        required
        clearable
        @blur="$v.login.$touch()"
      />
      <v-text-field
        v-model="password"
        :error-messages="passwordErrors"
        prepend-icon="mdi-lock"
        label="Пароль"
        required
        clearable
        :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
        :type="showPass ? 'text' : 'password'"
        @click:append="showPass = !showPass"
        @blur="$v.password.$touch()"
        @keyup.enter="submit"
      />
      <v-card-actions>
        <v-btn text color="indigo" @click="clear">
          Сбросить
        </v-btn>
        <v-spacer />
        <v-btn text color="indigo" @click="submit">
          Войти
        </v-btn>
      </v-card-actions>
    </v-card>
    <v-snackbar
      v-model="errorAlert"
      timeout="2500"
      top
      dark
      color="red"
    >
      <v-row align="center" justify="space-around">
        <v-spacer />
        <div class="subtitle-1">
          Ошибка авторизации!
        </div>
        <v-spacer />
        <v-btn
          dark
          icon
          @click="errorAlert = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-row>
    </v-snackbar>
  </v-container>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required } from 'vuelidate/lib/validators'

export default {
  mixins: [validationMixin],
  layout: 'empty',
  validations: {
    login: { required },
    password: { required }
  },
  middleware: 'check',
  data: () => ({
    login: '',
    password: '',
    errorAlert: false,
    showPass: false
  }),
  head () {
    return {
      title: 'Введите логин и пароль'
    }
  },
  computed: {
    loginErrors () {
      const errors = []
      if (!this.$v.login.$dirty) { return errors }
      !this.$v.login.required && errors.push('Обязательное поле!')
      return errors
    },
    passwordErrors () {
      const errors = []
      if (!this.$v.password.$dirty) { return errors }
      !this.$v.password.required && errors.push('Обязательное поле!')
      return errors
    }
  },
  methods: {
    submit () {
      if (this.login !== 'service_mobil' || this.password !== '20_service_23') {
        this.errorAlert = true
        this.clear()
      } else {
        this.$cookies.set('_qHWj5dMs-p23yBpaJ', '_qHWj5dMs-p23yBpaJ', {
          path: '/',
          maxAge: 60 * 60 * 24 * 7
        })
        this.$v.$touch()
        setTimeout(() => {
          this.$router.push('/admin')
        }, 1000)
      }
    },
    clear () {
      this.$v.$reset()
      this.login = ''
      this.password = ''
    }
  }
}
</script>
