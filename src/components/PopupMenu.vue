<template>
  <!-- Пример отдельной кнопки class="text-info bg-dark" -->
<div class="btn-group dropend">
  <button type="button" class="btn btn-sm text-primary fs-6 text" data-bs-toggle="dropdown">
    <font-awesome-icon icon="bars" />
  </button>
  <ul class="dropdown-menu">
    <li>
      <div class="dropdown-item button_test"
        data-bs-toggle="modal"
        data-bs-target="#modalWindow"
        @click="selectedItemPopupMenu()"
        >Организация
      </div>
    </li>
    <li>
        <div class="dropdown-item button_test"
            data-bs-toggle="modal"
            data-bs-target="#modalWindow"
            @click="test()"
        >Перечень СО
        </div>
    </li>
    <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Отделенная ссылка</a></li>
  </ul>
</div>
</template>

<script>
// import PopupMenu from '@/components/PopupMenu.vue'

export default {
  props: ['selectedItemPopupMenu'],
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
