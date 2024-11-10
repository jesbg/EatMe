<script>
  import { store } from '../../store'

  export default {
    name: 'app-change-name-modal',
    data() {
      return {
        store,
        form: false,
        name: store.getName(),
        loading: false,
        error: false,
      }
    },
    methods: {
      changeName() {
      if (!this.form) return;

      this.loading = true
      this.error = false
      fetch('https://jes-eatme.000webhostapp.com/api/change-name', {
        method: 'POST',
        body: JSON.stringify({
          user_id: store.getUserId(),
          name: this.name
        })
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          }
          throw { code: response.status, message: response.statusText };
        })
        .then(() => {
          store.setName(this.name);
          this.$refs.btnClose2.click()
          this.error = false
        })
        .catch(error => {
          this.error = true
          console.error(error);
        }).finally(() => {
          this.loading = false
        });
    }
    }
  }
</script>

<template>
  <div class="modal fade" id="changeNameModal" tabindex="-1" aria-labelledby="modalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Change Name</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <v-form v-model="form" @submit.prevent="bookNow" id="changeNameForm">
          <v-text-field  label="Name" type="text" v-model="name"></v-text-field>
        </v-form>
        <div v-if="error" class="alert alert-danger" role="alert">
            Failed change name!
        </div>
      </div>
      <div class="modal-footer">
        <button ref="btnClose2" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" @click="() => this.$emit('positiveClick')" data-bs-dismiss="modal">Change</button> -->
        <button v-if="loading" type="button" class="btn btn-primary" disabled>Loading...</button>
          <input v-else type="submit" form="changeNameForm" class="btn btn-primary" @click="changeName" value="Change" />
      </div>
    </div>
  </div>
</div>
</template>