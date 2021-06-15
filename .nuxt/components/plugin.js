import Vue from 'vue'
import { wrapFunctional } from './utils'

const components = {
  About: () => import('../..\\components\\About.vue' /* webpackChunkName: "components/about" */).then(c => wrapFunctional(c.default || c)),
  Advantages: () => import('../..\\components\\Advantages.vue' /* webpackChunkName: "components/advantages" */).then(c => wrapFunctional(c.default || c)),
  Header: () => import('../..\\components\\Header.vue' /* webpackChunkName: "components/header" */).then(c => wrapFunctional(c.default || c)),
  Logo: () => import('../..\\components\\Logo.vue' /* webpackChunkName: "components/logo" */).then(c => wrapFunctional(c.default || c)),
  Recalls: () => import('../..\\components\\Recalls.vue' /* webpackChunkName: "components/recalls" */).then(c => wrapFunctional(c.default || c)),
  Share: () => import('../..\\components\\Share.vue' /* webpackChunkName: "components/share" */).then(c => wrapFunctional(c.default || c)),
  Slider: () => import('../..\\components\\Slider.vue' /* webpackChunkName: "components/slider" */).then(c => wrapFunctional(c.default || c)),
  Work: () => import('../..\\components\\Work.vue' /* webpackChunkName: "components/work" */).then(c => wrapFunctional(c.default || c))
}

for (const name in components) {
  Vue.component(name, components[name])
  Vue.component('Lazy' + name, components[name])
}
