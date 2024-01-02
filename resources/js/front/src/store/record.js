// import axios from 'axios'
import requests from './blocks/requests'

export default ({
  state: {

    recordList: []

  },

  getters: {
    RECORD_LIST (state) {
      return state.recordList
    }

  },
  mutations: {
    ADD_RECORD (state, record) {

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

    async ADD_RECORD_REQUEST ({ commit }, recordObj) {
      const result = await requests.postJson('/api/receipt', recordObj)

      if (result.success === true) {
        console.log(result.data)
        commit('ADD_RECORD')
        return true
      }
      this.dispatch('addError', result.error)
      return false
    }

  },

  modules: {
  }

})
