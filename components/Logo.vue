<template>
  <div class="text-center">
    <div class="elem">
      <img src="service.svg">
    </div>
    <div class="sub mt-2">
      <img src="sublogo.svg">
    </div>
  </div>
</template>

<style>
.elem {
  overflow: hidden;
  width: 0;
  animation: anim 1s ease-in forwards;
}
.elem img {
  display: block;
  width: 350px;
  object-fit: cover
}

.sub {
  opacity: 0;
  animation: opacity 3s forwards;
  animation-delay: 1.3s;
}
.sub img {
  width: 250px;
}
@keyframes anim {
  50% {
    opacity: 0;
    width: 0;
  }
  100% {
    opacity: 1;
    width: 350px;
  }
}
@keyframes opacity {100% {opacity: 1;}}
</style>
