<template>
  <MainMenu />
  <router-view/>
</template>

<script>
// @ is an alias to /src
import MainMenu from '@/components/MainMenu.vue'

export default {
  components: {
    MainMenu
  }
}
</script>

<style>
</style>
