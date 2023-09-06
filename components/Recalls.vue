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
          v-if="item[8] !='0'"
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
                  {{ item[1] }}
                </div>
                <div class="caption">
                  {{ item[3] }}
                </div>
                <div class="caption">
                  {{ formatDate(item[5]) }}
                </div>
              </v-col>
              <v-col class="body-1">
                {{ item[6] }}
              </v-col>
            </v-row>
          </v-sheet>
        </v-carousel-item>
      </div>
    </v-carousel>
    <v-row justify="center">
      <v-btn large outlined rounded color="indigo" @click.stop="addCommentDialog = true">
        <v-icon left>
          fa-solid fa-pencil
        </v-icon>
        Оставить отзыв
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
        <v-card-text>
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
                  hide-details
                ></v-textarea>
              </v-col>
            </v-row>
            <small>*Поля, обязательные для заполнения</small>
          </v-container>
        </v-card-text>
        <v-card-actions>
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
            :disabled="!name || !text"
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
  </v-container>
</template>

<script>
export default {
  data () {
    return {
      addCommentDialog: false,
      sended: false,
      items: [],
      name: '',
      city: '',
      text: '',
      val: [
        [
          '1',
          'Наталья',
          '',
          'Москва',
          '',
          '2022-08-08 05:30:24',
          'Приехала на отдых и случайно уронила свой iPhone в воду. Очень расстроилась. Нашла в интернете сайт этого сервисного центра. Ребята настоящие профессионалы. И хотя случай был довольно сложный - за сутки всё починили за вполне приемлемую цену. Рекомендую.',
          '5',
          '1'
        ],
        [
          '2',
          'Николай Любимов',
          '',
          'Пермь',
          '',
          '2022-06-16 05:42:52',
          'Смартфон завис и выключился в самый неподходящий момент. Приехал специально из загородного пансионата в сервис. Хорошо, что удачно расположен - рядом с автовокзалом - быстро нашёл. Мастер посмотрел, сказал программа слетела, прошивать надо. За полчаса всё сделали и даже все контакты сохранили, что для меня очень важно. Хорошая работа, спасибо.',
          '5',
          '1'
        ]
      ]
    }
  },
  mounted () {
    // this.getComments()
    this.items = this.val
  },
  methods: {
    closeCommentDialog () {
      this.addCommentDialog = false
      this.name = ''
      this.city = ''
      this.text = ''
    },
    async getComments () {
      const response = await this.$axios.get('getcomment.php')
      this.items = response.data
    },
    sendComment () {
      // const response = await this.$axios.post('setcomment.php', {
      //     name: this.name,
      //     city: this.city,
      //     text: this.text
      //   })
      // console.log(response)
      this.closeCommentDialog()
      this.sended = true
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
