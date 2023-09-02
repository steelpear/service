<template>
  <div style="position: relative;">
    <v-parallax
      :height="$vuetify.breakpoint.xsOnly ? '530' : '400'"
      src="about.jpg"
    >
      <v-overlay
        absolute
        z-index="0"
        opacity="0.6"
        color="blue"
      />
      <v-img v-if="!$vuetify.breakpoint.mobile" src="office.jpg" lazy-src="black.jpg" max-width="450" class="rimg" />
    </v-parallax>
    <div :class="$vuetify.breakpoint.xsOnly ? 'text-wrap-mobile' : 'text-wrap'">
      <div class="display-1" :class="$vuetify.breakpoint.xsOnly ? 'text-center' : 'mb-4'">
        О нас
      </div>
      <v-col cols="12" md="7" class="title font-weight-regular">
        Наш сервисный центр начал свою работу в 2004 году.<br>За годы работы мы вернули к жизни тысячи устройств.<br>С начала нашей деятельности и по сей день наша специализация - ремонт мобильных телефонов. Мы стремимся к быстрому и качественному оказанию услуг нашим клиентам, что позволило нам стать сервисным центром №1 в Керчи.
      </v-col>
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
  .text-wrap-mobile {
    position: absolute;
    top: 20px;
    left: 0;
    color: whitesmoke;
  }
  .rimg {
    position: absolute;
    top: auto;
    bottom: auto;
    right: 40px;
    border-radius: 20px;
  }
</style>
