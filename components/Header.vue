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
      <v-card class="elevation-0">
        <div class="text-h5 text-center py-3">
          <v-icon
            large
            color="indigo"
          >
            mdi-alert-circle-check-outline
          </v-icon>
          Узнать статус ремонта
        </div>
        <v-card-text>
          <v-text-field
            v-if="radioGroup == 1"
            v-model="number"
            v-mask="'#######'"
            label="Введите номер квитанции"
            outlined
            clearable
            hint="Номер квитанции (только цифры)"
          />
          <v-text-field
            v-if="radioGroup == 2"
            v-model="name"
            label="Введите фамилию"
            outlined
            clearable
            hint="Ф.И.О клиента, на которого оформлена квитанция"
          />
          <v-text-field
            v-if="radioGroup == 3"
            v-model="phone"
            v-mask="'+7 (###) ###-##-##'"
            label="Введите номер телефона"
            outlined
            clearable
            hint="Номер телефона (без +7 или 8)"
          />
          <v-radio-group v-model="radioGroup">
            <v-radio
              label="По номеру квитанции"
              :value="1"
              color="indigo"
            />
            <!-- <v-radio
              label="По фамилии"
              :value="2"
              color="indigo"
            /> -->
            <v-radio
              label="По номеру телефона"
              :value="3"
              color="indigo"
            />
          </v-radio-group>
        </v-card-text>

        <v-card-actions>
          <v-btn
            color="indigo"
            dark
            block
            large
            @click="getStatus"
          >
            Узнать
          </v-btn>
        </v-card-actions>
        <v-img src="logo.png" max-width="250" class="mx-auto" />
      </v-card>
    </v-navigation-drawer>
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
      radioGroup: 1,
      number: '',
      name: '',
      phone: ''
    }
  },
  methods: {
    closeStatusDialog () {
      if (this.statusDialog === false) {
        this.radioGroup = 1
        this.number = ''
        this.name = ''
        this.phone = ''
      }
    },
    getStatus () {
      let findField = ''
      this.statusDialog = false
      if (this.radioGroup === 1) {
        findField = this.number
      } else if (this.radioGroup === 2) {
        findField = this.name
      } else {
        findField = this.phone
      }
      this.$axios.post('handler.php', {
        field: findField,
        mode: this.radioGroup,
        action: 'getstatus'
      })
        .then((response) => {
          alert(response.data)
        })
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
</style>
