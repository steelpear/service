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
      <v-spacer />
    </v-toolbar>
    <slider />
    <advantages ref="advantages" />
    <about ref="about" />
    <work ref="work" />
    <defects ref="defects" />
    <equipment ref="equipment" />
    <consult ref="consult" />
    <recalls ref="recalls" class="mt-3" />
    <v-footer
      dark
      class="py-10 px-12 grad-bkg"
    >
      <v-row>
        <v-col
          cols="12"
          xs="12"
          sm="12"
          md="3"
        >
          <v-row align="start">
            <v-icon
              large
            >
              mdi-map-marker-outline
            </v-icon>
            <v-col class="pt-0">
              <div class="title">
                Республика Крым
              </div>
              <div class="title">
                г.Керчь, ул.Ерёменко 30И
              </div>
              <div>(здание швейной фабрики)</div>
            </v-col>
          </v-row>
          <v-row class="mt-3">
            <v-icon
              large
            >
              mdi-phone-in-talk-outline
            </v-icon>
            <div class="headline ml-2">
              <a href="tel:+7 (978) 895-11-10" style="color: inherit; text-decoration: none;">+7 (978) 895-11-10</a>
            </div>
          </v-row>
          <v-divider class="my-6" width="70%" />
          <v-row align="start">
            <v-icon
              large
            >
              mdi-clock-outline
            </v-icon>
            <v-col class="pt-0">
              <div class="title">
                Режим работы:
              </div>
              <div class="title">
                с 10.00 до 18.00
              </div>
              <div class="title">
                без перерыва
              </div>
              <div class="title">
                без выходных
              </div>
            </v-col>
          </v-row>
        </v-col>
        <v-col
          cols="12"
          xs="12"
          sm="12"
          md="6"
        >
          <yandex-map
            :coords="coords"
            zoom="16"
            style="height: 300px;"
            :behaviors="['drag']"
            :controls="['default']"
          >
            <ymap-marker
              marker-id="1"
              :coords="coords"
              :icon="{color: 'orange', content: 'Сервис Мобил'}"
            />
          </yandex-map>
        </v-col>
        <v-col
          cols="12"
          xs="12"
          sm="12"
          md="3"
        >
          <div class="title text-center mb-2">
            Поделиться
          </div>
          <share />
          <div class="ml-10 mt-3 mb-5">
            <div v-ripple class="bottom-menu" @click="$vuetify.goTo($refs.about)">
              О нас
            </div>
            <div v-ripple class="bottom-menu" @click="$vuetify.goTo($refs.work, {offset: -30})">
              Как мы работаем
            </div>
            <div v-ripple class="bottom-menu" @click="$vuetify.goTo($refs.equipment)">
              Оборудование
            </div>
            <div v-ripple class="bottom-menu" @click="$vuetify.goTo($refs.defects)">
              Типовые неисправности
            </div>
            <div v-ripple class="bottom-menu" @click="$vuetify.goTo($refs.consult)">
              Бесплатная консультация
            </div>
            <div v-ripple class="bottom-menu" @click="$vuetify.goTo($refs.recalls)">
              Отзывы
            </div>
          </div>
          <a href="mailto:steelpear@gmail.com" class="grey--text text--darken-1 caption ml-10" align-self="bottom">сделано steelpear</a>
        </v-col>
      </v-row>
      <!-- <span>&copy; {{ new Date().getFullYear() }}</span> -->
      <v-fab-transition>
        <v-btn
          v-show="offsetTop > 25"
          color="indigo"
          fab
          dark
          fixed
          class="up-btn"
          @click="$vuetify.goTo(0)"
        >
          <v-icon>
            mdi-arrow-up
          </v-icon>
        </v-btn>
      </v-fab-transition>
    </v-footer>
  </div>
</template>

<script>
import { yandexMap, ymapMarker } from 'vue-yandex-maps'
import Share from '~/components/Share.vue'
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
    Defects,
    yandexMap,
    ymapMarker,
    Share
  },
  data () {
    return {
      coords: [45.362039, 36.469364],
      offsetTop: 0
    }
  },
  beforeMount () {
    window.addEventListener('scroll', (e) => {
      requestAnimationFrame(() => {
        const scrollPos = window.scrollY
        const winHeight = window.innerHeight
        const docHeight = document.documentElement.scrollHeight
        const perc = (100 * scrollPos) / (docHeight - winHeight)
        this.offsetTop = perc
      })
    })
  },
  beforeDestroy () {
    window.removeEventListener('scroll', (e) => {})
  }
}
</script>

<style>
  .menu-btn {cursor: pointer; font-size: 19px;}
  a {text-decoration: none;}
  .up-btn {
    bottom: 100px !important;
    right: 25px !important;
  }
  .bottom-menu {
    line-height: 1.8;
    cursor: pointer;
  }
</style>
