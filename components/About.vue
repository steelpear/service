<template>
  <div style="position: relative;">
    <v-parallax
      height="400"
      src="about.jpg"
    >
      <v-img src="shveyka.jpg" lazy-src="logo.png" max-width="250" class="rimg" />
      <v-overlay
        absolute
        z-index="0"
        opacity="0.6"
        color="blue"
      />
    </v-parallax>
    <div class="text-wrap">
      <div class="display-1 mb-4">
        О нас
      </div>
      <v-row align="start">
        <v-col cols="12" md="6" class="text-h5 font-weight-regular">
          Наш сервисный центр начал свою работу в 2004 году.<br>За годы работы мы вернули к жизни тысячи устройств.<br>С начала нашей деятельности и по сей день наша специализация - ремонт мобильных телефонов. Мы стремимся к быстрому и качественному оказанию услуг нашим клиентам, что позволило нам стать сервисным центром №1 в Керчи.
        </v-col>
      </v-row>
    </div>
  </div>
</template>

<style scoped>
  .text-wrap {
    position: absolute;
    top: 30px;
    left: 30px;
    color: whitesmoke;
  }
  .rimg {
    position: absolute;
    top: auto;
    bottom: auto;
    right: 40px;
  }
</style>
