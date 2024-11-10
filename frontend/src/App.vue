<script>
import { RouterView } from 'vue-router'
import Navbar from './components/ui/Navbar.vue'
import FooterUI from './components/ui/FooterUi.vue'

export default {
  components: {
    RouterView,
    Navbar,
    FooterUI
  },
  methods: {
    isAuthPage() {
      return this.$route.path.startsWith('/auth')
    }
  },
}
</script>

<template>
  <header v-if="!isAuthPage()">
    <Navbar/>
  </header>

  <RouterView/>
  <FooterUI/>
</template>

<style scoped>

</style>
