<script>
import Card from '../components/ui/Card.vue'
import DetailModal from '../components/ui/DetailModal.vue'
import BookingFormModal from '../components/ui/BookingFormModal.vue'
import paginate from 'vuejs-paginate-next';

export default {
  name: 'app-home-view',
  components: {
    Card,
    DetailModal,
    BookingFormModal,
    paginate
  },
  data() {
    return {
      restaurants: [],
      perPage: 6,
      currentPage: 1,
      filter:  {
        type: 'All',
        query: ''
      },
      restaurantShowed: {},
      isModalShow: {
        detail: false,
        booking: false,
      },
      error: ''
    }
  },
  methods: {    
    //sets the clicked page
    clickCallback: function(pageNum) {
      this.currentPage = Number(pageNum);
    },
    showDetails(re) {
      this.restaurantShowed = re
      this.isModalShow.detail = true
      this.$refs.btnDetailModal.click();
    },
    showBooking() {
      this.isModalShow.booking = true
      this.$refs.btnBookingModal.click()
    }
  },
  mounted() {
    fetch('https://jes-eatme.000webhostapp.com/api/restaurants')
      .then(response => {
        if (response.ok) {
          return response.json();
        }
        throw `Error status ${response.status}`;
      })
      .then(data => {
        this.restaurants = data.data;
      })
      .catch(error => {
        console.error(error);
        this.error = error;
      });
  },
  computed: {
    // function that filters the units according to the search fields
    filteredRes: function () {
      return this.restaurants.filter(restaurant =>
        (restaurant.name.toLowerCase().includes(this.filter.query.toLowerCase()) || !this.filter.query) &&
        (restaurant.type.match((this.filter.type.trim())) || this.filter.type === 'All' )
      );
    },
    // returns the data according to the page number
    getItems: function () {
      let current = this.currentPage * this.perPage;
      let start = current - this.perPage;
      return this.filteredRes.slice(start, current);
    },
    //returns total number of pages required according to the total rows of data
    getPageCount: function () {
      return Math.ceil(this.filteredRes.length / this.perPage);
    }
  }
}
</script>

<template>
  <main class="container my-4">
    <!-- Search Section -->
    <section class="d-flex flex-column-reverse flex-sm-row column-gap-2 mb-3" style="row-gap: 10px;">
      <div>
        <select class="form-select" v-model="filter.type" style="width: 150px;" aria-label="Default select example">
          <option value="All" selected>All</option>
          <option value="Fast Casual">Fast Casual</option>
          <option value="Cafe">Cafe</option>
          <option value="Casual Dining">Casual Dining</option>
          <option value="Fine Dining">Fine Dining</option>
        </select>
      </div>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" v-model="filter.query" aria-label="Recipient's username"
          aria-describedby="Search Button">
        <button class="btn btn-primary" type="button">Search</button>
      </div>
    </section>


    <section>
      <div class="row">
        <Card v-for="restaurant in getItems" :key="restaurant.id" class="col-sm-6 col-lg-4 col-md-6" v-bind="restaurant"
          @show-details="(re) => showDetails(re)" />
      </div>
    </section>
    <section>
      <paginate 
        :page-count="getPageCount" 
        :page-range="6" 
        :margin-pages="5" 
        :click-handler="clickCallback" 
        :prev-text=" 'Prev' " 
        :next-text="'Next'" 
        :container-class="'pagination'" 
        :page-class="'page-item'">
      </paginate>
    </section>
  </main>
  <DetailModal v-bind="restaurantShowed" @show-booking="showBooking" />
  <button ref="btnDetailModal" type="button" class="invisible" data-bs-toggle="modal"
    data-bs-target="#detailModal"></button>
  <BookingFormModal v-bind="restaurantShowed" />
  <button ref="btnBookingModal" type="button" class="invisible" data-bs-toggle="modal"
    data-bs-target="#bookingModal"></button>
</template>
