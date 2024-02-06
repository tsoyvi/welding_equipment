<template>
  <form class="row g-3" @submit.prevent="update">
<hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Шифр СО</th>
      <th scope="col">Марка</th>
      <th scope="col">Заводские номера</th>
      <th scope="col">Вид (способ) сварки</th>
      <th scope="col">Группы ТУ</th>
      <th scope="col">Кол-во в партии, ед.</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(item_order, index_order) in order" :key="index_order"
     :class = "(index_order === selected_index)?'table-info':'else_class'">
      <td>
        <button type="button"
          class="btn btn-link btn-sm"
          @click="selectIndex(index_order)">{{index_order + 1}}
        </button>
      </td>
      <td>{{item_order.code_so}}</td>
      <td>{{item_order.model}}</td>
      <td>{{factory_numbers(item_order.so)}}</td>
      <td>{{item_order.welding_method}}</td>
      <td>{{item_order.otu}}</td>
      <td>{{item_order.so.length}}</td>

    </tr>

  </tbody>
</table>
<hr>
<!-- Шифр СО Марка  Заводские номер  Вид (способ) сварки Группы ТУ  Кол-во в партии, ед. -->

<div class="row" v-if="selected_index!==null">
  <div class="col-md-1">
    <label for="validationServer04" class="form-label">Шифр СО</label>
    <select class="form-select form-select-sm" id="" v-model="order[selected_index].code_so" required>
      <option v-for="(code, index) in codeSO" :key="index">{{code}}</option>
    </select>
    <div id="" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
  </div>

   <div class="col-md-1">
    <label for="validationServer04" class="form-label">способ сварки</label>
    <select class="form-select form-select-sm" id="" v-model="order[selected_index].welding_method" required>
      <option v-for="(welding_method, index) in METHODS_WELDING_LIST" :key="index"
       :title="welding_method.description"
        >{{welding_method.name}}</option>
    </select>
    <div id="" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
 </div>

   <div class="col-md-2">
    <label for="validationServer01" class="form-label">Группы ТУ</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order[selected_index].otu">
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

   <div class="col-md-1">
    <label for="validationServer04" class="form-label">Вид аттестации:</label>
    <select class="form-select form-select-sm" id="" v-model="order[selected_index].type_att" required>
      <option>Первичная</option>
      <option>Периодическая</option>
      <option>Дополнительная</option>
    </select>
    <div id="" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
 </div>

  <div class="col-md-2">
    <label for="validationServer01" class="form-label">Производитель</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order[selected_index].manufacturer">

  </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Марка</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order[selected_index].model" required>
  </div>

 <div class="col-md-2">
    <label for="validationServer01" class="form-label">ФИО ответственного лица:</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order[selected_index].responsible">
  </div>

  <div class="col-md-2">
    <label for="validationServer01" class="form-label">Сертификат соответствия РФ:</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order[selected_index].cert">
  </div>
</div>

<div v-if="selected_index!==null">
 <table class="table table-bordered">
  <thead>
    <tr>
      <td>№ п.п</td>
      <td>Заводской номер</td>
      <td>Инв. номер:</td>
      <td>Дата выпуска</td>
      <td>Дата ввода в эксп.</td>
      <td scope="col">Свидетельство об аттестации</td>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(so, index) in order[selected_index].so" :key="index">
      <td>{{index + 1}}</td>
      <td><input type="text" class="form-control form-control-sm" id="" v-model="so.factory_number" required></td>
      <td><input type="text" class="form-control form-control-sm" id="" v-model="so.inventory_number" required></td>
      <td><input type="text" class="form-control form-control-sm" id="" v-model="so.release_date" required></td>
      <td><input type="text" class="form-control form-control-sm" id="" v-model="so.commissioning_date" required></td>
      <td><input type="text" class="form-control form-control-sm" id="" v-model="so.cert_attestation"></td>
    </tr>

  </tbody>
</table>
</div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback">
      <label class="form-check-label" for="invalidCheck3">
        Дополнительные требования к аттестации, ПАО "Газпром"
      </label>
    </div>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Отправить форму</button>
  </div>
</form>
</template>

<script>

import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'formOrganization',
  data () {
    return {
      order: [{
        index: 0,
        code_so: 'A3',
        welding_method: 'РД',
        otu: 'КО, НГДО, ГДО, ОХНВП, СК',
        type_att: 'Первичная',
        manufacturer: 'EWM AG, Германия',
        model: 'Pico 180 puls',
        responsible: 'Цой Вячеслав Игоревич',
        cert: 'Отсутствует',
        so: [
          {
            factory_number: '135131F135s',
            inventory_number: '0001',
            release_date: '12.12.2023',
            commissioning_date: '10.04.2024',
            cert_attestation: 'АЦСО-123-00855/12'
          },
          {
            factory_number: '11135s',
            inventory_number: '0002',
            release_date: '12.12.2023',
            commissioning_date: '10.04.2024',
            cert_attestation: 'АЦСО-123-00855/15'
          },
          {
            factory_number: '225135s',
            inventory_number: '0003',
            release_date: '12.12.2023',
            commissioning_date: '10.04.2024',
            cert_attestation: 'АЦСО-123-00855/19'
          }

        ]

      },
      {
        index: 1,
        code_so: 'A3',
        welding_method: 'РД',
        otu: 'КО, НГДО',
        type_att: 'Первичная',
        manufacturer: 'EWM AG, Германия',
        model: 'Pico 162',
        responsible: 'Цой Вячеслав Игоревич',
        cert: 'Отсутствует',
        so: [
          {
            factory_number: '00001162',
            inventory_number: '0004',
            release_date: '12.12.2023',
            commissioning_date: '10.04.2024',
            cert_attestation: 'АЦСО-123-00855/12'
          },
          {
            factory_number: '000056526',
            inventory_number: '0006',
            release_date: '12.12.2023',
            commissioning_date: '10.04.2024',
            cert_attestation: 'АЦСО-123-00855/15'
          }
        ]
      }

      ],

      codeSO: ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10', 'A11', 'A12',
        'A13', 'A14', 'A15', 'A16', 'A17', 'A18', 'A19', 'A20', 'A21', 'B1', 'B2',
        'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'D1', 'D2', 'D3', 'D4',
        'F1', 'F2', 'F3'],

      selected_index: null
    }
  },

  computed: {
    ...mapGetters(['METHODS_WELDING_LIST', 'RECORD_SELECTED'])
  },

  methods: {
    ...mapActions(['ADD_EQUIPMENT_REQUEST']),

    factory_numbers (so) {
      let strNumbers = ''
      so.forEach(element => {
        if (strNumbers !== '') strNumbers += ', '
        strNumbers += element.factory_number
      })
      return strNumbers
    },

    selectIndex (index) {
      this.selected_index = index
    },

    async update () {
      const data = { order_id: this.RECORD_SELECTED.id, data: this.order }
      const result = await this.ADD_EQUIPMENT_REQUEST(data)
      if (result) {
        // this.GET_USER_PROFILE()
        console.log('ok')
      }
      this.loading = false
    }

  }

}
</script>

<style>

</style>
