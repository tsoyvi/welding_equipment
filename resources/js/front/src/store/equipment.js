// import axios from 'axios'
import requests from './blocks/requests'

export default ({
  state: {

    equipmentList: []

  },

  getters: {
    EQUIPMENT_LIST (state) {
      return state.equipmentList
    }

  },
  mutations: {
    ADD_EQUIPMENT (state, equipment) {

    }
  },

  actions: {
    /*
    async getNtdList ({ commit }) {
      const { data } = await axios.get('/api/settings/ntd_list')
      console.log(data)
      if (data.success === true) {
        commit('SET_NTD_LIST', data.ntd_list)
      } else {
        alert(data.message)
      }
    },
*/

    async ADD_EQUIPMENT_REQUEST ({ commit }, equipmentObj) {
      console.log(equipmentObj)

      const result = await requests.postJson('/api/equipment', equipmentObj)

      if (result.success === true) {
        console.log(result.data)
        commit('ADD_EQUIPMENT')
        return true
      }
      this.dispatch('addError', result.error)
      return false
    }

  },

  modules: {
  }

})
