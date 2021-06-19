<template>
  <section style="position: relative;">
    <div>
      <v-img
        src="consult.jpg"
        max-height="400"
        position="left bottom"
        dark
      >
        <v-row align="start" justify="end">
          <v-col cols="12" md="8" class="text-center pa-10 grey--text text--lighten-1">
            <div class="display-1">
              Остались вопросы?
            </div>
            <div class="title">
              Закажите бесплатную консультацию и наш менеджер перезвонит Вам
            </div>
            <v-hover v-slot="{ hover }" open-delay="200">
              <v-card
                tile
                light
                max-width="700"
                min-height="220"
                class="mx-auto pa-6 mt-6 text-left"
              >
                <v-img src="arrow.svg" class="arrow" width="100" :class="{ 'animate__animated animate__flash': hover }" />
                <v-row align="start" justify="center">
                  <v-col>
                    <v-text-field
                      v-model="phone"
                      v-mask="'+7 (###) ###-##-##'"
                      outlined
                      clearable
                      label="Номер телефона"
                      placeholder="+7 (____) ____ ___ ___"
                      hint="Номер телефона (без +7 или 8)"
                      prepend-inner-icon="mdi-cellphone"
                    />
                  </v-col>
                  <v-col>
                    <v-btn
                      block
                      dark
                      color="indigo"
                      elevation="2"
                      tile
                      x-large
                      @click="orderConsult"
                    >
                      Заказать консультацию
                    </v-btn>
                  </v-col>
                </v-row>
                <v-row align="center" justify="center">
                  <div class="text-h6 text--secondary">
                    Или откройте чат WhatsApp
                  </div>
                  <!-- eslint-disable-next-line vue/no-template-shadow -->
                  <v-hover v-slot="{ hover }" open-delay="200">
                    <v-btn
                      class="mx-2"
                      fab
                      outlined
                      large
                      color="#13940A"
                      href="https://api.whatsapp.com/send?phone=79788951110"
                      target="_blank"
                      :class="{ 'animate__animated animate__tada': hover }"
                    >
                      <v-icon
                        dark
                        large
                      >
                        mdi-whatsapp
                      </v-icon>
                    </v-btn>
                  </v-hover>
                  <div class="text-h6 text--secondary">
                    для получения консультации
                  </div>
                </v-row>
              </v-card>
            </v-hover>
          </v-col>
        </v-row>
      </v-img>
    </div>
    <v-snackbar
      v-model="phoneAlert"
      multi-line
      timeout="2500"
      top
      dark
    >
      <v-row align="center" justify="space-around">
        <v-spacer />
        <div class="subtitle-1">
          Введите номер телефона!
        </div>
        <v-spacer />
        <v-btn
          dark
          icon
          @click="phoneAlert = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-row>
    </v-snackbar>
  </section>
</template>

<script>
export default {
  data () {
    return {
      phone: '',
      phoneAlert: false
    }
  },
  methods: {
    orderConsult () {
      if (!this.phone) {
        this.phoneAlert = true
      } else {
        alert(this.phone)
        this.phone = ''
      }
    }
  }
}
</script>

<style scoped>
  .arrow {
    position: absolute;
    z-index: 1;
    /* top: 60px;
    left: 33%; */
    top: -65px;
    left: -104px;
  }
</style>
