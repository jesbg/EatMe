import { reactive } from 'vue'

export const store = reactive({
  logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('user_id');
    localStorage.removeItem('name');
    this.isLogged = false;
    this.name = '';
    this.$router.replace('/auth/login');
  },
  signIn(token, user_id, name) {
    localStorage.setItem('token', token);
    localStorage.setItem('user_id', user_id);
    localStorage.setItem('name', name);
    this.isLogged = true
    this.name = name;
  },
  getToken() {
    return localStorage.getItem('token');
  },
  getUserId() {
    return localStorage.getItem('user_id');
  },
  effect(){
    this.name = localStorage.getItem('name');
  },
  setName(name) {
    localStorage.setItem('name', name);
    this.name = name;
  },
  getName() {
    return localStorage.getItem('name');
  },
  isLogged: Boolean(localStorage.getItem('token')),
  name: ''
})