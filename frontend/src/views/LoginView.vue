<script>
import Toast from '../components/ui/Toast.vue';
import { Toast as Toast2 } from 'bootstrap';
import { store } from '../store';

export default {
  components: {
    Toast
  },
  data() {
    return {
      email: '',
      password: '',
      toastMsg: '',
      rules: {
        email: [
          value => {
            if (value) return true;
            return 'Email is required'
          },
          value => {
            if (/.+@.+\..+/.test(value)) return true
            return 'E-mail must be valid.'
          },
        ],
        password: [
          value => {
            if (value) return true;
            return 'Password is required'
          },
        ]
      },
      form: false,
      submitLoading: false
    }
  },
  methods: {
    onSubmit() {
      if (!this.form) return

      this.submitLoading = true
      fetch(`https://jes-eatme.000webhostapp.com/api/auth/login`, {
        method: 'POST',
        body: JSON.stringify({
          email: this.email,
          password: this.password
        })
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          }
          throw { code: response.status, message: response.statusText };
        })
        .then((data) => {
          store.signIn(data.token, data.user_id, data.name);
          this.$router.replace('/');
        })
        .catch(error => {
          // console.error(error);
          if (error.code === 401) {
            this.showToast('Email or password not correct')
          } else {
            this.showToast(error.message)
          }
        }).finally(() => {
          this.submitLoading = false
        });
    },
    showToast(message) {
      this.toastMsg = message
      const toastLiveExample = document.getElementById('liveToast')
      const toastBootstrap = Toast2.getOrCreateInstance(toastLiveExample, { delay: 3000 })
      toastBootstrap.show()
    }
  }
}
</script>

<template>
  <main class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
    <v-form v-model="form" class="w-100" style="max-width: 300px;" @submit.prevent="onSubmit" >
      <h2 class="text-center">Login</h2>
      <v-text-field class="mt-4" label="Email" type="email" :rules="rules.email" v-model="email"></v-text-field>
      <v-text-field class="mt-1" label="Password" type="password" v-model="password" :rules="rules.password"></v-text-field>
      <div v-if="submitLoading" class="d-flex justify-content-center">
        <div  class="spinner-border text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div> 
      </div>
      <button v-else type="submit" class="mt-2 btn btn-primary d-block w-100">Login</button>
      <p class="mb-0 mt-4">Not have any account yet? {{ ' ' }}<RouterLink class="" to="/auth/register">Register
        </RouterLink>
      </p>
    </v-form>
    <Toast :text="toastMsg" />
  </main>
</template>