<template>
  <!-- Пример отдельной кнопки class="text-info bg-dark" -->
<div class="btn-group dropend">
  <button type="button" class="btn btn-sm text-primary fs-6 text" data-bs-toggle="dropdown">
    <font-awesome-icon icon="bars" />
  </button>
  <ul class="dropdown-menu">
    <li v-for="(item, index) in POPUP_MENU_ITEMS" :key="index">
      <div v-if="item.title != '-'"
        class="dropdown-item button_test"
        data-bs-toggle="modal"
        data-bs-target="#modalWindow"
        @click="openWindow(id)"
        >{{item.title}}
      </div>
      <div v-else><li><hr class="dropdown-divider"></li></div>
    </li>

  </ul>
</div>
</template>

<script>
// import PopupMenu from '@/components/PopupMenu.vue'
import { mapGetters } from 'vuex'

export default {
  props: ['openWindow', 'id'],
  data: function () {
    return {
    }
  },

  computed: {
    ...mapGetters(['POPUP_MENU_ITEMS'])
  },
  methods: {
    /* test () {
      this.selectedItemPopupMenu('test')
    } */
  }

}
</script>

<style>
.button_test {
    width: 100%;
    cursor: pointer;
}
</style>
