<template>
  <v-container>
    <v-row align="center" justify="center" class="mt-5">
      <v-col cols="12" md="12" xs="12" class="text-center">
        <h1 class="text-xs-center display-4 font-weight-bold">
          404
        </h1>
      </v-col>
      <v-col cols="12" md="12" xs="12" class="text-center">
        <h1 class="text-xs-center display-2">
          Страница не найдена
        </h1>
      </v-col>
      <v-col cols="12" md="12" xs="12" class="text-center">
        <p class="text-xs-center title mt-4">
          Сожалеем, но такой страницы не существует.
        </p>
      </v-col>
      <v-btn x-large dark color="indigo" nuxt to="/">
        Перейти на главную
      </v-btn>
      <v-col cols="12" md="12" xs="12" class="text-center">
        <img :src="mimeTypeUrl()" width="220">
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props: {
    error: {
      type: Object,
      default: null
    }
  },
  data () {
    return {
      pageNotFound: '404 Not Found',
      otherError: 'An error occurred'
    }
  },
  head () {
    const title =
      this.error.statusCode === 404 ? this.pageNotFound : this.otherError
    return {
      title
    }
  },
  methods: {
    mimeTypeUrl () { return require('~/static/logo.jpg') }
  }
}
</script>
