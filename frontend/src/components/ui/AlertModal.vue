<script>
  export default {
    name: 'app-alert-modal',
  }
</script>

<template>
  <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="modalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure cancel booking this restaurant?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="() => this.$emit('positiveClick')" data-bs-dismiss="modal">Cancel booking</button>
      </div>
    </div>
  </div>
</div>
</template>