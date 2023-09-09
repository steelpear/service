<template>
  <v-container class="py-12" style="position: relative;">
    <div class="text-center display-1">
      Отзывы наших клиентов
    </div>
    <v-carousel
      :height="$vuetify.breakpoint.mobile ? 'auto' : '250'"
      :show-arrows="!$vuetify.breakpoint.mobile"
      hide-delimiters
    >
      <div
        v-for="(item, i) in items"
        :key="i"
      >
        <v-carousel-item
          v-if="item.comment_approved !='0'"
          :class="$vuetify.breakpoint.mobile ? 'px-1' : 'px-16'"
          ripple
        >
          <v-sheet height="100%" :class="$vuetify.breakpoint.mobile ? 'px-1' : 'px-16'">
            <v-row
              :class="{'fill-height' : $vuetify.breakpoint.mdAndUp}"
              align="center"
              justify="center"
            >
              <v-col cols="12" md="3" class="text-center" style="border-right:1px solid lightgrey">
                <!-- <v-avatar size="100">
                  <img :src="item.avatar">
                </v-avatar> -->
                <div class="pt-1 title">
                  {{ item.comment_author }}
                </div>
                <div class="caption">
                  {{ item.comment_city }}
                </div>
                <div class="caption">
                  {{ formatDate(item.comment_date) }}
                </div>
              </v-col>
              <v-col class="body-1">
                {{ item.comment_content }}
              </v-col>
            </v-row>
          </v-sheet>
        </v-carousel-item>
      </div>
    </v-carousel>
    <v-row justify="center">
      <v-btn
        class="mr-6"
        large
        outlined
        rounded
        color="indigo"
        @click.stop="addCommentDialog = true"
      >
        <v-icon left>
          fa-solid fa-pencil
        </v-icon>
        Оставить отзыв
      </v-btn>
      <v-btn large outlined rounded color="indigo" @click="$router.push('/comments')">
        <v-icon left>
          fa-solid fa-eye
        </v-icon>
        Посмотреть все
      </v-btn>
    </v-row>
    <v-dialog
      v-model="addCommentDialog"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title>
          <row class="text-h5 text-center" style="width:100%;">Оставить отзыв</row>
        </v-card-title>
        <v-card-text class="pb-1">
          <v-container>
            <v-row>
              <v-col
                cols="12"
                sm="6"
                md="6"
              >
                <v-text-field
                  v-model="name"
                  label="Имя*"
                  required
                  outlined
                  clearable
                  hide-details
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                md="6"
              >
                <v-text-field
                  v-model="city"
                  label="Город"
                  outlined
                  clearable
                  hide-details
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-textarea
                  v-model="text"
                  label="Текст отзыва*"
                  required
                  auto-grow
                  outlined
                  clearable
                  counter="500"
                  :rules="[v => (v || '' ).length <= 500 || 'Не более 500 символов']"
                ></v-textarea>
              </v-col>
            </v-row>
            <small>*Поля, обязательные для заполнения</small>
          </v-container>
        </v-card-text>
        <v-card-actions class="pb-3">
          <vue-recaptcha
            size="normal"
            ref="recaptcha"
            sitekey="6LeM07oUAAAAAE7iDSN3QcTC-knepiStbZ7-GN90"
            :load-recaptcha-script="true"
            @verify="recaptchaOk"
          />
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="closeCommentDialog"
          >
            Отменить
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            :disabled="!name || !text || !recaptcha"
            @click="sendComment"
          >
            Отправить
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-snackbar
      v-model="sended"
      multi-line
      timeout="3000"
      top
      dark
      rounded
      color="green darken-1"
    >
      <span class="text-body-1">Отзыв отправлен!</span>
      <template #action="{ attrs }">
        <v-btn
          dark
          icon
          v-bind="attrs"
          @click="sended = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
    <v-snackbar
      v-model="error"
      multi-line
      timeout="3000"
      top
      dark
      rounded
      color="red"
    >
      <span class="text-body-1">Ошибка!</span>
      <template #action="{ attrs }">
        <v-btn
          dark
          icon
          v-bind="attrs"
          @click="sended = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
  </v-container>
</template>

<script>
import VueRecaptcha from 'vue-recaptcha'
export default {
  components: {
    VueRecaptcha
  },
  data () {
    return {
      addCommentDialog: false,
      recaptcha: false,
      sended: false,
      error: false,
      items: [],
      name: '',
      city: '',
      text: ''
    }
  },
  mounted () {
    this.getComments()
  },
  methods: {
    recaptchaOk () {
      this.recaptcha = true
    },
    closeCommentDialog () {
      this.addCommentDialog = false
      this.recaptcha = false
      this.$refs.recaptcha.reset()
      this.name = ''
      this.city = ''
      this.text = ''
    },
    async getComments () {
      const response = await this.$axios.post('/getcomment.php', {
        limit: 10,
        skip: 0
      })
      this.items = response.data
    },
    async sendComment () {
      const response = await this.$axios.post('/setcomment.php', {
        name: this.name,
        city: this.city,
        text: this.text
      })
      if (response.data) {
        this.$axios.get('/mailer.php')
        this.closeCommentDialog()
        this.sended = true
      } else {
        this.error = true
      }
    },
    formatDate (date) {
      const dat = new Date(date).toLocaleDateString('ru-ru')
      const dat1 = dat.slice(0, 6)
      const dat2 = dat.slice(6)
      const dat3 = dat1 + dat2
      return dat3
    }
  }
}
</script>
