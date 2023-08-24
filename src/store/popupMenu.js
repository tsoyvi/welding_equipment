export default ({
  state: {
    popupMenuitems: [
      { id: '1', title: 'Организация', module: 'InitialDataSlot' },
      { id: '2', title: 'заявка', module: '' },
      { id: '3', title: '-', module: '' },
      { id: '4', title: 'Акт', module: '' }
    ]
  },

  getters: {
    POPUP_MENU_ITEMS (state) {
      return state.popupMenuitems
    }

  },

  mutations: {
  },

  actions: {
  },

  modules: {
  }

})
