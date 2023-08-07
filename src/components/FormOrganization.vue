<template>
  <form class="row g-3">

  <div class="col-md-3">
    <label for="validationServer01" class="form-label">Наименование организации:</label>
    <input type="text" class="form-control is-valid" id="validationServer01" value="организация" required>
    <!--<div class="valid-feedback">
      Все хорошо!
    </div> -->
  </div>

  <div class="col-md-3">
    <label for="validationServer02" class="form-label">Юридический адрес:</label>
    <input type="text" class="form-control is-valid" id="validationServer02" value="Юридический адрес:" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer02" class="form-label">ИНН:</label>
    <input type="text" class="form-control is-valid" id="validationServer02" value="ИНН" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer02" class="form-label">Ф.И.О. контактного лица</label>
    <input type="text" class="form-control is-valid" id="validationServer02" value="Ф.И.О. контактного лица" required>
    <div class="valid-feedback">
      <!--Все хорошо!-->
    </div>
  </div>

  <div class="col-md-3">
    <label for="validationServerUsername" class="form-label">Электронная почта:</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend3">@</span>
      <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
        Пожалуйста, выберите имя пользователя.
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer03" class="form-label">Сайт (при наличии):</label>
    <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
<!--
    <div id="validationServer03Feedback" class="invalid-feedback">
      Укажите действующий город.
    </div>
-->
  </div>

  <div class="col-md-2">
    <label for="validationServer04" class="form-label">*Статус организации:</label>
    <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
      <option selected disabled value="">Выберите...</option>
      <option>...</option>
      <option>...</option>
    </select>
    <div id="validationServer04Feedback" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
  </div>

  <div class="col-md-2">
    <label for="validationServer04" class="form-label">*Регион:</label>
    <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
      <option selected disabled value="">Выберите...</option>
      <option>...</option>
      <option>...</option>
    </select>
    <div id="validationServer04Feedback" class="invalid-feedback">
      Пожалуйста, выберите.
    </div>
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
      <label class="form-check-label" for="invalidCheck3">
        Дополнительные требования к аттестации, ПАО "Транснефть"
      </label>
    </div>
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
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

export default {

}
</script>

<style>

</style>
