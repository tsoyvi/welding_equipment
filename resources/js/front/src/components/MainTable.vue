<template>
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
                <td scope="row">
                    1
                    <PopupMenu
                      :openWindow  = 'openWindow'
                    />
                </td>
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
              <tr>
                <td scope="row">
                    2
                    <PopupMenu />
                </td>
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

    <ModalWindow
      ref="ModalWindow"
    >
      <component :is="currentContentWindow"></component>
    </ModalWindow>

</template>

<script>
import { markRaw } from 'vue'

import PopupMenu from '../components/PopupMenu.vue'
import ModalWindow from '../components/ModalWindow.vue'
import FormOrganization from '../components/blocks/FormOrganization.vue'

export default {
  name: 'MainTable',
  components: {
    PopupMenu,
    ModalWindow
    // FormOrganization

  },

  data: () => ({
    currentContentWindow: null,
    FormOrganization: markRaw(FormOrganization)
  }),

  methods: {
    selectedItemPopupMenu  () {
      console.log('test')
    },

    openWindow () {
      // console.log(selectedPopupItem);
      // this.currentContentWindow = selectedPopupItem.module
      this.currentContentWindow = FormOrganization
    }
  }
}
</script>

<style>

</style>
