import Vue from 'vue'

import Loader from './Loader'
import Dropdown from './Dropdown'
import Card from './Card'
import Button from './Button'
import FancyLink from './FancyLink';
// Components that are registered globaly.
[
  FancyLink,
  Card,
  Button,
  Dropdown,
  Loader
].forEach(Component => {
  Vue.component(Component.name, Component)
})
