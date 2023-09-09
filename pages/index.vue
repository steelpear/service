<template>
  <div>
    <Header />
    <v-toolbar v-if="!$vuetify.breakpoint.mobile" dark height="auto" class="px-3 py-6 grad-bkg text-no-wrap font-weight-regular">
      <v-row align="center" :justify="$vuetify.breakpoint.xsOnly ? 'start' : 'space-around'" wrap>
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
    <work ref="work" />
    <defects ref="defects" />
    <equipment ref="equipment" />
    <consult ref="consult" />
    <recalls ref="recalls" />
    <v-footer
      dark
      class="py-10 grad-bkg"
      :class="$vuetify.breakpoint.xsOnly ? 'px-8' : 'px-12'"
    >
      <!-- --------------------- Start mobile footer ----------------------------------- -->
      <div v-if="$vuetify.breakpoint.mobile" style="width: 100%">
        <v-row align="start" fustify="space-between">
          <v-col cols="12" xs="12" sm="6" md="3" :class="{'text-center' : $vuetify.breakpoint.xsOnly}">
            <div>
              <div class="title">
                Республика Крым
              </div>
              <div class="title">
                г.Керчь, "Мегацентр"
              </div>
              <div class="title">
                Кооперативный пер. 26
              </div>
              <div class="title">
                офис 102
              </div>
              <div>(1й офис от центрального входа)</div>
            </div>
            <div class="headline mt-1">
              <a href="tel:+7 (978) 895-11-10" style="color: inherit; text-decoration: none;">+7 (978) 895-11-10</a>
            </div>
          </v-col>
          <v-col class="hidden-sm-and-down">
            <v-img src="logo.jpg" max-width="200" class="mx-auto white" />
          </v-col>
          <v-col cols="12" xs="12" sm="6" md="3" :class="{'text-center' : $vuetify.breakpoint.xsOnly}">
            <div :class="{'text-right' : !$vuetify.breakpoint.xsOnly}">
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
          </v-col>
        </v-row>
        <div class="mt-5">
          <client-only>
            <yandex-map
              :coords="coords"
              zoom="16"
              style="height: 300px; width: auto"
              :behaviors="['drag']"
              :controls="['default']"
            >
              <ymap-marker
                marker-id="1"
                :coords="coords"
                :icon="{color: 'orange', content: 'Сервис Мобил'}"
              />
            </yandex-map>
          </client-only>
        </div>
        <share class="mt-5 text-center" />
        <div class="text-center mt-2">
          <a href="mailto:steelpear@gmail.com" class="grey--text text--darken-1 caption" align-self="bottom">сделано steelpear</a>
        </div>
      </div>
      <!-- --------------------- End mobile footer ----------------------------------- -->
      <div v-else style="width: 100%">
        <v-row align="start">
          <v-col
            cols="12"
            xs="12"
            sm="12"
            md="3"
          >
            <v-row align="start">
              <v-icon
                v-if="!$vuetify.breakpoint.mobile"
                large
                class="mr-2"
              >
                mdi-map-marker-outline
              </v-icon>
              <div class="pt-0">
                <div class="title">
                  Республика Крым
                </div>
                <div class="title">
                  г.Керчь, "Мегацентр"
                </div>
                <div class="title">
                  Кооперативный пер. 26
                </div>
                <div class="title">
                  офис 102
                </div>
                <div>(1й офис от центрального входа)</div>
              </div>
            </v-row>
            <v-row align="start" class="mt-5">
              <v-icon
                v-if="!$vuetify.breakpoint.mobile"
                large
                class="mr-2"
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
                v-if="!$vuetify.breakpoint.mobile"
                large
                class="mr-2"
              >
                mdi-clock-outline
              </v-icon>
              <div class="pt-0">
                <div class="title">
                  Режим работы:
                </div>
                <div>с 10.00 до 18.00</div>
                <div>без перерыва</div>
                <div>без выходных</div>
              </div>
            </v-row>
          </v-col>
          <v-col
            cols="12"
            xs="12"
            sm="12"
            md="6"
          >
            <v-window v-model="window" show-arrows>
              <v-window-item>
                <yandex-map
                  :coords="coords"
                  zoom="17"
                  style="height: 310px;"
                  :behaviors="['drag']"
                  :controls="['default']"
                >
                  <ymap-marker
                    marker-id="1"
                    :coords="coords"
                    :icon="{color: 'orange', content: 'Сервис Мобил'}"
                  />
                </yandex-map>
              </v-window-item>
              <v-window-item>
                <v-img src="office.jpg" lazy-src="black.jpg" height="310" />
              </v-window-item>
              <v-window-item>
                <v-img src="subslide1.jpg" lazy-src="black.jpg" height="310" />
              </v-window-item>
              <v-window-item>
                <v-img src="subslide2.jpg" lazy-src="black.jpg" height="310" />
              </v-window-item>
            </v-window>
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
            <share class="ml-9" />
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
            <a href="mailto:steelpear@gmail.com" class="grey--text text--darken-1 caption ml-10" align-self="bottom">сделано @steelpear</a>
          </v-col>
        </v-row>
      </div>
      <!-- <span>&copy; {{ new Date().getFullYear() }}</span> -->
      <v-fab-transition>
        <v-btn
          v-if="!$vuetify.breakpoint.mobile"
          v-show="offsetTop > 25"
          color="indigo"
          fab
          dark
          fixed
          class="up-btn"
          style="z-index: 10"
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
  head () {
    return {
      script: [
        { src: '/chatra.js' }
      ]
    }
  },
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
      coords: [45.354091, 36.473307],
      offsetTop: 0,
      window: 0
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
