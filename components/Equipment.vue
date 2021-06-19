<template>
  <v-container class="py-12">
    <div class="text-center display-1">
      Оборудование для диагностики и ремонта
    </div>
    <div class="text-center line-title mt-1 title text--secondary">
      Мы используем только качественное и современное оборудование и инструменты
    </div>
    <v-row aling="start" justify="center" class="text-center mt-5" wrap>
      <v-col
        v-for="item in items"
        :key="item._id"
      >
        <v-hover v-slot="{ hover }" open-delay="200">
          <div
            class="pa-6"
            :class="hover ? 'card-wrap-hover' : 'card-wrap'"
            style="cursor: pointer; position: relative"
          >
            <div style="position: relative">
              <v-img
                :src="item.img"
                width="300"
                class="mx-auto pa-1 mb-3 item-img"
              />
              <div :class="{ 'black--text': hover }" class="title">
                {{ item.text }}
              </div>
            </div>
            <v-overlay
              absolute
              opacity="0.1"
              :value="hover ? true : false"
            />
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
          img: 'hot-air.jpg',
          text: 'Паяльная станция'
        },
        {
          img: 'oscilloscope.jpg',
          text: 'Цифровой осциллограф'
        },
        {
          img: 'multimeter.jpg',
          text: 'Цифровой мультиметр'
        },
        {
          img: 'power-supply.jpg',
          text: 'Лабораторный блок питания'
        },
        {
          img: 'microscope.jpg',
          text: 'Цифровой микроскоп'
        },
        {
          img: 'sigma.jpg',
          text: 'Программатор'
        }
      ]
    }
  }
}
</script>

<style scoped>
  .card-wrap {
    border: 1px solid transparent;
    transition: border .5s ease-in-out;
  }
  .card-wrap-hover {
    border: 1px solid lightgrey;
    transition: border .5s ease-in-out;
  }
</style>
