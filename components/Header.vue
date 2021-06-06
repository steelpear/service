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
        <v-row class="mt-1 indigo--text text--darken-4 float-right">
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
      </v-col>
    </v-row>
  </div>
</template>

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
