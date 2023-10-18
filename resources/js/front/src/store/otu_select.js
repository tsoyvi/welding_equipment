// import positionElement from './positionElement'
import requests from './blocks/requests'

export default ({
  state: {
    selectOtuShow: false,
    idTarget: null,
    /* selectedOtu: {
      0: [],
      1: [],
      2: [],
      3: [],
      4: [],
      5: [],
      6: [],
      7: [],
      8: [],
      9: [],
      10: [],
      11: [],
      StoGazprom: []
    }, */
    enableOtu: {},
    otuItems: []

  },

  getters: {
    /* selectOtuShow (state) {
      return state.selectOtuShow
    },
    selectedOtu (state) {
      return state.selectedOtu
    },
    enableOtu (state) {
      return state.enableOtu
    }, */
    otuItems (state) {
      return state.otuItems
    }
  },

  mutations: {
    SET_OTU_ITEMS (state, otuList) {
      state.otuItems = otuList
      localStorage.setItem('otuList', JSON.stringify(otuList))
    }

  },

  actions: {

    async getGroupTechDevicesItem ({ commit }) {
      const result = await requests.getJson('/api/otu-list')
      if (result.success === true) {
        console.log(result.data.otu_list)
        commit('SET_OTU_ITEMS', result.data.otu_list)

        return true
      }
      console.log(result)
      this.dispatch('addError', result.error)
      return false
    },

    async getGroupTechDevicesItemLocalStorage ({ commit }) {
      if ('otuList' in localStorage) {
        const otuList = JSON.parse(localStorage.getItem('otuList'))
        commit('SET_OTU_ITEMS', otuList)
        return true
      }
      return false
    }

  },

  modules: {
  }

})
