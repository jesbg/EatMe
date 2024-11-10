<script>
  export default {
    name: 'app-detail-book-modal',
    props: {
      id: String,
      restaurantName: String,
      firstName: String,
      lastName: String,
      email: String,
      phoneNumber: String,
      date: String,
      time: String,
      partySize: Number
    }
  }
</script>

<template>
  <div class="modal fade" id="detailBookModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Detail Book</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>Restaurant Name</h6>
          <p>{{ restaurantName }}</p>
          <h6>First Name</h6>
          <p>{{ firstName }}</p>
          <h6>Last Name</h6>
          <p>{{ lastName }}</p>
          <h6>Email</h6>
          <p>{{ email }}</p>
          <h6>Phone Number</h6>
          <p>{{ phoneNumber }}</p>
          <h6>Date</h6>
          <p>{{ date }}</p>
          <h6>Time</h6>
          <p>{{ time }}</p>
          <h6>Party Size</h6>
          <p>{{ partySize }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>