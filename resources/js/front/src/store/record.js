import axios from 'axios'
import requests from './blocks/requests'

export default ({
  state: {
    recordSelected: {
      applicant: 'test',
      name_organization: '5565',
      address: 'address',
      inn: 'inn',
      name_contact: 'name_contact',
      phone: 'phone',
      email: 'email',
      website: 'website',
      organization_status: 'Потребитель'
    },

    recordList: []
  },

  getters: {
    RECORD_LIST (state) {
      return state.recordList
    },

    RECORD_SELECTED (state) {
      return state.recordSelected
    }

  },
  mutations: {

    SET_RECORDS (state, records) {
      state.recordList = records
    },

    ADD_RECORD (state, record) {
      state.recordList.push(record)
      state.recordSelected = record
    },

    UPDATE_RECORD (state, record) {
      // state.recordList.push(record)
    },

    SET_RECORD_SELECTED (state, recordId) {
      // console.log(recordId)
      if (recordId === null) {
        for (const key in state.recordSelected) {
          state.recordSelected[key] = ''
        }
      } else {
        const index = state.recordList.findIndex((record) => record.id === recordId)
        state.recordSelected = state.recordList[index]
      }
    }
  },

  actions: {

    async RECORDS_REQUEST ({ commit }) {
      const { data } = await axios.get('/api/records')
      console.log(data)
      if (data.success === true) {
        commit('SET_RECORDS', data.records_list)
      } else {
        alert(data.message)
      }
    },

    async ADD_RECORD_REQUEST ({ commit }, recordObj) {
      const result = await requests.postJson('/api/receipt', recordObj)

      if (result.success === true) {
        console.log(result.data)
        commit('ADD_RECORD', result.data.record)
        return true
      }
      this.dispatch('addError', result.error)
      return false
    },

    async UPDATE_RECORD_REQUEST ({ commit }, recordObj) {
      const result = await requests.postJson('/api/record-update', recordObj)

      if (result.success === true) {
        console.log(result.data)
        commit('UPDATE_RECORD', result.data.record)
        return true
      }
      this.dispatch('addError', result.error)
      return false
    }

  },

  modules: {
  }

})
