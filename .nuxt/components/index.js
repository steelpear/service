import { wrapFunctional } from './utils'

export { default as Header } from '../..\\components\\Header.vue'
export { default as Share } from '../..\\components\\Share.vue'

export const LazyHeader = import('../..\\components\\Header.vue' /* webpackChunkName: "components/header" */).then(c => wrapFunctional(c.default || c))
export const LazyShare = import('../..\\components\\Share.vue' /* webpackChunkName: "components/share" */).then(c => wrapFunctional(c.default || c))
