<template>
  <v-container>
    <v-row align="start" class="pa-4">
      <v-col>
        <v-row align="start">
          <v-img src="logo.png" max-width="140" />
          <div class="title indigo--text text--darken-4 ml-6 mt-2" style="line-height: 1.5rem;">
            Сервисный центр<br>
            <span class="head-font clock-font">10.00 - 18.00</span><br>
            без перерыва<br>
            без выходных
          </div>
        </v-row>
      </v-col>
      <v-col>
        <logo />
      </v-col>
      <v-col>
        <v-row class="mt-1 pr-3 indigo--text text--darken-4 float-right">
          <v-icon
            large
            color="indigo darken-4"
          >
            mdi-phone-in-talk-outline
          </v-icon>
          <div class="headline ml-2">
            <a href="tel:+7 (978) 895-11-10" class="phone-link font-weight-black">+7 (978) 895-11-10</a>
          </div>
        </v-row>
        <br>
        <div class="text-right mt-7">
          <v-btn
            dark
            rounded
            large
            color="indigo"
            @click.stop="statusDialog = true"
          >
            <v-icon
              left
              dark
              large
              class="mr-4"
            >
              mdi-alert-circle-check-outline
            </v-icon>
            Узнать статус ремонта
          </v-btn>
        </div>
      </v-col>
    </v-row>

    <v-navigation-drawer
      v-model="statusDialog"
      app
      bottom
      temporary
      right
      width="350"
      @input="closeStatusDialog"
    >
      <v-card class="elevation-0 mt-6">
        <div class="text-h5 text-center py-3">
          <v-icon
            large
            color="indigo"
          >
            mdi-alert-circle-check-outline
          </v-icon>
          Узнать статус ремонта
        </div>
        <v-card-text class="mt-6">
          <v-text-field
            v-model="number"
            v-mask="'#####'"
            label="Введите номер квитанции"
            outlined
            clearable
            hint="Номер квитанции (только цифры)"
            @change="getStatus"
          />
        </v-card-text>
        <v-card-actions>
          <v-btn
            color="indigo"
            class="py-6"
            dark
            block
            tile
            large
            @click="getStatus"
          >
            Узнать
          </v-btn>
        </v-card-actions>
        <v-img src="logo.png" max-width="250" class="mx-auto mt-6" />
      </v-card>
    </v-navigation-drawer>

    <v-navigation-drawer
      v-model="statusResultDialog"
      app
      bottom
      temporary
      left
      width="400"
      @input="closeStatusResultDialog"
    >
      <v-card class="elevation-0 mt-3">
        <div class="text-h5 text-center">
          <v-icon
            large
            color="indigo"
          >
            mdi-alert-circle-check-outline
          </v-icon>
          Информация о ремонте:
        </div>
        <v-card-text class="body-1 text--primary result-wrap">
          <div>
            <span class="font-weight-medium">Статус ремонта:</span> <span class="green--text text--darken-2 font-weight-medium">{{ status }}</span>
          </div>
          <div>
            <span class="font-weight-medium">Номер квитанции:</span> {{ result.kvit }}
          </div>
          <div>
            <span class="font-weight-medium">Ф.И.О.:</span> {{ result.sfio }}
          </div>
          <div>
            <span class="font-weight-medium">Модель:</span> {{ result.appmod }}
          </div>
          <div>
            <span class="font-weight-medium">Комплект при приёмке:</span> {{ result.komplekt }}
          </div>
          <div>
            <span class="font-weight-medium">Заявленная неисправность:</span> {{ result.bugg }}
          </div>
          <div>
            <span class="font-weight-medium">Дата приёмки:</span> {{ result.sdatone }}
          </div>
          <div v-if="result.sdout">
            <span class="font-weight-medium">Дата выдачи:</span> {{ result.sdout }}
          </div>
          <div v-if="result.swork !== null && result.swork !== ''">
            <span class="font-weight-medium">Выполненные работы:</span> {{ result.swork }}
          </div>
          <div v-if="result.swarant2 !== null && result.swarant2 !== ''">
            <span class="font-weight-medium">Гарантия:</span> {{ result.swarant2 }}
          </div>
          <div v-if="result.scen3 !== null && result.scen3 !== '0' && result.scen3 !== ''">
            <span class="font-weight-medium">Стоимость ремонта:</span> <span class="indigo--text text--darken-2 text-h5 font-weight-medium">{{ result.scen3 }}</span> р.
          </div>
        </v-card-text>
        <v-divider class="mx-4" />
      </v-card>
    </v-navigation-drawer>

    <v-snackbar
      v-model="numberAlert"
      timeout="2500"
      top
      dark
    >
      <v-row align="center" justify="space-around">
        <v-spacer />
        <div class="subtitle-1">
          Введите номер квитанции!
        </div>
        <v-spacer />
        <v-btn
          dark
          icon
          @click="numberAlert = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-row>
    </v-snackbar>

    <v-snackbar
      v-model="kvitAlert"
      timeout="2500"
      top
      dark
      color="red"
    >
      <v-row align="center" justify="space-around">
        <v-spacer />
        <div class="subtitle-1">
          Такой квитанции не существует!
        </div>
        <v-spacer />
        <v-btn
          dark
          icon
          @click="kvitAlert = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-row>
    </v-snackbar>
  </v-container>
</template>

<script>
import Logo from '~/components/Logo.vue'
export default {
  components: {
    Logo
  },
  data () {
    return {
      statusDialog: false,
      statusResultDialog: false,
      number: '',
      status: '',
      result: [],
      numberAlert: false,
      kvitAlert: false
    }
  },
  methods: {
    closeStatusDialog () {
      if (this.statusDialog === false) {
        this.number = ''
      }
    },
    closeStatusResultDialog () {
      if (this.statusResultDialog === false) {
        this.result = []
      }
    },
    getStatus () {
      if (this.number) {
        this.statusDialog = false
        this.$axios.post('handler.php', {
          kvit: this.number,
          action: 'getstatus'
        })
          .then((response) => {
            if (response.data != null) {
              this.result = response.data
              if (this.result.statea === '1') {
                this.status = 'Ожидает ремонта'
              } else if (this.result.statea === '2') {
                this.status = 'В процессе ремонта'
              } else if (this.result.statea === '3') {
                this.status = 'Ожидает запчасть'
              } else if (this.result.statea === '4') {
                this.status = 'Готов'
              } else if (this.result.statea === '5') {
                this.status = 'Выдан'
              } else if (this.result.statea === '7') {
                this.status = 'Отказ от ремонта'
              } else if (this.result.statea === '8') {
                this.status = 'Выдан без ремонта'
              } else if (this.result.statea === '9') {
                this.status = 'В удалённом сервисном центре'
              } else if (this.result.statea === '15') {
                this.status = 'Требуется согласовать дополнительные условия ремонта. Свяжитесь с СЦ'
              } else if (this.result.statea === '16') {
                this.status = 'Согласованы дополнительные условия ремонта. Ремонт продолжается'
              } else { this.status = '' }
              this.statusResultDialog = true
            } else { this.kvitAlert = true }
          })
      } else {
        this.numberAlert = true
      }
    }
  }
}
</script>

<style scoped>
  .head-font {
    font-family: 'Oswald';
  }
  .head-font.clock-font {
    font-size: 22px;
  }
  .phone-link {
    color: inherit;
    text-decoration: none;
    font-size: 26px;
  }
  .result-wrap div {
    padding: 4px 7px;
  }
  .result-wrap div:nth-child(even) {
    background: #EEEEEE;
  }
</style>
