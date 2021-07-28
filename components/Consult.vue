<template>
  <section style="position: relative;">
    <div>
      <v-img
        src="consult.jpg"
        :height="$vuetify.breakpoint.mobile ? 'auto' : '400'"
        position="left bottom"
        dark
      >
        <v-row align="start" justify="end">
          <v-col cols="12" md="8" class="text-center pa-10 grey--text text--lighten-1">
            <div class="display-1">
              Остались вопросы?
            </div>
            <div class="title">
              Закажите бесплатную консультацию и наш специалист перезвонит Вам
            </div>
            <v-hover v-slot="{ hover }" open-delay="200">
              <v-card
                tile
                light
                max-width="700"
                min-height="220"
                class="mx-auto pa-6 mt-6 text-left"
              >
                <v-img src="arrow.svg" class="arrow hidden-sm-and-down" width="100" :class="{ 'animate__animated animate__flash': hover }" />
                <v-row align="start" justify="center">
                  <v-col
                    cols="12"
                    xs="12"
                    sm="6"
                    md="6"
                  >
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
                  <v-col
                    cols="12"
                    xs="12"
                    sm="6"
                    md="6"
                  >
                    <v-btn
                      block
                      dark
                      color="indigo"
                      elevation="2"
                      tile
                      x-large
                      @click="orderConsult"
                    >
                      Заказать <span class="hidden-sm-and-down">&nbsp;консультацию</span>
                    </v-btn>
                  </v-col>
                </v-row>
                <v-row align="center" justify="center">
                  <div class="text-h6 text--secondary text-center">
                    Или откройте чат Viber
                  </div>
                  <!-- eslint-disable-next-line vue/no-template-shadow -->
                  <v-hover v-slot="{ hover }" open-delay="200">
                    <v-btn
                      class="mx-2"
                      fab
                      outlined
                      large
                      color="#13940A"
                      href="viber://chat?number=%2B79788951110"
                      target="_blank"
                      :class="{ 'animate__animated animate__tada': hover }"
                    >
                      <v-img src="viber.svg" width="50" />
                    </v-btn>
                  </v-hover>
                  <div v-if="!$vuetify.breakpoint.mobile" class="text-h6 text--secondary text-center">
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

    <v-snackbar
      v-model="sended"
      timeout="2500"
      top
      dark
      color="success"
    >
      <v-row align="center" justify="space-around">
        <v-spacer />
        <div class="subtitle-1">
          Запрос отправлен
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
      phoneAlert: false,
      sended: false
    }
  },
  methods: {
    orderConsult () {
      if (!this.phone) {
        this.phoneAlert = true
      } else {
        this.$axios.post('https://api.emailjs.com/api/v1.0/email/send', {
          service_id: 'service_ehxrvcj',
          template_id: 'template_jc0asd1',
          user_id: 'user_yAXzCkfFs7sOpLhcM4mPg',
          template_params: {
            message: this.phone
          }
        })
          .then(() => {
            setTimeout(() => {
              this.sended = true
            }, 1000)
          })
          .catch((error) => {
            // eslint-disable-next-line no-console
            console.log(error)
          })
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
    top: -65px;
    left: -104px;
  }
</style>
