<template>
<h1 class="modal-title fs-5 text-center">Организация</h1>
<hr>
  <form class="row g-3" @submit.prevent="update">

  <div class="col-md-3">
    <label for="validationServer01" class="form-label">Заявитель:</label>
    <input type="text" class="form-control" id="" v-model="RECORD_SELECTED.applicant">
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-3">
    <label for="validationServer01" class="form-label">Наименование организации:</label>
    <input type="text" class="form-control" id="" v-model="RECORD_SELECTED.name_organization" required>
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-3">
    <label for="validationServer02" class="form-label">Юридический адрес:</label>
    <input type="text" class="form-control" id="" v-model="RECORD_SELECTED.address" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer02" class="form-label">ИНН:</label>
    <input type="text" class="form-control" id="" v-model="RECORD_SELECTED.inn" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer02" class="form-label">Ф.И.О. контактного лица</label>
    <input type="text" class="form-control" id="" v-model="RECORD_SELECTED.name_contact" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

    <div class="col-md-3">
    <label for="validationServerUsername" class="form-label">Телефон:</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="" v-model="RECORD_SELECTED.phone">
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
        Пожалуйста, выберите имя пользователя.
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <label for="validationServerUsername" class="form-label">Электронная почта:</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend3">@</span>
      <input type="text" class="form-control" id="" v-model="RECORD_SELECTED.email" required>
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
        Пожалуйста, выберите имя пользователя.
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer03" class="form-label">Сайт (при наличии):</label>
    <input type="text" class="form-control" id="" v-model="RECORD_SELECTED.website">
  </div>

  <div class="col-md-2">
    <label for="validationServer04" class="form-label">Статус организации:</label>
    <select class="form-select" id="" v-model="RECORD_SELECTED.organization_status" required>
      <option>Потребитель</option>
      <option>Производитель</option>
      <option>Представитель производителя</option>
    </select>
    <div id="" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
  </div>

<!--
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback">
      <label class="form-check-label" for="invalidCheck3">
        Дополнительные требования к аттестации, ПАО "Транснефть"
      </label>
    </div>
  </div>
-->

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback">
      <label class="form-check-label" for="invalidCheck3">
        Дополнительные требования к аттестации, ПАО "Газпром"
      </label>
    </div>
  </div>

  <div class="col-12" v-if="RECORD_SELECTED.id">
    <button class="btn btn-primary" type="submit">
      <span  v-if = "loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      Обновить запись</button>
  </div>
    <div class="col-12" v-if="!RECORD_SELECTED.id">
    <button class="btn btn-primary" type="submit">
      <span  v-if = "loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      Добавить запись</button>
  </div>

</form>

</template>

<script>

import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'formOrganization',
  data () {
    return {
      loading: false
    }
  },

  computed: {
    ...mapGetters(['RECORD_SELECTED'])
  },

  methods: {

    ...mapActions(['ADD_RECORD_REQUEST', 'UPDATE_RECORD_REQUEST']),

    async update () {
      this.loading = true
      let result = null

      if (this.RECORD_SELECTED.id) {
        result = await this.UPDATE_RECORD_REQUEST(this.RECORD_SELECTED)
      } else {
        result = await this.ADD_RECORD_REQUEST(this.RECORD_SELECTED)
      }
      if (result) {
        console.log('ok')
      }
      this.loading = false
    }

  }

}
</script>

<style>

</style>
