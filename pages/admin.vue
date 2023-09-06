<template>
  <v-container>
    Admin
  </v-container>
</template>

<script>
export default {
  middleware: 'auth',
  data () {
    return {
      items: []
    }
  },
  head () {
    return {
      title: 'Панель администратора'
    }
  },
  mounted () {
    this.getComments()
  },
  methods: {
    async getComments () {
      const response = await this.$axios.get('getcomment.php')
      this.items = response.data
    }
  }
}
</script>
