/* import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

createApp(App).use(store).use(router).mount('#app')
*/

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import 'bootstrap/dist/css/bootstrap.min.css'

import {
  Alert, Button, Carousel, Collapse, Dropdown, Modal,
  Offcanvas, Popover, ScrollSpy, Tab, Toast, Tooltip
} from 'bootstrap'

import { createVbPlugin } from 'vue3-plugin-bootstrap5'

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

app.mount('#app')
