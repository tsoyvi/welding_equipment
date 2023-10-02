<template>

<textarea id="stringOTU" ref="stringOTU" class="form-control form-control-sm" @click="showSelector()" rows="5"
    :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" readonly></textarea>

<div id="divOTUSelector" ref="divOTUSelector" class="bg-light border border-success p-2 border-opacity-10 rounded-1"
    v-show="isShowSelector">

    <div v-for="(otuItem, otuIndex) in otuItems" :key="otuIndex">
        <label :for="'surName' + otuIndex" class="form-check-label">
            <input type="checkbox" :value="otuItem.name" :id="'surName' + otuIndex" class="form-check-input remove-halo"
                @change="otuToString()" v-model="enableOtu[otuIndex]">
            {{ otuItem.name + ' - ' + otuItem.header }}
        </label>

        <transition name="listotu-fade">
            <div class="bg-light-subtle" v-show="enableOtu[otuIndex]">

                <label :for="otuItem.name + item.index" v-for="(item, index) in otuItem.list" :key="index"
                    class="form-check-label ms-2">
                    <input type="checkbox" :value="item.index" :id="otuItem.name + item.index"
                        v-model="selectedOtu[otuIndex]" @change="otuToString()" :title="item.description"
                        class="form-check-input remove-halo">
                    {{ otuItem.name }}({{ item.index }})
                </label>

            </div>
        </transition>

    </div>

    <label for="select-OTU">
        <input type="checkbox" id="STO_GAZ" onClick="select_OTU();">
        С учетом ПАО "Газпром"
    </label>

    <div class="OTU-button-close" @click="close()" @keydown="bar">
        <i class="fa fa-window-close" aria-hidden="true"></i>
    </div>

    <div class="div-OTU-shadow" @click="close()" @keydown="bar"></div>
</div>

</template>

<script>

import { mapActions, mapGetters } from 'vuex'
// import { Collapse } from 'bootstrap'

export default {
  name: 'SelectOtu',
  props: ['modelValue'],

  data () {
    return {
      enableOtu: { },
      selectedOtu: {
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
      },
      otuString: '',
      isShowSelector: false
    }
  },

  components: {
  },

  computed: {
    ...mapGetters(['otuItems'])
  },

  methods: {
    ...mapActions(['getGroupTechDevicesItemLocalStorage', 'getGroupTechDevicesItem']),

    otuToString () {
      let str = ''
      this.otuString = ''
      Object.entries(this.selectedOtu).forEach((otu) => {
        str = otu[1].sort((a, b) => a - b).join(',')
        if (str && this.enableOtu[otu[0]] === true) {
          if (this.otuString !== '') { this.otuString += ', ' }
          this.otuString += `${this.otuItems[otu[0]].name}(${str})`
        }
      })
      this.$emit('update:modelValue', this.otuString)
      // console.log(this.otuString)
    },

    close () {
      this.selectOtuUnShow()
    },

    showSelector () {
      this.otuString = this.modelValue // синхронизируем нашу строку с родительской
      this.isShowSelector = !this.isShowSelector
      console.log(this.getPositionElement('stringOTU'))
      this.setPositionElement('divOTUSelector', this.getPositionElement('stringOTU'))
      this.stringToSelectedOtu('stringOTU')
      this.addEventListenerToCloseSelector()
    },

    addEventListenerToCloseSelector () {
      const vm = this

      document.addEventListener('click', function handler (item) {
        const target = item.target
        // eslint-disable-next-line eqeqeq
        const divOTUSelector = target == vm.$refs.divOTUSelector || vm.$refs.divOTUSelector.contains(target)

        if (!divOTUSelector && target !== vm.$refs.stringOTU) {
          if (vm.isShowSelector) {
            vm.isShowSelector = false
            document.removeEventListener('click', handler)
          }
        }
      })
    },

    getPositionElement (idObjTarget) {
      const coordinates = this.$refs[idObjTarget].getBoundingClientRect()

      const scrollTop = (window.pageYOffset || document.documentElement.scrollTop ||
              document.body.scrollTop || 0) + coordinates.top
      const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft ||
              document.body.scrollLeft || 0 + coordinates.left

      return { scrollTop, scrollLeft, coordinates }
    },

    setPositionElement (idObjTarget, position) {
      const objTarget = this.$refs[idObjTarget]

      objTarget.style.top = `${position.scrollTop + position.coordinates.height / 2}px`
      objTarget.style.left = `${position.scrollLeft}px`
    },

    // Преобразование строки ОТУ в выбор галочками checkbox
    stringToSelectedOtu () {
      let arr = this.otuString.split(')')
      // удаляем пустые значения массива
      arr = arr.filter((e) => e)
      //
      arr.forEach((el) => {
        const nameOtu = el.split('(')
        // удаляем запятые и пробелы
        const searchTerm = nameOtu[0].replace(/^[,\s]+|[,\s]+$/g, '')

        // ищем в объекте списка ОТУ название на русском
        // и выбираем ключ (название на английском NGDO GO и тп.)
        const found = Object.entries(this.otuItems)
          .find((pair) => this.otuItems[pair[0]].name === searchTerm)
        // добавляем в наш объект выбранных ОТУ полученные данные
        // из строки номеров оту делаем массив и загоняем в объект
        this.selectedOtu[found[0]] = nameOtu[1].split(',')
        this.enableOtu[found[0]] = true
      })
    }

  },

  async mounted () {
    /**
     * Загрузка перечня ОТУ
     * / */

    if (this.otuItems.length === 0) {
      const result = await this.getGroupTechDevicesItemLocalStorage() // ищем в локальном хранилище
      if (!result) {
        this.getGroupTechDevicesItem() // если нет то загружаем с сервера
      }
    }

    // this.collapse = new Collapse(this.$refs.otuCollapse)
  }

}

</script>

<style>
#divOTUSelector {
  position: fixed;
  width: 900px;
  z-index: 100;
  font-size: 0.95rem;
  left: 0px;
  top: 0px;
}

.listotu-fade-enter-active,
.listotu-fade-leave-active {
  overflow: hidden;
  max-height: 200px;
  transition: max-height 0.6s cubic-bezier(0, 0, 1, 1);

}

.listotu-fade-enter-from,
.listotu-fade-leave-to {
    max-height: 0;
    transition: max-height 0.3s cubic-bezier(0, 1, 0, 1);
}

.remove-halo:focus {
  box-shadow: 0 0 0 0px !important;
}

#stringOTU {
  width: 300px;
  padding-top: 5px !important;
}

</style>
