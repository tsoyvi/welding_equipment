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
                      <SelectOtu />

                    </div>

                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-select form-select-sm" id="floatingSelect">
                            <option value="1">РД</option>
                            <option value="2">МП</option>
                            <option value="3">РАД</option>
                        </select>
                        <label for="floatingSelect">Способ сварки</label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Т" id="T">
                        <label class="form-check-label" for="T">
                            Труба
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Л" id="L">
                        <label class="form-check-label" for="L">
                            Лист
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="С" id="C">
                        <label class="form-check-label" for="C">
                            Стержень
                        </label>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col" v-for="(method, index) in methodsControl.NK" :key="index">
                            <div
                                class="form-check"
                            >
                                <input class="form-check-input" type="checkbox" :value="method.name" :title="method.title" :id="method.name">
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
                                <input class="form-check-input" type="checkbox" :value="method.name" :title="method.title" :id="method.name">
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
        <td scope="col">КО(1): РД 153-34.1-003.01; РД 2730.940.102-92; СТО ЦКТИ 10.002-2007</td>
      </tr>
      <tr>
        <td scope="col">Для копирования:</td>
      </tr>
      <tr>
        <td scope="col">РД 153-34.1-003.01; РД 2730.940.102-92; СТО ЦКТИ 10.002-2007.</td>
      </tr>
      <tr>
        <td scope="col">Нормативные документы на контроль:</td>
      </tr>
      <tr>
        <td scope="col">Общие: ГОСТ 16037-80. КО(1): РД 153-34.1-003.01; РД 2730.940.103-92</td>
      </tr>
      <tr>
        <td scope="col">Для копирования:</td>
      </tr>
      <tr>
        <td scope="col">РД 153-34.1-003.01; РД 2730.940.102-92; СТО ЦКТИ 10.002-2007.</td>
      </tr>
      </tbody>
    </table>

    V3

</div>
</template>

<script>

import SelectOtu from '@/components/blocks/SelectOtu.vue'

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
            name: 'УК',
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
      }
    }
  }
}

</script>

<style>
body {
  background-color: #FFF7F7;
}

</style>
