<template>
<div class="container">
  <h5 class="text-center">Подбор нормативных документов</h5>
    <table class="table table-bordered border-primary table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ОТУ</th>
                <th scope="col">Способ сварки</th>
                <th scope="col">Вид свариваемых деталей</th>
                <th scope="col">Методы контроля</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-floating">
                      <SelectOtu
                        v-model="otuString"
                      />

                    </div>

                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-select form-select-sm" id="floatingSelect"
                          v-model="selectedWeldingMethod"
                        >
                          <option
                            v-for="method in weldingMethodList"
                            v-bind:value="method" :key="method"
                          >{{method}}
                          </option>
                        </select>
                        <label for="floatingSelect">Способ сварки</label>
                    </div>
                </td>
                <td>
                    <div class="form-check" v-for="(detail, index) in detailsTypeList" :key="index">
                        <input class="form-check-input" type="checkbox" :value="index" :id="index" v-model="selectedDetailsType">
                        <label class="form-check-label" :for="index">
                        {{index}} ({{detail}})
                        </label>
                    </div>

                </td>
                <td>
                    <div class="row">
                        <div class="col" v-for="(method, index) in methodsControl.NK" :key="index">
                            <div
                                class="form-check"
                            >
                                <input class="form-check-input" type="checkbox"
                                :value="method.name"
                                :title="method.title"
                                :id="method.name"
                                v-model="selectedMethodControl"
                                >
                                <label class="form-check-label" :for="method.name">
                                    {{method.name}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" v-for="(method, index) in methodsControl.RK" :key="index">
                            <div
                                class="form-check"
                            >
                                <input class="form-check-input" type="checkbox"
                                  :value="method.name"
                                  :title="method.title"
                                  :id="method.name"
                                  v-model="selectedMethodControl"
                                >
                                <label class="form-check-label" :for="method.name">
                                    {{method.name}}
                                </label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered border-primary table-striped table-sm">
      <tbody>
      <tr>
        <td scope="col">Нормативные документы на сварку:</td>
      </tr>
      <tr>
        <td scope="col">
          <span v-for="(NTDList, key, index) in foundNTDWeldingObj" :key="key">
            <span v-if="index !== 0"><br></span>
            <b>{{ key }}: </b>
            <span v-for="(NTDItem, NTDindex) in NTDList" :key="NTDindex">
              <span v-if="NTDindex !== 0">, </span>
              <span :title="NTDItem.long_name">{{NTDItem.name}}</span>
            </span>

          </span>

        </td>
      </tr>
      <tr>
        <td scope="col">Для копирования:</td>
      </tr>
      <tr>
        <td scope="col">
          <span v-for="(NTDItem, index) in sortNTDWeldingArr" :key="index">
            <span v-if="index !== 0">, </span>
            {{NTDItem.name}}
          </span>
        </td>
      </tr>
      <tr>
        <td scope="col">Нормативные документы на контроль:</td>
      </tr>
      <tr>
        <td scope="col">

          <span v-for="(NTDList, OTU, index) in foundNTDMethodControlObj" :key="OTU">
            <span v-if="index !== 0"><br></span>
            <b>{{ OTU }}: </b>

            <span v-for="(methodItem, method, methodIndex) in NTDList" :key="methodIndex">
              <span v-if="methodIndex !== 0">; </span>
                <b><i>{{ method }}: </i></b>

                <span v-for="(NTDItem, NTDindex) in methodItem" :key="NTDindex">
                  <span v-if="NTDindex !== 0">, </span>
                  <span :title="NTDItem.long_name">{{NTDItem.name}}</span>
                </span>
            </span>
          </span>
        </td>
      </tr>
      <tr>
        <td scope="col">Для копирования в карты:</td>
      </tr>
      <tr>
        <td scope="col">

          <span v-for="(items, methodControl, index) in foundNTDMethodControlArr" :key="index">
            <span v-if="index !== 0"><br></span>
            <b>{{ methodControl }}: </b>
            <span v-for="(NTDItem, NTDindex) in items" :key="NTDindex">
              <span v-if="NTDindex !== 0">, </span>
              <span :title="NTDItem.long_name">{{NTDItem.name}}</span>
            </span>
          </span>

        </td>
      </tr>
       <tr>
        <td scope="col">Для копирования в протокол:</td>
      </tr>
      <tr>
        <td scope="col">
          {{NTDControlSting}}
        </td>
      </tr>
      </tbody>
    </table>

    <button @click="PickUpDocs()">Test</button>

<input v-model="otuString">

    V3

</div>
</template>

<script>

import SelectOtu from './blocks/SelectOtu.vue'
import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'PickUpDocs',
  components: {
    SelectOtu
  },

  data () {
    return {
      methodsControl: {
        NK: [
          {
            id: 0,
            name: 'ВИК',
            title: 'Визуальный и измерительный контроль'
          },
          {
            id: 1,
            name: 'РК',
            title: 'Радиографический контроль'
          },
          {
            id: 2,
            name: 'УЗК',
            title: 'ультразвуковой контроль'
          },
          {
            id: 3,
            name: 'ПВК',
            title: 'Капиллярный контроль'
          },
          {
            id: 4,
            name: 'МК',
            title: 'Магнитно порошковый контроль'
          }
        ],
        RK: [
          {
            id: 0,
            name: 'Растяжение',
            title: 'Временное сопротивление на разрыв'
          },
          {
            id: 1,
            name: 'Изгиб',
            title: 'Статический изгиб'
          },
          {
            id: 2,
            name: 'Сплющивание',
            title: 'Сплющивание'
          },
          {
            id: 3,
            name: 'Сдвиг',
            title: 'Испытание на сдвиг'
          },
          {
            id: 4,
            name: 'Металлография',
            title: 'Металлографические исследования'
          }
        ]

      },

      regulatoryDocsWelding: '',
      selectedWeldingMethod: 'РД',
      selectedDetailsType: ['Т'],
      selectedMethodControl: ['ВИК', 'РК', 'УЗК'],

      detailsTypeList: { Т: 'Труба', Л: 'Лист', С: 'Стержень' },
      otuString: 'НГДО(4)',
      weldingMethodList: ['РД', 'МП', 'РАД', 'Э'],
      foundNTDWeldingObj: {},
      foundNTDWeldingArr: [],

      foundNTDMethodControlObj: {},
      foundNTDMethodControlArr: {}
    }
  },

  computed: {
    ...mapGetters(['otuItems', 'NTD_LIST']),

    sortNTDWeldingArr () {
      // eslint-disable-next-line vue/no-side-effects-in-computed-properties
      const arr = this.foundNTDWeldingArr.sort(
        (a, b) => {
          const x = a.name.toLowerCase()
          const y = b.name.toLowerCase()
          if (x < y) return -1
          if (x > y) return 1
          return 0
        })
      return arr
    },

    NTDControlSting () {
      let arr = []
      const vm = this.foundNTDMethodControlArr
      Object.keys(vm).forEach(function (method) {
        vm[method].forEach((ntd) => {
          if (!arr.includes(ntd.name)) arr.push(ntd.name)
        })
      })
      arr = arr.sort(
        (a, b) => {
          if (a < b) return -1
          if (a > b) return 1
          return 0
        })
      return arr.join(', ')
    }
  },
  methods: {
    ...mapActions(['getNtdList']),

    reset () {
      this.foundNTDWeldingObj = {}
      this.foundNTDWeldingArr = []
      this.foundNTDMethodControlObj = {}
      this.foundNTDMethodControlArr = {}
      // this.foundNTDMethodControlArr = {}
    },

    PickUpDocs () {
      const foundInOTU = {}
      this.reset()

      const selectedOtu = this.stringToObject(this.otuString)

      for (const indexOtu in this.NTD_LIST) {
        const NTDOtu = this.stringToObject(this.NTD_LIST[indexOtu].otu)
        const found = this.objectComparison(selectedOtu, NTDOtu)
        // console.log(found)

        // console.log('2- ', NTDOtu.stoGazprom)
        const gazpromEnabled = this.gazpromEnabled(selectedOtu, NTDOtu)
        console.log(gazpromEnabled)

        if (found) {
          found.forEach(element => {
            if (!(element.key in foundInOTU)) {
              foundInOTU[element.key] = {}
            }
            if (!(element.point in foundInOTU[element.key])) {
              foundInOTU[element.key][element.point] = []
            }
            const methodWeldingComparison = this.methodWeldingComparison(this.selectedWeldingMethod, this.NTD_LIST[indexOtu].welding_method)
            // console.log(methodWeldingComparison)
            const detailsTypeComparison = this.detailsTypeComparison(this.selectedDetailsType, this.NTD_LIST[indexOtu].details_type)
            // console.log(detailsTypeComparison)

            if (methodWeldingComparison && detailsTypeComparison && gazpromEnabled) {
              foundInOTU[element.key][element.point].push(this.NTD_LIST[indexOtu])
            }
          })
        }
      }
      // this.regulatoryDocsWelding = foundInOTU
      this.foundNTDWelding(foundInOTU)
      this.foundNTDMethodControl(foundInOTU)
    },

    // ВЫборка из НТД где есть выбранные методы контроля
    foundNTDMethodControl (NTDObject) {
      const vm = this
      Object.keys(NTDObject).forEach(function (key) {
        Object.keys(NTDObject[key]).forEach(function (point) {
          if (vm.otuItems[key] !== undefined) {
            const keyNTDWelding = vm.otuItems[key].name + '(' + point + ')'

            vm.foundNTDMethodControlObj[keyNTDWelding] = {}
            const ntdList = NTDObject[key][point]

            ntdList.forEach((ntd) => {
            // console.log(ntd)
              const methods = vm.methodControl(ntd)

              if (methods) {
                methods.forEach((method) => {
                  if (!(method in vm.foundNTDMethodControlObj[keyNTDWelding])) {
                    vm.foundNTDMethodControlObj[keyNTDWelding][method] = []
                  }
                  if (!(method in vm.foundNTDMethodControlArr)) {
                    vm.foundNTDMethodControlArr[method] = []
                  }

                  vm.foundNTDMethodControlObj[keyNTDWelding][method].push(ntd)

                  if (!vm.foundNTDMethodControlArr[method].includes(ntd)) vm.foundNTDMethodControlArr[method].push(ntd)
                })
              // if (!vm.foundNTDMethodControlArr.includes(ntd)) vm.foundNTDMethodControlArr.push(ntd)
              }
            })
          }
        })
      })
    },

    methodControl (OTU) {
      const vm = this
      const result = []
      const controlMethod = OTU.control_method
      controlMethod.forEach((method) => {
        if (vm.selectedMethodControl.includes(method.name)) result.push(method.name)
      })
      // console.log(result)
      return result
    },

    // формирование объекта и массива из НТД по сварке
    foundNTDWelding (NTDObject) {
      const vm = this
      Object.keys(NTDObject).forEach(function (key) {
        Object.keys(NTDObject[key]).forEach(function (point) {
          if (vm.otuItems[key] !== undefined) {
            const keyNTDWelding = vm.otuItems[key].name + '(' + point + ')'
            vm.foundNTDWeldingObj[keyNTDWelding] = []
            const ntdList = NTDObject[key][point]
            ntdList.forEach((el) => {
              if (el.weld_enabled) {
                vm.foundNTDWeldingObj[keyNTDWelding].push(el)
                if (!vm.foundNTDWeldingArr.includes(el)) vm.foundNTDWeldingArr.push(el)
              }
            })
          }
        })
      })
    },

    // Преобразование строки ОТУ в объект
    stringToObject (otuString = {}) {
      const selectedOtu = {}
      // console.log(otuString)

      let arr = otuString.split(')')
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
        if (found !== undefined) {
          selectedOtu[found[0]] = nameOtu[1].split(',')
        }
      })

      selectedOtu.stoGazprom = []
      if (otuString.indexOf(' с учётом СТО "Газпром"') >= 0) {
        console.log(otuString)
        selectedOtu.stoGazprom[0] = true
      } else selectedOtu.stoGazprom[0] = false

      // console.log('1- ', otuString, selectedOtu.stoGazprom)

      return selectedOtu
    },

    // сравнения объектов ОТУ
    objectComparison (object1, object2) {
      // console.log(object1, object2)
      const foundInOTU = []
      const objKeys2 = Object.keys(object2) // из списка
      for (const key of objKeys2) {
        const value1 = object1[key]
        const value2 = object2[key]
        for (const i in value1) {
          if (value2.includes(value1[i])) {
            foundInOTU.push({ key, point: value1[i] })
          }
        }
      }
      if (foundInOTU.length === 0) {
        return false
      }
      return foundInOTU
    },

    // Сравнение по способу сварки
    methodWeldingComparison (methodWelding, methodWeldingString) {
      const strMethodWelding = methodWeldingString.replace(/\s/g, '')
      const arr = strMethodWelding.split(',')
      if (arr.includes(methodWelding)) return true
      return false
    },

    // Сравнение по видам деталей
    detailsTypeComparison (detailsTypeArr, detailsTypeString) {
      let result = false
      const strDetailsType = detailsTypeString.replace(/\s/g, '')
      const arr = strDetailsType.split(',')
      detailsTypeArr.forEach((el) => {
        if (arr.includes(el)) result = true
      })
      return result
    },

    // Сравнение по выбору с учётом СТО "Газпром"
    gazpromEnabled (object1, object2) {
      // console.log(object2.stoGazprom, object2.stoGazprom)
      if (object1.stoGazprom[0] === object2.stoGazprom[0]) return true
      return false
    }

  },

  mounted () {
    this.getNtdList()
  }

}

</script>

<style>
body {
  background-color: #FFF7F7;
}

</style>
