<template>
  <div>
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

    <v-dialog
      v-model="statusDialog"
      max-width="400"
    >
      <v-card>
        <div class="text-h5 text-center py-3">
          <v-icon
            large
          >
            mdi-alert-circle-check-outline
          </v-icon>
          Узнать статус ремонта
        </div>
        <v-card-text>
          <v-text-field
            v-if="radioGroup == 1"
            v-model="number"
            label="Введите номер квитанции"
            outlined
            clearable
            hint="Номер квитанции (только цифры). Например - 12345"
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
            label="Введите номер телефона"
            outlined
            clearable
            hint="Номер телефона, который указан в квитанции"
          />
          <v-radio-group v-model="radioGroup">
            <v-radio
              label="По номеру квитанции"
              :value="1"
            />
            <v-radio
              label="По фамилии"
              :value="2"
            />
            <v-radio
              label="По номеру телефона"
              :value="3"
            />
          </v-radio-group>
        </v-card-text>

        <v-card-actions>
          <v-btn
            color="red"
            text
            @click="statusDialog = false"
          >
            Отмена
          </v-btn>
          <v-spacer />
          <v-btn
            color="indigo"
            text
            @click="statusDialog = false"
          >
            Узнать
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data () {
    return {
      statusDialog: false,
      radioGroup: 1,
      number: '',
      name: '',
      phone: ''
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
