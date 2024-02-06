import { createStore } from 'vuex'

import errors from './blocks/errors'
import popupMenu from './popupMenu'
import otuSelect from './otu_select'
import ntdList from './ntd_list'
import methodsWelding from './methods_welding'
import record from './record'
import equipment from './equipment'

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
    errors,
    popupMenu,
    otuSelect,
    ntdList,
    methodsWelding,
    record,
    equipment
  }
})
