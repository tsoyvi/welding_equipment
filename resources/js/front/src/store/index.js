import { createStore } from 'vuex'

import popupMenu from './popupMenu'
import otuSelect from './otu_select'
import ntdList from './ntd_list'
import methodsWelding from './methods_welding'

export default createStore({
  state: {
  },
  getters: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    popupMenu,
    otuSelect,
    ntdList,
    methodsWelding
  }
})
