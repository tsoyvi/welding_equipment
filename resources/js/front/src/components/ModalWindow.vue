<template>
  <!-- Кнопка-триггер модального окна
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Запустите демо модального окна
      </button>
-->
      <!-- Модальное окно -->
      <div class="modal fade" id="modalWindow" tabindex="-1" aria-labelledby="ModalWindowLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">{{header}}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">

              <slot></slot>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
              <button type="button" class="btn btn-primary">Сохранить изменения</button>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
export default {
  name: 'ModalWindow',
  props: ['header']

}
</script>

<style>

</style>
