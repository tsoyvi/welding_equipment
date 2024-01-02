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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>

  </tbody>
</table>

<!-- Шифр СО Марка  Заводские номер  Вид (способ) сварки Группы ТУ  Кол-во в партии, ед. -->

  <div class="col-md-1">
    <label for="validationServer04" class="form-label">Шифр СО</label>
    <select class="form-select form-select-sm" id="" v-model="order.code_so" required>
      <option v-for="(code, index) in codeSO" :key="index">{{code}}</option>
    </select>
    <div id="" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
  </div>

   <div class="col-md-1">
    <label for="validationServer04" class="form-label">Вид аттестации:</label>
    <select class="form-select form-select-sm" id="" v-model="order.type_att" required>
      <option>Первичная</option>
      <option>Периодическая</option>
      <option>Дополнительная</option>
    </select>
    <div id="" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
 </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Марка</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.model" required>
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Заводской номер</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.number" required>
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Инв. номер:</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.number" required>
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Дата выпуска</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.date_production" required>
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Дата ввода в эксплуатацию</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.date_start_exp" required>
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Свидетельство об аттестации</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.cert_attestation">
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

 <div class="col-md-1">
    <label for="validationServer04" class="form-label">способ сварки</label>
    <select class="form-select form-select-sm" id="" v-model="order.welding_method" required>
      <option v-for="(welding_method, index) in METHODS_WELDING_LIST" :key="index"
       :title="welding_method.description"
        >{{welding_method.name}}</option>
    </select>
    <div id="" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
 </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Группы ТУ</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.otu">
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Производитель</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.otu">
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

 <div class="col-md-1">
    <label for="validationServer01" class="form-label">ФИО ответственного лица:</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.otu">
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-1">
    <label for="validationServer01" class="form-label">Сертификат соответствия РФ:</label>
    <input type="text" class="form-control form-control-sm" id="" v-model="order.otu">
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
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
{{ order }}
</template>

<script>

import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'formOrganization',
  data () {
    return {
      order: {
        code_so: 'A3'
      },

      codeSO: ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10', 'A11', 'A12',
        'A13', 'A14', 'A15', 'A16', 'A17', 'A18', 'A19', 'A20', 'A21', 'B1', 'B2',
        'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'D1', 'D2', 'D3', 'D4',
        'F1', 'F2', 'F3']
    }
  },

  computed: {
    ...mapGetters(['METHODS_WELDING_LIST'])
  },

  methods: {
    ...mapActions([''])

  }

}
</script>

<style>

</style>
