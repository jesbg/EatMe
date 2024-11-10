<script>
import { Modal } from 'bootstrap';
import IconBankNote from '../icons/IconBankNote.vue'
import IconMapPin from '../icons/IconMapPin.vue'
import IconUtensils from '../icons/IconUtensils.vue'

export default {
  name: 'app-detail-modal',
  components: {
    IconBankNote,
    IconMapPin,
    IconUtensils
  },
  props: {
    id: String,
    name: String,
    image: String,
    address: String,
    price: String,
    type: String
  },
  methods: {
    test() {
      const modal = new Modal('#detailModal')
      modal.show()
    }
  }
}
</script>

<template>
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="--bs-modal-width: 350px;">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="ratio ratio-4x3">
            <img :src="image" class="rounded-2 object-fit-cover" :alt="name" />
          </div>
          <h3 class="mt-2">{{ name }}</h3>
          <div class="d-flex align-items-center">
            <IconMapPin class="text-primary-emphasis" />
            <p class="ps-2 mb-0">{{ address }}</p>
          </div>
          <div class="d-flex align-items-center">
            <IconBankNote class="text-primary-emphasis" />
            <p class="ps-2 mb-0">{{ price }}</p>
          </div>
          <div class="d-flex align-items-center">
            <IconUtensils class="text-primary-emphasis" />
            <p class="ps-2 mb-0">{{ type }}</p>
          </div>
        </div>
        <div class="modal-footer">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" @click="()=> $emit('showBooking')">
            Book
          </button>
        </div>
      </div>
    </div>
  </div>
</template>