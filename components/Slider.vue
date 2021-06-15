<template>
  <section style="position: relative;">
    <v-carousel
      cycle
      interval="10000"
      hide-delimiters
      height="400"
    >
      <v-carousel-item
        v-for="(item,i) in items"
        :key="i"
      >
        <div>
          <v-img :src="item.src" />
          <v-overlay
            absolute
            z-index="0"
          />
        </div>
        <v-row align="center" class="text-wrap">
          <v-col cols="12" md="4" class="white--text headline">
            <!-- eslint-disable-next-line vue/no-v-html -->
            <div v-html="item.text" />
          </v-col>
          <v-col>
            <v-img :src="item.icon" width="200" />
          </v-col>
        </v-row>
      </v-carousel-item>
    </v-carousel>
  </section>
</template>

<script>
export default {
  data () {
    return {
      items: [
        {
          src: 'slide1.jpg',
          text: 'Замена дисплеев, тачскринов, шлейфов, микрофонов, динамиков, корпусных элементов, установка защитных стёкол.',
          icon: 'display.svg'
        },
        {
          src: 'slide2.jpg',
          text: 'Модульный ремонт.<br />Замена коннекторов, разъёмов зарядки, вибромоторов, камер, материнских плат, аккумуляторов.',
          icon: 'module.svg'
        },
        {
          src: 'slide3.jpg',
          text: 'Сложный компонентный ремонт. Замена процессоров, микросхем памяти, приёмопередатчиков, драйверов питания, Wi-Fi, NFC и Bluetooth модулей.',
          icon: 'cpu.svg'
        },
        {
          src: 'slide4.jpg',
          text: 'Восстановление устройства после попадания жидкости, устранение последствий неквалифицированного ремонта.',
          icon: 'h2o.svg'
        },
        {
          src: 'slide5.jpg',
          text: 'Восстановление / обновление программного обеспечения, отвязка от оператора, сброс графического ключа, пароля телефона, русификация, восстановление данных',
          icon: 'unlock.svg'
        }
      ]
    }
  }
}
</script>

<style scoped>
  .text-wrap {
    position: absolute;
    top: 50px;
    left: 150px;
  }
</style>
