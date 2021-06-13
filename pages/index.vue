<template>
  <div>
    <Header />
    <v-toolbar dark class="px-16">
      <v-spacer />
      <div v-ripple class="menu-btn px-3 py-1">
        О нас
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo(9999)">
        Контакты
      </div>
    </v-toolbar>
    <work ref="work" />
  </div>
</template>

<script>
import Header from '~/components/Header.vue'
import Work from '~/components/Work.vue'
export default {
  components: {
    Header,
    Work
  }
}
</script>

<style scoped>
  .menu-btn {cursor: pointer; font-size: 19px;}
</style>
