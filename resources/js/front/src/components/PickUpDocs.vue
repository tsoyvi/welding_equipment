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
                            <SelectOtu v-model="otuString" />

                        </div>

                    </td>
                    <td>
                        <div class="form-floating">
                            <select class="form-select form-select-sm selector-welding-method"
                                v-model="selectedWeldingMethod">
                                <option v-for="(method, index) in weldingMethodList" v-bind:value="method.name"
                                    :key="index" :title="method.description">{{method.name}}
                                </option>
                            </select>

                        </div>
                    </td>
                    <td style="width: 250px">
                        <div class="col form-check" v-for="(detail, index) in detailsTypeList" :key="index">
                            <input class="form-check-input" type="checkbox" :value="index" :id="index"
                                v-model="selectedDetailsType">
                            <label class="form-check-label" :for="index">
                                {{index}} ({{detail}})
                            </label>
                        </div>

                    </td>
                    <td style="width: 375px">
                        <div class="row">
                            <div class="col" v-for="(method, index) in methodsControl.NK" :key="index">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" :value="method.name"
                                        :title="method.title" :id="method.name" v-model="selectedMethodControl">
                                    <label class="form-check-label" :for="method.name">
                                        {{method.name}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col" v-for="(method, index) in methodsControl.RK" :key="index">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" :value="method.name"
                                        :title="method.title" :id="method.name" v-model="selectedMethodControl">
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

        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">

                <h2 class="accordion-header" id="NTDWeldingByOTU">
                    <button class="accordion-button accordion-style " type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        <b>Перечень нормативных документов на сварку по ОТУ:</b>
                    </button>
                </h2>

                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                    aria-labelledby="NTDWeldingByOTU">
                    <div class="accordion-body">
                        <table width="100%" class="table-fount-NTD">
                            <tbody>
                                <tr v-for="(typeDetails, otu, index) in NTDWeldingByOTU" :key="index">
                                    <td style="width: 100px"><b>{{ otu }}: </b></td>
                                    <td>
                                        <span class=""
                                            v-for="(typeDetailItem, typeDetail, typeDetailIndex) in typeDetails"
                                            :key="typeDetailIndex">
                                            <span v-if="typeDetailIndex !== 0"><br> </span>
                                            <span class=""><b><i>{{ typeDetail }}: </i></b></span>
                                            <span v-for="(NTDItem, NTDindex) in typeDetailItem" :key="NTDindex">
                                                <span v-if="NTDindex !== 0">, </span>
                                                <span :title="NTDItem.long_name">{{NTDItem.name}}</span>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="">
                    <button class="accordion-button accordion-style " type="button" data-bs-toggle="collapse"
                        data-bs-target="#NTDWeldingObjToMap">
                        <b>Нормативные документы на сварку для копирования в карты:</b>
                    </button>
                </h2>
                <div id="NTDWeldingObjToMap" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <table width="100%" class="table-fount-NTD">
                            <tbody>
                                <tr v-for="(items, typeDetail, index) in NTDWeldingObjToMap" :key="index">
                                    <td style="width: 100px"><b>{{ typeDetail }}: </b></td>
                                    <td>
                                        <span v-for="(NTDItem, NTDindex) in items" :key="NTDindex">
                                            <span v-if="NTDindex !== 0">, </span>
                                            <span :title="NTDItem.long_name">{{NTDItem.name}}</span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="">
                    <button class="accordion-button accordion-style " type="button" data-bs-toggle="collapse"
                        data-bs-target="#NTDWelding">
                        <b>Нормативные документы на сварку для копирования в заявку (протокол):</b>
                    </button>
                </h2>
                <div id="NTDWelding" class="accordion-collapse collapse show">
                    <div class="accordion-body" v-if="NTDWelding.length!==0">

                        <span v-for="(NTDItem, index) in NTDWelding" :key="index">
                            <span v-if="index !== 0">, </span>
                            {{NTDItem.name}}
                        </span>
                    </div>
                    <div class="accordion-body" v-else>Выберите параметры</div>
                </div>
            </div>
        </div>

        <hr>
        <!--   -->
        <div class="accordion" id="NTDControl">
            <div class="accordion-item">

                <h2 class="accordion-header" id="">
                    <button class="accordion-button accordion-style " type="button" data-bs-toggle="collapse"
                        data-bs-target="#NTDControlAllObj"
                        ><b>Нормативные документы на контроль:</b>
                    </button>
                </h2>

                <div id="NTDControlAllObj" class="accordion-collapse collapse">
                    <div class="accordion-body">

                        <table width="100%" class="table-fount-NTD">
                            <tbody>
                                <tr v-for="(NTDList, OTU) in NTDControlAllObj" :key="OTU">
                                    <!-- <span v-if="index !== 0"><br></span> -->
                                    <td style="width: 100px"><b>{{ OTU }}: </b></td>

                                    <td v-for="(typeDetailItem, typeDetail, typeDetailIndex) in NTDList"
                                        :key="typeDetailIndex">
                                        <!-- <span v-if="typeDetailIndex !== 0">; </span> -->
                                        <table width="100%" class="table-fount-NTD-sub">
                                            <tbody>
                                                <tr>
                                                    <td><b><i>{{ typeDetail }}: </i></b></td>
                                                    <td>
                                                        <span
                                                            v-for="(methodControlItem, methodControl, methodControlIndex) in typeDetailItem"
                                                            :key="methodControlIndex">
                                                            <span v-if="methodControlIndex !== 0"><br></span>
                                                            <span class=""><b><i>{{methodControl}}: </i></b></span>

                                                            <span v-for="(NTDItem, NTDindex) in methodControlItem"
                                                                :key="NTDindex">
                                                                <span v-if="NTDindex !== 0">, </span>
                                                                <span :title="NTDItem.long_name">{{NTDItem.name}}</span>
                                                            </span>

                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="">
                    <button class="accordion-button accordion-style " type="button" data-bs-toggle="collapse"
                        data-bs-target="#NTDControlObj">
                        <b>Нормативные документы на контроль для копирования в карты:</b>
                    </button>
                </h2>
                <div id="NTDControlObj" class="accordion-collapse collapse show">
                    <div class="accordion-body" v-if="NTDControlObj.length!==0">
                        <table width="100%" class="table-fount-NTD" >
                            <tbody>
                                <tr  v-for="(items, typeDetail, index) in NTDControlObj" :key="index">
                                    <td style="width: 100px"><b>{{ typeDetail }}: </b></td>
                                    <td>
                                        <table width="100%" class="table-fount-NTD-sub table-fount-NTD-row">
                                            <tbody>
                                                <tr v-for="(methodItem, method, methodIndex) in items"
                                                    :key="methodIndex">
                                                    <!-- <span v-if="methodIndex !== 0"><br> </span> -->
                                                    <td> <b><i>{{ method }}: </i></b> </td>
                                                    <td>
                                                        <span v-for="(NTDItem, NTDindex) in methodItem" :key="NTDindex">
                                                            <span v-if="NTDindex !== 0">, </span>
                                                            <span :title="NTDItem.long_name">{{NTDItem.name}}</span>
                                                        </span>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><div class="accordion-body" v-else> yecv</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="">
                    <button class="accordion-button accordion-style" type="button" data-bs-toggle="collapse"
                        data-bs-target="#NTDControlSting" aria-expanded="true"><b>Нормативные документы на контроль:</b>
                    </button>
                </h2>
                <div id="NTDControlSting" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                       <span v-if="NTDControlSting !==''"> {{NTDControlSting}} </span>
                       <span v-else>Выберите параметры</span>
                    </div>
                </div>
            </div>
        </div>
<!--
        <button @click="pickUpDocs()">Test</button>
        <input v-model="otuString">
-->
        <hr>
        <footer class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-1">V3</div>
                    <div class="col">ООО "НАКС-ПФО" Лаборатория контроля</div>
                    <div class="col">
<<<<<<< HEAD

=======
                       Дизайн Ц
>>>>>>> b3469c0db335b205c574d980c9bb345ffec92476
                    </div>
                    <div class="col-1">2023г.</div>
                </div>
            </div>
        </footer>

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
            name: 'Отрыв',
            title: 'Отрыв седлового отвода'
          },
          {
            id: 4,
            name: 'Сдвиг',
            title: 'Испытание на сдвиг'
          },
          {
            id: 5,
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
      // otuString: 'НГДО(4), СК(2)',
      otuString: '',
      foundNTDWeldingObj: {},
      foundNTDMethodControlObj: {},
      foundNTDMethodControlToCopy: []
    }
  },

  computed: {
    ...mapGetters(['otuItems', 'NTD_LIST', 'METHODS_WELDING_LIST']),

    // Формирование объекта на контроль для проверки по ОТУ Способам и тип деталей
    NTDControlAllObj () {
      const vm = this
      const NTDObject = this.foundNTDMethodControlObj
      // Очень тупое копирование объекта
      const obj = {}
      Object.keys(NTDObject).forEach(function (key) {
        Object.keys(NTDObject[key]).forEach(function (point) {
          // console.log(NTDObject[key], NTDObject[key][point])
          if (vm.otuItems[key] !== undefined) {
            const OTUName = vm.otuItems[key].name + '(' + point + ')'

            // Здесь необходима оптимизация кода (копирование объекта)
            if (!(OTUName in obj)) obj[OTUName] = {}
            Object.keys(NTDObject[key][point]).forEach(function (typeDetail) {
              if (!(typeDetail in obj[OTUName])) obj[OTUName][typeDetail] = {}
              const arrNTDOnTypeDetail = NTDObject[key][point][typeDetail]
              Object.keys(arrNTDOnTypeDetail).forEach(function (methodControl) {
              // console.log(methodControl)
                if (!(methodControl in obj[OTUName][typeDetail])) obj[OTUName][typeDetail][methodControl] = []
                arrNTDOnTypeDetail[methodControl].forEach((ntd) => {
                  obj[OTUName][typeDetail][methodControl].push(ntd)
                })
              })
            })
          }
        })
      })
      return obj
    },

    // формирование объекта на контроль для копирования в карты
    NTDControlObj () {
      const obj = {}
      const NTDObject = this.foundNTDMethodControlObj
      Object.keys(NTDObject).forEach(function (key) {
        Object.keys(NTDObject[key]).forEach(function (point) {
          Object.keys(NTDObject[key][point]).forEach(function (typeDetail) {
            const arrNTDOnTypeDetail = NTDObject[key][point][typeDetail]
            if (!(typeDetail in obj)) obj[typeDetail] = {}
            Object.keys(arrNTDOnTypeDetail).forEach(function (methodControl) {
              // console.log(methodControl)
              if (!(methodControl in obj[typeDetail])) obj[typeDetail][methodControl] = []
              arrNTDOnTypeDetail[methodControl].forEach((ntd) => {
                if (!obj[typeDetail][methodControl].includes(ntd)) obj[typeDetail][methodControl].push(ntd)
              })
            })
          })
        })
      })
      return obj
    },

    NTDWelding () {
      let arr = []
      const NTDObject = this.foundNTDWeldingObj
      // console.log(NTDObject)
      Object.keys(NTDObject).forEach(function (key) {
        Object.keys(NTDObject[key]).forEach(function (point) {
          Object.keys(NTDObject[key][point]).forEach(function (typeDetail) {
            const arrNTDOnTypeDetail = NTDObject[key][point][typeDetail]
            arrNTDOnTypeDetail.forEach((ntd) => {
              if (!arr.includes(ntd)) arr.push(ntd)
            })
          })
        })
      })
      arr = arr.sort(
        (a, b) => {
          const x = a.name.toLowerCase()
          const y = b.name.toLowerCase()
          if (x < y) return -1
          if (x > y) return 1
          return 0
        })
      return arr
    },
    // формирование объекта на сварку по ОТУ
    NTDWeldingByOTU () {
      const vm = this
      const NTDObject = this.foundNTDWeldingObj
      // Очень тупое копирование объекта
      const obj = {}
      Object.keys(NTDObject).forEach(function (key) {
        Object.keys(NTDObject[key]).forEach(function (point) {
          if (vm.otuItems[key] !== undefined) {
            const OTUName = vm.otuItems[key].name + '(' + point + ')'
            // Здесь необходима оптимизация кода (копирование объекта)
            if (!(OTUName in obj)) obj[OTUName] = {}
            Object.keys(NTDObject[key][point]).forEach(function (typeDetail) {
              if (!(typeDetail in obj[OTUName])) obj[OTUName][typeDetail] = []
              const arrNTDOnTypeDetail = NTDObject[key][point][typeDetail]
              arrNTDOnTypeDetail.forEach((ntd) => {
                obj[OTUName][typeDetail].push(ntd)
              })
            })
          }
        })
      })
      // console.log(obj)
      return obj
    },

    // формирование объекта на сварку для копирования в карты
    NTDWeldingObjToMap () {
      const obj = {}
      const NTDObject = this.foundNTDWeldingObj
      Object.keys(NTDObject).forEach(function (key) {
        Object.keys(NTDObject[key]).forEach(function (point) {
          Object.keys(NTDObject[key][point]).forEach(function (typeDetail) {
            const arrNTDOnTypeDetail = NTDObject[key][point][typeDetail]
            if (!(typeDetail in obj)) obj[typeDetail] = []

            arrNTDOnTypeDetail.forEach((ntd) => {
              if (!obj[typeDetail].includes(ntd)) obj[typeDetail].push(ntd)
            })
          })
        })
      })
      return obj
    },

    NTDControlSting () {
      let arr = []
      const vm = this.foundNTDMethodControlToCopy
      vm.forEach(function (ntd) {
        if (!arr.includes(ntd.name)) arr.push(ntd.name)
      })
      //
      arr = arr.sort(
        (a, b) => {
          if (a < b) return -1
          if (a > b) return 1
          return 0
        })
      return arr.join(', ')
    },

    weldingMethodList () {
      return this.METHODS_WELDING_LIST.filter((el) => el.enabled === true)
    }
  },
  methods: {
    ...mapActions(['getNtdList']),

    reset () {
      this.foundNTDWeldingObj = {}
      this.foundNTDMethodControlObj = {}
      this.foundNTDMethodControlToCopy = []
    },

    pickUpDocs () {
      const foundNTDWelding = {}
      const foundNTDControl = {}
      this.reset()

      const selectedOtu = this.stringToObject(this.otuString)

      for (const indexOtu in this.NTD_LIST) {
        const NTDOtu = this.stringToObject(this.NTD_LIST[indexOtu].otu)
        const found = this.objectComparison(selectedOtu, NTDOtu)
        const gazpromEnabled = this.gazpromEnabled(selectedOtu, NTDOtu)
        // console.log(gazpromEnabled)

        if (found) {
          found.forEach(indexOTU => { // key - НГДО, point - (4)
            // проверка наличия ключа
            if (!(indexOTU.key in foundNTDWelding)) {
              foundNTDWelding[indexOTU.key] = {}
              foundNTDControl[indexOTU.key] = {}
            }
            // проверка наличия ключа
            if (!(indexOTU.point in foundNTDWelding[indexOTU.key])) {
              foundNTDWelding[indexOTU.key][indexOTU.point] = []
              foundNTDControl[indexOTU.key][indexOTU.point] = []
            }

            // поиск по способу сварки
            const methodWeldingComparison = this.methodWeldingComparison(this.selectedWeldingMethod, this.NTD_LIST[indexOtu].welding_method)

            if (methodWeldingComparison && gazpromEnabled) {
              // поиск по виду деталей
              const detailsTypeComparison = this.detailsTypeComparison(this.selectedDetailsType, this.NTD_LIST[indexOtu].details_type)
              const fNTD = foundNTDWelding[indexOTU.key][indexOTU.point]

              const fNTDControl = foundNTDControl[indexOTU.key][indexOTU.point]

              if (detailsTypeComparison) {
                detailsTypeComparison.forEach((detailType) => { // detailType  - Т, Л, С
                  // проверка наличия ключа
                  if (!(detailType in fNTD)) {
                    fNTD[detailType] = []
                    fNTDControl[detailType] = {}
                  }

                  const weldingEnabled = this.weldingEnabled(this.NTD_LIST[indexOtu])
                  // console.log('weldingEnabled - ', weldingEnabled)
                  // добавляем документ в объект по наличию сварки
                  if (weldingEnabled) fNTD[detailType].push(this.NTD_LIST[indexOtu])

                  const methodControlComparison = this.methodControlComparison(this.selectedMethodControl, this.NTD_LIST[indexOtu].control_method)
                  // перебор по методам контроля
                  methodControlComparison.forEach((methodControl) => {
                    // проверка наличия ключа
                    if (!(methodControl in fNTDControl[detailType])) fNTDControl[detailType][methodControl] = []
                    // добавляем документ в объект
                    fNTDControl[detailType][methodControl].push(this.NTD_LIST[indexOtu])
                    this.addNTDControlToArr(this.NTD_LIST[indexOtu])
                  })
                })
              }
            }
          })
        }
      }

      this.foundNTDWeldingObj = foundNTDWelding
      this.foundNTDMethodControlObj = foundNTDControl
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
        // console.log(otuString)
        selectedOtu.stoGazprom[0] = true
      } else selectedOtu.stoGazprom[0] = false

      return selectedOtu
    },

    // сравнения объектов ОТУ
    objectComparison (selectedOtu, NTDOtu) {
      // console.log(object1, object2)
      const foundInOTU = []
      const objKeys2 = Object.keys(NTDOtu) // из списка
      for (const key of objKeys2) {
        if (key === 'stoGazprom') continue
        const value1 = selectedOtu[key]
        const value2 = NTDOtu[key]
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
      const result = []
      const strDetailsType = detailsTypeString.replace(/\s/g, '')
      const arr = strDetailsType.split(',')
      detailsTypeArr.forEach((el) => {
        if (arr.includes(el)) result.push(el)
      })
      if (result.length !== 0) return result
      return false
    },

    // Сравнение по методы контроля
    methodControlComparison (selectedMethodControl, NTDMethodControlObj) {
      const result = []
      selectedMethodControl.forEach((method) => {
        NTDMethodControlObj.forEach((methodNTD) => {
          if (method.includes(methodNTD.name)) result.push(method)
        })
      })
      return result
    },

    // Сравнение по выбору с учётом СТО "Газпром"
    gazpromEnabled (object1, object2) {
      // console.log(object2.stoGazprom, object2.stoGazprom)
      if (object1.stoGazprom[0] === object2.stoGazprom[0]) return true
      return false
    },

    // Проверка наличия описания сварки в документе
    weldingEnabled (ntd) {
      if (ntd.weld_enabled) return true
      return false
    },

    // Формирование массива документов по контролю для копирования
    addNTDControlToArr (ntd) {
      if (!this.foundNTDMethodControlToCopy.includes(ntd)) this.foundNTDMethodControlToCopy.push(ntd)
    }

  },

  watch: {
    otuString: function () {
      this.pickUpDocs()
    },
    selectedDetailsType: function () {
      this.pickUpDocs()
    },
    selectedWeldingMethod: function () {
      this.pickUpDocs()
    },
    selectedMethodControl: function () {
      this.pickUpDocs()
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

.selector-welding-method {
  padding-top: 5px !important;
}

.table-fount-NTD {
  border-collapse: collapse;
    border: 1px solid grey;
    width: 100%;
}

.table-fount-NTD >tbody>tr>td  {
    border: 1px solid grey;
}

.table-fount-NTD-sub  > tbody > tr > td:nth-child(1){
    width: 45px;
    border: 1px solid grey;
    border-left: none;
    border-top: none;
    border-bottom: none;
 }

.table-fount-NTD-row > tbody > tr:not(:first-child) > td {
    border: 1px solid grey;
    border-left: none;
    border-bottom: none;
 }

.accordion-style {
  background: #FFF7F7 !important;
}

</style>
