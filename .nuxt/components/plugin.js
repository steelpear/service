import Vue from 'vue'
import { wrapFunctional } from './utils'

const components = {
  Header: () => import('../..\\components\\Header.vue' /* webpackChunkName: "components/header" */).then(c => wrapFunctional(c.default || c)),
  Share: () => import('../..\\components\\Share.vue' /* webpackChunkName: "components/share" */).then(c => wrapFunctional(c.default || c))
}

for (const name in components) {
  Vue.component(name, components[name])
  Vue.component('Lazy' + name, components[name])
}
