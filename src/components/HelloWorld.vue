<template>
  <FormOrganization />

  <div class="hello">
    <h1>{{ msg }}</h1>
    <p>
      For a guide and recipes on how to configure / customize this project,<br>
      check out the
      <a href="https://cli.vuejs.org" target="_blank" rel="noopener">vue-cli documentation</a>.
    </p>

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Кнопка выпадающего списка
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Действие</a></li>
        <li><a class="dropdown-item" href="#">Другое действие</a></li>
        <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
      </ul>
    </div>

    <!-- Кнопка-триггер модального окна -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Запустите демо модального окна
      </button>

      <!-- Модальное окно -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Заголовок модального окна</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
              <button type="button" class="btn btn-primary">Сохранить изменения</button>
            </div>
          </div>
        </div>
      </div>

  </div>
          <table class="table table-bordered table-hover table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th colspan="2">Заказчик</th>
                <th colspan="5">CO</th>
                <th rowspan="2">Группа ТУ</th>
                <th rowspan="2">Способ сварки</th>
                <th colspan="2">Комиссия</th>
                <th colspan="2">Заявка</th>
              </tr>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Заявитель</th>
                <th scope="col">Организация</th>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Кол-во, шт.</th>
                <th scope="col">Шифр</th>
                <th scope="col">Аттестац.</th>
                <th scope="col">Приказ</th>
                <th scope="col">состав</th>
                <th scope="col">Дата поступления</th>
                <th scope="col">Регистрация</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>
                  ООО "СтройИндустрия"
                  <div class="text-black-50 mt-n1"><small>РФ</small></div>
                  <div class="text-black-50 mt-n1 mb-n1"><small>5611071117</small></div>
                </td>
                <td>ООО «РН-БГПП»</td>
                <td>1</td>
                <td>PICO 162</td>
                <td>2</td>
                <td>А3</td>
                <td>первичная</td>
                <td>РД</td>
                <td>НГДО, ОХНВП, СК</td>
                <td>№ 38/СО от 01.08.2023</td>
                <td>
                  <div><small>Ракк В.А.</small></div>
                  <div><small>Ракк Н.В.</small></div>
                  <div><small>Цой В.И.</small></div>
                </td>
                <td>27.07.2023</td>
                <td>№ АЦСО-123-374 от 01.08.2023</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>
                  ООО «РН-Бузулукское газоперерабатывающее предприятие»
                  <div class="text-black-50 mt-n1"><small>РФ</small></div>
                  <div class="text-black-50 mt-n1 mb-n1"><small>5611071117</small></div>
                </td>
                <td>ООО «РН-БГПП»</td>
                <td>1</td>
                <td>PICO 162</td>
                <td>1</td>
                <td>А3</td>
                <td>первичная</td>
                <td>РД</td>
                <td>НГДО, ОХНВП, СК</td>
                <td>№ 38/СО от 01.08.2023</td>
                <td>
                  <div><small>Ракк В.А.</small></div>
                  <div><small>Ракк Н.В.</small></div>
                  <div><small>Цой В.И.</small></div>
                </td>
                <td>27.07.2023</td>
                <td>№ АЦСО-123-374 от 01.08.2023</td>
              </tr>

            </tbody>
          </table>

</template>

<script>

import FormOrganization from '@/components/FormOrganization.vue'

export default {
  name: 'HelloWorld',
  components: {
    FormOrganization
  },
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.mt-n1 {
  margin-top: -0.25rem !important;
}
.mb-n1 {
  margin-bottom: -0.25rem !important;
}
</style>
