<template>
<button
  type="button" class="btn btn-light"
  data-bs-toggle="modal"
  data-bs-target="#modalWindow"
  @click="addRecord()">Добавить запись
</button>

 <table class="table table-bordered table-hover table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Заказчик</th>
                <th colspan="5">CO</th>
                <th rowspan="2">Группа ТУ</th>
                <th rowspan="2">Способ сварки</th>
                <th colspan="2">Комиссия</th>
                <th colspan="2">Заявка</th>
              </tr>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Заявитель</th>

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
              <tr v-for="(record, index) in RECORD_LIST" :key="index">
                <td scope="row">
                    {{index + 1}}
                    <PopupMenu
                      :openWindow = 'openWindow'
                      :id = "record.id"
                    />
                </td>
                <td>
                  <div>{{record.name_organization}}</div>
                  <div v-if="record.applicant">{{record.applicant}}</div>
                  <div class="text-black-50 mt-n1"><small>РФ</small></div>
                  <div class="text-black-50 mt-n1 mb-n1"><small>{{record.inn}}</small></div>
                </td>
                <td>1</td>
                <td>PICO 162</td>
                <td>2</td>
                <td>А3</td>
                <td>первичная</td>
                <td>НГДО, ОХНВП, СК</td>
                <td>РД</td>
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

    <ModalWindow ref="ModalWindow"
      :header= "modalWindowHeader"
    >
      <component :is="currentContentWindow"></component>
    </ModalWindow>
{{RECORD_LIST}}
</template>

<script>
import { markRaw } from 'vue'
import { mapGetters, mapActions, mapMutations } from 'vuex'

import PopupMenu from '../components/PopupMenu.vue'
import ModalWindow from '../components/ModalWindow.vue'
import AppOrder from '../components/blocks/AppOrder.vue'

export default {
  name: 'MainTable',
  components: {
    PopupMenu,
    ModalWindow
    // FormOrganization

  },

  data: () => ({
    currentContentWindow: null,
    AppOrder: markRaw(AppOrder),
    modalWindowHeader: null
  }),

  computed: {
    ...mapGetters(['RECORD_LIST'])
  },

  methods: {
    ...mapMutations(['SET_RECORD_SELECTED']),
    ...mapActions(['RECORDS_REQUEST']),

    selectedItemPopupMenu  () {
      console.log('test')
    },

    openWindow (id) {
      this.modalWindowHeader = 'Начальные данные заявки'
      this.SET_RECORD_SELECTED(id)
      this.currentContentWindow = AppOrder
    },

    addRecord () {
      this.openWindow(null)
    }
  },

  mounted () {
    this.RECORDS_REQUEST()
  }

}
</script>

<style>

</style>
