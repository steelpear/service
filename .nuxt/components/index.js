import { wrapFunctional } from './utils'

export { default as About } from '../..\\components\\About.vue'
export { default as Advantages } from '../..\\components\\Advantages.vue'
export { default as Consult } from '../..\\components\\Consult.vue'
export { default as Defects } from '../..\\components\\Defects.vue'
export { default as Equipment } from '../..\\components\\Equipment.vue'
export { default as Header } from '../..\\components\\Header.vue'
export { default as Logo } from '../..\\components\\Logo.vue'
export { default as Recalls } from '../..\\components\\Recalls.vue'
export { default as Share } from '../..\\components\\Share.vue'
export { default as Slider } from '../..\\components\\Slider.vue'
export { default as Work } from '../..\\components\\Work.vue'

export const LazyAbout = import('../..\\components\\About.vue' /* webpackChunkName: "components/about" */).then(c => wrapFunctional(c.default || c))
export const LazyAdvantages = import('../..\\components\\Advantages.vue' /* webpackChunkName: "components/advantages" */).then(c => wrapFunctional(c.default || c))
export const LazyConsult = import('../..\\components\\Consult.vue' /* webpackChunkName: "components/consult" */).then(c => wrapFunctional(c.default || c))
export const LazyDefects = import('../..\\components\\Defects.vue' /* webpackChunkName: "components/defects" */).then(c => wrapFunctional(c.default || c))
export const LazyEquipment = import('../..\\components\\Equipment.vue' /* webpackChunkName: "components/equipment" */).then(c => wrapFunctional(c.default || c))
export const LazyHeader = import('../..\\components\\Header.vue' /* webpackChunkName: "components/header" */).then(c => wrapFunctional(c.default || c))
export const LazyLogo = import('../..\\components\\Logo.vue' /* webpackChunkName: "components/logo" */).then(c => wrapFunctional(c.default || c))
export const LazyRecalls = import('../..\\components\\Recalls.vue' /* webpackChunkName: "components/recalls" */).then(c => wrapFunctional(c.default || c))
export const LazyShare = import('../..\\components\\Share.vue' /* webpackChunkName: "components/share" */).then(c => wrapFunctional(c.default || c))
export const LazySlider = import('../..\\components\\Slider.vue' /* webpackChunkName: "components/slider" */).then(c => wrapFunctional(c.default || c))
export const LazyWork = import('../..\\components\\Work.vue' /* webpackChunkName: "components/work" */).then(c => wrapFunctional(c.default || c))
