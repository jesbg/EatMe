<script>
import IconBuilding from '../icons/IconBuilding.vue';
import { store } from '../../store'


export default {
  name: 'app-booking-form-modal',
  components: {
    IconBuilding
  },
  props: {
    id: String,
    name: String,
  },
  data() {
    return {
      submitLoading: false,
      error: false,
      form: false,
      rules: {
        firstName: [
          value => {
            if (value) return true;
            return 'First name is required'
          }
        ],
        phoneNumber: [
          value => {
            if (value) return true;
            return 'Phone Number name is required'
          },
          value => {
            if (/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s./0-9]*$/g.test(value)) return true;
            return 'Phone number is not valid'
          }
        ],
        email: [
          value => {
            if (value) return true;
            return 'Email is required'
          },
          value => {
            if (/.+@.+\..+/.test(value)) return true
            return 'E-mail must be valid.'
          }
        ],
        date: [
          value => {
              if (value) return true;
              return 'Date is required'
            }  
          ],
        time: [
          value => {
            if (value) return true;
            return 'Time is required'
          }  
        ]
      },
      timeItems: [
        '10:00 AM',
        '10:30 AM',
        '11:00 AM',
        '11:30 AM',
        '12:00 PM',
        '12:30 PM',
        '01:00 PM',
        '01:30 PM',
        '02:00 PM',
        '02:30 PM',
        '03:00 PM',
        '03:30 PM',
        '04:00 PM',
        '04:30 PM',
        '05:00 PM',
        '05:30 PM',
        '06:00 PM',
        '06:30 PM',
        '07:00 PM',
        '07:30 PM',
        '08:00 PM',
        '08:30 PM',
        '09:00 PM',
        '09:30 PM',
        '10:00 PM',
      ],
      store,
      firstName: '',
      lastName: '',
      phoneNumber: '',
      email: '',
      date: '',
      time: '',
      partySize: 1,
    }
  },
  mounted() {
    this.restaurantName = this.name;
    console.log('data: ', this.id);
    const myModalEl = document.getElementById('bookingModal')
    myModalEl.addEventListener('hidden.bs.modal', () => {
      this.firstName = ''
      this.lastName = ''
      this.phoneNumber = ''
      this.email = ''
      this.date = '',
      this.time = '',
      this.partySize = 1
      this.error = false
      this.submitLoading = false
    })
  },
  methods: {
    bookNow() {
      if (!this.form) return;

      this.submitLoading = true
      this.error = false
      fetch('https://jes-eatme.000webhostapp.com/api/book', {
        method: 'POST',
        headers: {
          // "Authorization": `Bearer ${store.getToken()}`,
          // "Content-Type": "application/json",
        },
        body: JSON.stringify({
          restaurant_id: this.id,
          first_name: this.firstName,
          last_name: this.lastName,
          phone_number: this.phoneNumber,
          email: this.email,
          date: this.date,
          time: this.time,
          party_size: this.partySize,
          user_id: this.store.getUserId()
        })
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          }
          throw { code: response.status, message: response.statusText };
        })
        .then((data) => {
          console.log('data: ', data);
          this.$refs.btnClose.click()
          this.error = false
        })
        .catch(error => {
          this.error = true
          console.error(error);
          if (error.code === 401) {
            // this.showToast('Email or password not correct')
          } else {
            // this.showToast(error.message)
          }
        }).finally(() => {
          this.submitLoading = false
        });
    }
  }
}
</script>

<template>
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Book Form</h1>
          <button ref="btnClose" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="d-flex align-content-center">
            <IconBuilding class="text-primary-emphasis" />
            <p class="ps-2 h6 mb-0">{{ name }}</p>
          </div>
          <v-form v-model="form" @submit.prevent="bookNow" id="formBook">
            <!-- <v-text-field label="Restaurant Name" type="text" v-model="restaurantName"></v-text-field> -->
            <v-text-field class="mt-3" label="First Name" type="text" v-model="firstName" :rules="rules.firstName"></v-text-field>
            <v-text-field name="lastName" label="Last Name" v-model="lastName"></v-text-field>
            <v-text-field name="phoneNumber" label="Phone Number" v-model="phoneNumber"  :rules="rules.phoneNumber"></v-text-field>
            <v-text-field name="email" label="Email" type="email" v-model="email" :rules="rules.email"></v-text-field>

            <v-text-field label="Date" type="date" v-model="date" :rules="rules.date"></v-text-field>
            <!-- <v-text-field label="Time" type="time" v-model="time"></v-text-field> -->
            <v-select
              label="Time"
              :items="timeItems"
              v-model="time"
              :rules="rules.time"
            ></v-select>
            <v-text-field label="Party Size" type="number" v-model="partySize"></v-text-field>
            <!-- <v-text-field name="date" v-model="date" label="Date">
              <v-date-picker v-model="date" label="Date" @input="updateDate"></v-date-picker>
            </v-text-field> -->
          </v-form>
          <div v-if="error" class="alert alert-danger" role="alert">
            Failed book restaurant!
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#detailModal">Back</button>
        
          <button v-if="submitLoading" type="button" class="btn btn-primary" disabled>Loading...</button>
          <input v-else type="submit" form="formBook" class="btn btn-primary" @click="bookNow" value="Book Now" />
        </div>
      </div>
    </div>
  </div>
</template>