<template>
<div class="container">
  <h5 class="text-center">Подбор нормативных документов</h5>
    <table class="table table-bordered border-primary table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ОТУ</th>
                <th scope="col">Способ сварки</th>
                <th scope="col">Вид свариваемых деталей</th>
                <th scope="col">Методы контроля</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">ОТУ</label>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-select form-select-sm" id="floatingSelect">
                            <option value="1">РД</option>
                            <option value="2">МП</option>
                            <option value="3">РАД</option>
                        </select>
                        <label for="floatingSelect">Способ сварки</label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Т" id="T">
                        <label class="form-check-label" for="T">
                            Труба
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Л" id="L">
                        <label class="form-check-label" for="L">
                            Лист
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="С" id="C">
                        <label class="form-check-label" for="C">
                            Стержень
                        </label>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col" v-for="(method, index) in methodsControl.NK" :key="index">
                            <div
                                class="form-check"
                            >
                                <input class="form-check-input" type="checkbox" :value="method.name" :id="method.name">
                                <label class="form-check-label" :for="method.name">
                                    {{method.name}}
                                </label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>

    </table>
</div>
</template>

<script>
export default {
  name: 'PickUpDocs',

  data () {
    return {
      methodsControl: {
        NK: [
          {
            id: 0,
            name: 'ВИК'
          },
          {
            id: 1,
            name: 'РК'
          },
          {
            id: 2,
            name: 'УК'
          },
          {
            id: 3,
            name: 'ПВК'
          },
          {
            id: 4,
            name: 'МК'
          }
        ],
        RK: [
          {
            id: 0,
            name: 'Растяжение'
          },
          {
            id: 1,
            name: 'Изгиб'
          },
          {
            id: 2,
            name: 'Сплющивание'
          },
          {
            id: 3,
            name: 'Сдвиг'
          }
        ]
      }
    }
  }
}

</script>

<style>
</style>
