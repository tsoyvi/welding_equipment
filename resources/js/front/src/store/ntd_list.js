import axios from 'axios'

export default ({
  state: {

    ntdList: []

  },

  getters: {
    NTD_LIST (state) {
      return state.ntdList
    }

  },
  mutations: {
    SET_NTD_LIST (state, ntdList) {
      // Костыль по раскодировке JSON из БД
      //
      const arr = ntdList
      for (let i = 0; i < arr.length; i += 1) {
        arr[i].control_method = JSON.parse(arr[i].control_method)
        // arr[i].otu = JSON.parse(arr[i].otu);
      }
      state.ntdList = arr
    },

    ADD_NTD (state, NTD) {
      const arr = NTD.data
      arr.id = NTD.id

      state.ntdList.push(arr)
      state.ntdList.sort((a, b) => (a.name > b.name ? 1 : -1))
    },

    EDIT_NTD () {
      //
    },

    DELETE_NTD (state, { id }) {
      state.ntdList = state.ntdList.filter((item) => item.id !== id)
    }
  },

  actions: {
    async getNtdList ({ commit }) {
      const { data } = await axios.get('/api/settings/ntd_list')
      console.log(data)
      if (data.success === true) {
        commit('SET_NTD_LIST', data.ntd_list)
      } else {
        alert(data.message)
      }
    },

    async saveNewNTD ({ commit }, NTDAdd) {
      try {
        const { data } = await axios.post('api/settings/ntd_list', NTDAdd)
        if (data.success === true) {
          commit('ADD_NTD', { data: NTDAdd, id: data.data.id })
          alert(data.message)
          return true
        }
        alert(data.message)
        return false
      } catch (error) {
        alert(Object.entries(error.response.data.errors).map(([k, v]) => `${k}: ${v}`).join(', '))
        return false
      }
    },

    async updateNTD ({ commit }, NTD) {
      try {
        const { data } = await axios.put(`api/settings/ntd_list/${NTD.id}`, NTD)
        if (data.success === true) {
          commit('EDIT_NTD')
          alert(data.message)
          return true
        }
        alert(data.message)
        return false
      } catch (error) {
        alert(Object.entries(error.response.data.errors).map(([k, v]) => `${k}: ${v}`).join(', '))
        return false
      }
    },

    async deleteNTD ({ commit }, NTD) {
      const { data } = await axios.delete(`/api/settings/ntd_list/${NTD.id}`)

      commit('DELETE_NTD', { id: NTD.id })
      alert(data.message)
    }

  },

  modules: {
  }

})
