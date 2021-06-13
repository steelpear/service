<template>
  <v-container class="py-12">
    <div class="text-center display-1">
      Как мы работаем:
    </div>
    <v-row aling="start" justify="center" class="text-center mt-5">
      <v-col
        v-for="item in items"
        :key="item._id"
      >
        <img :src="item.img" width="120" height="120" class="mx-auto pa-1 mb-3 item-img">
        <div>{{ item.text }}</div>
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
          text: 'Мы производим бесплатную диагностику, выявляем проблему, согласовываем сроки и стоимость ремонта.'
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

<style>
  .item-img {
    border: 2px solid;
    border-radius: 50%;
    border-color: #FF931E;
  }
</style>
