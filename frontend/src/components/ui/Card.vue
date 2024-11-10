<script>

export default {
  name: "app-card",
  props: {
    id: String,
    name: String,
    image: String,
    address: String,
    price: String,
    type: String
  },
  methods: {
    booking() {
      this.$emit('showDetails', {
        id: this.id,
        name: this.name,
        image: this.image,
        address: this.address,
        price: this.price,
        type: this.type
      })
    }
  }
}
</script>

<template>
  <div class="card border-0">
    <div class="ratio ratio-4x3">
      <img :src="image" class="rounded-2 object-fit-cover" :alt="name" />
    </div>
    <div class="card-body">
      <div class="d-flex align-items-center">
        <h5 class="card-title mb-0">{{ name }}</h5>
        <p class="ps-1 h6 mb-0 text-black-50">{{ price }}</p>
      </div>
      <p class="fs-6 mb-1">{{ address }}</p>
      <div class="d-flex align-items-center mt-2 justify-content-end">
        <!-- <router-link :to="'/detail/' + id" class="btn btn-sm btn-primary mt-1">Book Now</router-link> -->
        <!-- Button trigger Restaurant Detail Modal -->
        <button type="button" @click="booking" class="btn btn-primary btn-sm">
          Show Details
        </button>
      </div>
    </div>
  </div>
</template>