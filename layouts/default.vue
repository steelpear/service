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
      class="pa-8"
      app
    >
      <v-row>
        <v-col>
          <v-row>
            <v-icon
              large
            >
              mdi-map-marker-outline
            </v-icon>
            <v-col>
              <div class="title">
                г.Керчь, ул.Ерёменко 30
              </div>
              <div>(здание швейной фабрики)</div>
            </v-col>
          </v-row>
          <v-row class="mt-2">
            <v-icon
              large
            >
              mdi-phone-in-talk-outline
            </v-icon>
            <div class="headline ml-2">
              +7 (978) 895-11-10
            </div>
          </v-row>
        </v-col>
        <v-col>
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
      </v-row>
      <!-- <span>&copy; {{ new Date().getFullYear() }}</span> -->
    </v-footer>
  </v-app>
</template>

<script>
import { yandexMap, ymapMarker } from 'vue-yandex-maps'
export default {
  components: {
    yandexMap,
    ymapMarker
  },
  data () {
    return {
      coords: [45.362039, 36.469364]
    }
  }
}
</script>
