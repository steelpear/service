<template>
  <v-app>
    <v-main>
      <v-container>
        <nuxt />
      </v-container>
    </v-main>
    <v-footer
      dark
      color="#1E1E1E"
      class="py-10 px-12"
      app
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
        </v-col>
        <div class="text-right" style="width: 100%;">
          <a href="mailto:steelpear@gmail.com" class="grey--text caption">сделано steelpear</a>
        </div>
      </v-row>
      <!-- <span>&copy; {{ new Date().getFullYear() }}</span> -->
    </v-footer>
  </v-app>
</template>

<script>
import { yandexMap, ymapMarker } from 'vue-yandex-maps'
import Share from '~/components/Share.vue'
export default {
  components: {
    yandexMap,
    ymapMarker,
    Share
  },
  data () {
    return {
      coords: [45.362039, 36.469364]
    }
  }
}
</script>

<style>
  a {text-decoration: none;}
</style>
