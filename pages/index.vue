<template>
  <div>
    <Header />
    <v-toolbar dark class="px-16 grad-bkg display-3">
      <v-spacer />
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo($refs.about)">
        О нас
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo($refs.work, {offset: -30})">
        Как мы работаем
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo($refs.equipment)">
        Оборудование
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo($refs.defects)">
        Типовые неисправности
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo($refs.consult)">
        Бесплатная консультация
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo($refs.recalls)">
        Отзывы
      </div>
      <div v-ripple class="menu-btn px-3 py-1" @click="$vuetify.goTo(9999)">
        Контакты
      </div>
    </v-toolbar>
    <slider />
    <advantages ref="advantages" />
    <about ref="about" />
    <work ref="work" />
    <defects ref="defects" />
    <equipment ref="equipment" />
    <consult ref="consult" />
    <recalls ref="recalls" class="mt-3" />
  </div>
</template>

<script>
import Header from '~/components/Header'
import Work from '~/components/Work'
import Advantages from '~/components/Advantages'
import Recalls from '~/components/Recalls'
import About from '~/components/About'
import Slider from '~/components/Slider'
import Consult from '~/components/Consult'
import Equipment from '~/components/Equipment'
import Defects from '~/components/Defects'
export default {
  components: {
    Header,
    Work,
    Advantages,
    Recalls,
    About,
    Slider,
    Consult,
    Equipment,
    Defects
  }
}
</script>

<style scoped>
  .menu-btn {cursor: pointer; font-size: 19px;}
</style>
