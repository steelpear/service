<template>
  <v-container :class="$vuetify.breakpoint.mobile ? 'py-4' : 'py-12'">
    <div class="text-center display-1">
      Наши преимущества
    </div>
    <div class="text-center mt-1 title text--secondary" :class="{'line-title' : !$vuetify.breakpoint.mobile}">
      Высокий уровень сервиса помогает нам быть первыми на рынке услуг
    </div>
    <v-row aling="start" justify="center" class="text-center mt-5">
      <v-col
        v-for="item in items"
        :key="item._id"
        cols="12"
        xs="12"
        sm="6"
        md="3"
      >
        <v-hover v-slot="{ hover }" open-delay="200">
          <div
            style="cursor: pointer"
          >
            <img
              :src="item.img"
              width="120"
              height="120"
              class="mx-auto pa-1 mb-3 item-img"
              :class="{ 'animate__animated animate__pulse': hover }"
            >
            <div class="title mb-2">
              {{ item.title }}
            </div>
            <div :class="{ 'black--text': hover }">
              {{ item.text }}
            </div>
          </div>
        </v-hover>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data () {
    return {
      items: [
        {
          img: '11.svg',
          title: 'Опытные мастера',
          text: 'Сервисый центр оснащен современными средствами диагностики и ремонта. У нас работают квалифицированные специалисты.'
        },
        {
          img: '33.svg',
          title: 'Удобное расположение',
          text: 'Наш сервисный центр находится в центре города, в двух шагах от автовокзала и центрального рынка, что значительно сэкономит Ваше время.'
        },
        {
          img: '22.svg',
          title: 'Срочный ремонт',
          text: 'Ремонт от 20 минут в неотложных случаях в присутствии клиента со строгим соблюдением всех технологических процессов.'
        },
        {
          img: '44.svg',
          title: 'Гарантия на услуги',
          text: 'Мы предоставляем гарантию на произведённый ремонт и установленные комплектующие.'
        }
      ]
    }
  }
}
</script>

<style scoped>
  .item-img {
    border: 2px solid;
    border-radius: 50%;
    border-color: blue;
  }
</style>
