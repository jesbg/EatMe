<script>
import { RouterLink } from 'vue-router'
import { store } from '../../store'
import ChangeNameModal from './ChangeNameModal.vue'

export default {
  name: 'app-navbar',
  data() {
    return {
      store
    }
  },
  
  components: {
    RouterLink,
    ChangeNameModal,
  },
  mounted() {
    store.effect()
  }
}
</script>

<template>
  <nav class="navbar navbar-expand-md border-b">
    <div class="container">
      <RouterLink to="/" class="navbar-brand">Eat Me</RouterLink>
      <div class="row align-items-center me-1 d-md-none">
        <p class="d-block col mb-0 text-black-50">Hello, {{ store.name }}!</p>
        <button class="navbar-toggler col-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <RouterLink class="nav-link" to="/">Home</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" to="/mybooking">My Booking</RouterLink>
          </li>
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="modal" data-bs-target="#changeNameModal">Change name</button>
          </li>
        </ul>      
        <span class="navbar-text" >
          <p class="d-md-inline d-none me-2">{{ store.name }}</p>
          <button v-if="store.isLogged" class="btn btn-sm btn-primary" @click="() => store.logout()">Logout</button>
          <button v-else class="btn btn-sm btn-primary" @click="() => this.$router.push('/auth/login')">Login</button>
        </span>
      </div>
    </div>
  </nav>
  <ChangeNameModal />
</template>