<template>
  <form class="row g-3" @submit.prevent="update">

  <div class="col-md-3">
    <label for="validationServer01" class="form-label">Наименование организации:</label>
    <input type="text" class="form-control" id="" v-model="organization.name_organization" required>
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-3">
    <label for="validationServer02" class="form-label">Юридический адрес:</label>
    <input type="text" class="form-control" id="" v-model="organization.address" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer02" class="form-label">ИНН:</label>
    <input type="text" class="form-control" id="" v-model="organization.inn" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer02" class="form-label">Ф.И.О. контактного лица</label>
    <input type="text" class="form-control" id="" v-model="organization.name_contact" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

    <div class="col-md-3">
    <label for="validationServerUsername" class="form-label">Телефон:</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="" v-model="organization.phone">
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
        Пожалуйста, выберите имя пользователя.
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <label for="validationServerUsername" class="form-label">Электронная почта:</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend3">@</span>
      <input type="text" class="form-control" id="" v-model="organization.email" required>
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
        Пожалуйста, выберите имя пользователя.
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer03" class="form-label">Сайт (при наличии):</label>
    <input type="text" class="form-control" id="" v-model="organization.website">
  </div>

  <div class="col-md-2">
    <label for="validationServer04" class="form-label">Статус организации:</label>
    <select class="form-select" id="" v-model="organization.organization_status" required>
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
      organization: {
        name_organization: '5565',
        address: 'address',
        inn: 'inn',
        name_contact: 'name_contact',
        phone: 'phone',
        email: 'email',
        website: 'website',
        organization_status: 'Потребитель'
      }
    }
  },

  computed: {
    ...mapGetters([])
  },

  methods: {

    ...mapActions(['ADD_RECORD_REQUEST']),

    async update () {
      const formData = new FormData()
      formData.append('_method', 'POST')

      const keys = Object.keys(this.organization)
      // const vm = this.$refs.file.files[0]
      keys.forEach((key) => {
        formData.append(key, this.organization[key])
      })

      // this.loading = true
      const result = await this.ADD_RECORD_REQUEST(formData)
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
