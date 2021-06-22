<template>
  <div>
    <v-img src="service.svg" max-width="300" class="logo mx-auto" />
    <v-img src="sublogo.svg" max-width="240" class="sub mt-1 mx-auto" />
  </div>
</template>

<style scoped>
.logo {
  opacity: .3;
  animation: opacity 1s forwards;
}
.sub {
  opacity: 0;
  animation: opacity 3s forwards;
  animation-delay: 1.3s;
}
@keyframes opacity {100% {opacity: 1;}}
</style>
