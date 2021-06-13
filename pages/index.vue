<template>
  <div>
    <Header />
    <v-toolbar dark class="px-16">
      <v-spacer />
      <div v-ripple class="menu-btn px-3 py-1">
        О нас
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo($refs.advantages, {offset: -530})">
        Как мы работаем
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo(9999)">
        Контакты
      </div>
    </v-toolbar>
    <advantages ref="advantages" />
    <work ref="work" />
  </div>
</template>

<script>
import Header from '~/components/Header.vue'
import Work from '~/components/Work.vue'
import Advantages from '~/components/Advantages.vue'
export default {
  components: {
    Header,
    Work,
    Advantages
  }
}
</script>

<style scoped>
  .menu-btn {cursor: pointer; font-size: 19px;}
</style>
