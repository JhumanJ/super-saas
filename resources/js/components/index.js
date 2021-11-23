import './common'
import './forms'

import Vue from 'vue'
import Child from './Child'
import Modal from './Modal'

// Components that are registered globaly.
[
  Child,
  Modal
].forEach(Component => {
  Vue.component(Component.name, Component)
})
