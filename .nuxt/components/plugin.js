import Vue from 'vue'
import { wrapFunctional } from './utils'

const components = {
  Share: () => import('../..\\components\\Share.vue' /* webpackChunkName: "components/share" */).then(c => wrapFunctional(c.default || c))
}

for (const name in components) {
  Vue.component(name, components[name])
  Vue.component('Lazy' + name, components[name])
}
