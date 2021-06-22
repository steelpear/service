<template>
  <div>
    <Header />
    <v-toolbar v-if="!$vuetify.breakpoint.mobile" dark height="auto" class="px-3 py-4 grad-bkg text-no-wrap font-weight-regular">
      <v-row align="center" :justify="$vuetify.breakpoint.xsOnly ? 'start' : 'center'" wrap>
        <div v-ripple class="menu-btn mx-2" @click="$vuetify.goTo($refs.about)">
          О нас
        </div>
        <div v-ripple class="menu-btn mx-2" @click="$vuetify.goTo($refs.work, {offset: -30})">
          Как мы работаем
        </div>
        <div v-ripple class="menu-btn mx-2" @click="$vuetify.goTo($refs.equipment)">
          Оборудование
        </div>
        <div v-ripple class="menu-btn mx-2" @click="$vuetify.goTo($refs.defects)">
          Типовые неисправности
        </div>
        <div v-ripple class="menu-btn mx-2" @click="$vuetify.goTo($refs.consult)">
          Бесплатная консультация
        </div>
        <div v-ripple class="menu-btn mx-2" @click="$vuetify.goTo($refs.recalls)">
          Отзывы
        </div>
        <div v-ripple class="menu-btn mx-2" @click="$vuetify.goTo(9999)">
          Контакты
        </div>
      </v-row>
    </v-toolbar>
    <slider />
    <advantages ref="advantages" />
    <about ref="about" />
    <work ref="work" class="d-none" />
    <defects ref="defects" class="d-none" />
    <equipment ref="equipment" class="d-none" />
    <consult ref="consult" class="d-none" />
    <recalls ref="recalls" class="mt-3 d-none" />
    <v-footer
      dark
      class="py-10 px-12 grad-bkg"
    >
      <v-row>
        <div
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
            <div class="pt-0">
              <div class="title">
                Республика Крым
              </div>
              <div class="title">
                г.Керчь, ул.Ерёменко 30И
              </div>
              <div>(здание швейной фабрики)</div>
            </div>
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
            <div class="pt-0">
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
            </div>
          </v-row>
        </div>
        <div
          cols="12"
          xs="12"
          sm="12"
          md="6"
          class="d-none"
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
        </div>
        <div
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
            <div v-ripple class="bottom-menu" @click="$vuetify.goTo($refs.advantages)">
              Наши преимущества
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
          </div>
          <a href="mailto:steelpear@gmail.com" class="grey--text text--darken-1 caption ml-10" align-self="bottom">сделано steelpear</a>
        </div>
      </v-row>
      <!-- <span>&copy; {{ new Date().getFullYear() }}</span> -->
      <v-fab-transition>
        <v-btn
          v-show="offsetTop > 25"
          color="indigo"
          fab
          dark
          fixed
          class="up-btn hidden-sm-and-down"
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
  .menu-btn:after {
    display: block;
    content: "";
    height: 2px;
    width: 0%;
    background-color: white;
    margin-left: auto;
    margin-right: auto;
    margin-top: -5px;
    opacity:.5;
    transition: width .3s ease-in-out, opacity 1s;
  }
  .menu-btn:hover:after {width: 100%; opacity: 1}
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
