<template>
  <div class="home">
    <MainTable />

  </div>
</template>

<script>
// @ is an alias to /src

import MainTable from '../components/MainTable.vue'

export default {
  name: 'HomeView',
  components: {
    MainTable
  }
}
</script>
