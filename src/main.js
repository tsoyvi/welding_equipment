
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
// import { faPhone, fa-bars } from '@fortawesome/free-solid-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'

import 'bootstrap/dist/css/bootstrap.min.css'

import {
  Alert, Button, Carousel, Collapse, Dropdown, Modal,
  Offcanvas, Popover, ScrollSpy, Tab, Toast, Tooltip
} from 'bootstrap'

import { createVbPlugin } from 'vue3-plugin-bootstrap5'
library.add(fas)

const vbPlugin = createVbPlugin({
  Alert,
  Button,
  Carousel,
  Collapse,
  Dropdown,
  Modal,
  Offcanvas,
  Popover,
  ScrollSpy,
  Tab,
  Toast,
  Tooltip
})

const app = createApp(App)

app.use(vbPlugin)
  .use(store)
  .use(router)
  .component('font-awesome-icon', FontAwesomeIcon)

app.mount('#app')
