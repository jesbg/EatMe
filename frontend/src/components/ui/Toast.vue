<script>
export default {
  name: 'app-toast',
  props: {
    text: String
  }
}
</script>

<template>
  <div class="toast-container position-fixed start-50 translate-middle-x p-3" style="bottom: 10vh;">
    <div id="liveToast" class="toast align-items-center text-bg-dark border-0" data-bs-delay="3000" role="alert" aria-live="assertive"
      aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          {{ text }}
        </div>
        <!-- <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
          aria-label="Close"></button> -->
      </div>
    </div>
  </div>
</template>