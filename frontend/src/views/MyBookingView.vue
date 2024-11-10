<script>
import { store } from '../store'
import AlertModal from '../components/ui/AlertModal.vue'
import DetailBookModal from '../components/ui/DetailBookModal.vue'
import { Modal } from 'bootstrap'

export default {
  components: {
    AlertModal,
    DetailBookModal
  },
  data() {
    return {
      store,
      books: [],
      focusBook: undefined,
      dataLoading: false,
      error: ''
    }
  },
  mounted() {
    this.getData()
  },
  methods: {
    getData() {
      this.dataLoading = true
      this.error = '';
      fetch(`https://jes-eatme.000webhostapp.com/api/book?user_id=${store.getUserId()}`)
        .then((response) => {
          if (response.ok) {
            return response.json()
          }
          throw { 
            code: response.status,
            message: response.statusText
          }
        })
        .then((data) => {
          console.log('data: ', data)
          this.books = data.data.map((book) => ({
            id: book.id,
            restaurantName: book.restaurant.name,
            firstName: book.first_name,
            lastName: book.last_name,
            email: book.email,
            phoneNumber: book.phone_number,
            date: book.date,
            time: book.time,
            partySize: book.party_size,
          }))
        })
        .catch((error) => {
          console.error(error)
          this.error = 'Cannot fetch data';
        })
        .finally(() => {
          this.dataLoading = false
        })
    },
    cancelBooking() {
      fetch('https://jes-eatme.000webhostapp.com/api/book/delete', {
        method: 'POST',
        body: JSON.stringify({
          id: this.focusBook.id
        })
      })
        .then((response) => {
          if (response.ok) {
            return response.json()
          }
          throw { 
            code: response.status,
            message: response.statusText
          }
        })
        .then((data) => {
          console.log('data: ', data)
        })
        .catch((error) => {
          console.error(error)
        })
        .finally(() => {
          this.getData()
        })
    },
    showBookDetail(book) {
      this.focusBook = book
      const modal = Modal.getOrCreateInstance(document.getElementById('detailBookModal'));
      modal.show()
    }
  }
}
</script>

<template>
  <main class="container my-4">
    <div class="border border-1 rounded-2">
      <table class="table mb-0">
        <thead>
          <tr class="bg-body-secondary rounded-5">
            <th scope="col">Restaurant Name</th>
            <th scope="col">Date Book</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody v-if="!dataLoading">
          <tr v-for="book in books" :key="book.id">
            <th scope="row">{{ book.restaurantName }}</th>
            <td>{{ book.date }}</td>
            <td>
              <button
                class="text-primary"
                data-bs-toggle="modal"
                data-bs-target="#detailBookModal"
                @click="() => showBookDetail(book)"
              >
                View
              </button>
              |
              <button
                class="text-primary"
                data-bs-toggle="modal"
                data-bs-target="#alertModal"
                @click="() => (this.focusBook = book)"
              >
                Cancel
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <div
        v-if="dataLoading"
        class="d-flex justify-content-center align-items-center"
        style="height: 100px"
      >
        <p>Loading...</p>
      </div>
      <div
        v-else-if="books.length <= 0 && !error"
        class="d-flex justify-content-center align-items-center"
        style="height: 100px"
      >
        <p>You don't book yet</p>
      </div>
      <div
        v-else-if="error && !dataLoading"
        class="d-flex justify-content-center align-items-center"
        style="height: 100px"
      >
        <p>{{ error }}</p>
      </div>
    </div>
  </main>
  <DetailBookModal v-bind="focusBook" />
  <AlertModal @positive-click="cancelBooking" />
</template>
