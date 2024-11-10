<script>
import Toast from '../components/ui/Toast.vue';
import { Toast as ToastObj } from 'bootstrap';
import { store } from '../store';

export default {
  components: {
    Toast
  },
  data() {
    return {
      name: '',
      email: '',
      password: '',
      toastMsg: '',
      submitLoading: false,
      form: false,
      rules: {
        name: [
          value => {
            if (value) return true;
            return 'Name is required'
          },
        ],
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
    }
  },
  methods: {
    onSubmit() {
      if (!this.form) return
      this.submitLoading = true
      fetch('https://jes-eatme.000webhostapp.com/api/auth/register', {
        method: 'POST',
        // headers: {
        //   "Content-Type": "application/json",
        // },
        body: JSON.stringify({
          name: this.name,
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
        }).catch((error) => {
          console.error(error);
          if (error.code === 401) {
            this.showToast('Input not valid')
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
      const toastBootstrap = ToastObj.getOrCreateInstance(toastLiveExample, { delay: 3000 })
      toastBootstrap.show()
    }
  }
}
</script>

<template>
  <main class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
    <v-form v-model="form" class="w-100" style="max-width: 300px;" @submit.prevent="onSubmit">
      <h2 class="text-center">Create an account</h2>
      <v-text-field class="mt-4" label="Name" v-model="name" :rules="rules.name"></v-text-field>
      <v-text-field class="" label="Email" v-model="email" type="email" :rules="rules.email"></v-text-field>
      <v-text-field class="" label="Password" type="password" v-model="password" :rules="rules.password"></v-text-field>
      <div v-if="submitLoading" class="d-flex justify-content-center">
        <div class="spinner-border text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
      <button v-else type="submit" class="mt-2 btn btn-primary d-block w-100">Register</button>
      <p class="mb-0 mt-4">Already have account? {{ ' ' }}<RouterLink class="" to="/auth/login">Login</RouterLink>
      </p>
    </v-form>
  </main>
  <Toast :text="toastMsg" />
</template>