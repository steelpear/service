import { wrapFunctional } from './utils'

export { default as Share } from '../..\\components\\Share.vue'

export const LazyShare = import('../..\\components\\Share.vue' /* webpackChunkName: "components/share" */).then(c => wrapFunctional(c.default || c))
