<template>
  <div style="position: relative;">
    <v-parallax
      height="400"
      src="about.jpg"
    >
      <v-overlay
        absolute
        z-index="0"
        opacity="0.6"
        color="blue lighten-1"
      />
    </v-parallax>
    <div class="text-wrap">
      <div class="display-1 mb-4">
        О нас
      </div>
      <div>
        bfbfbfb
      </div>
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
</style>
