<template>
  <v-container :class="$vuetify.breakpoint.mobile ? 'py-4' : 'py-12'">
    <div class="text-center display-1">
      Как мы работаем
    </div>
    <div class="text-center mt-1 title text--secondary" :class="{'line-title' : !$vuetify.breakpoint.mobile}">
      Этапы взаимодействия нашего сервисного центра с клиентами
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
          img: '1.svg',
          text: 'Вы приносите неисправное устройство в наш сервис или оставляете заявку на выезд специалиста.'
        },
        {
          img: '2.svg',
          text: 'Мы производим бесплатную диагностику, выявляем проблемы, согласовываем сроки и стоимость ремонта.'
        },
        {
          img: '3.svg',
          text: 'После вашего согласия на ремонт устраняем поломку к заранее оговоренной дате.'
        },
        {
          img: '4.svg',
          text: 'Оповещаем о готовности, предоставляем гарантию. Также Вы можете узнать статус ремонта самостоятельно на нашем сайте.'
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
    border-color: orange;
  }
</style>
