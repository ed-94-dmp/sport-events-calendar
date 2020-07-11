<template>
  <div class="container">
    <Months
      @setMonth="setMonth"
      :currentMonth="month"
    />

    <days
      @setDay="setDay"
      :daysInMonth="daysInMonth"
      :currentDay="day"
    />

    <div class="events-list">
      <Event v-for="event in eventsList" :event="event"/>

      <Error v-if="!eventsList.length">
        There are no events on {{date}}.
      </Error>
    </div>

    <Pagination
      v-if="eventsList.length"
      :total-pages="totalPages"
      :current-page="currentPage"
      @setCurrentPage="setCurrentPage"
    />
  </div>
</template>

<script>
  import {SERVER} from "../../App";

  import Months from "./components/Months";
  import days from "./components/Days";
  import Event from "./components/Event";
  import Pagination from "../../components/Pagination";
  import Error from "../../components/Error";

  export default {
    name: 'events',
    components: {Error, Pagination, Event, days, Months},
    beforeMount() {
      this.initialiseDate();
    },
    mounted() {
      this.getEvents(this.date);
    },
    data() {
      return {
        day: null,
        month: null,
        year: null,

        eventsList: [],
        totalPages: 0,
        currentPage: 1,
      }
    },
    computed: {
      daysInMonth: function () {
        return new Date(this.year, this.month, 0).getDate();
      },
      date: function () {
        return this.makeDateString(this.year, this.month, this.day);
      },
      params: function () {
        return {
          day: this.day,
          month: this.month,
          year: this.year,
        }
      },
    },
    watch: {
      $route: function() {
        this.getEvents(this.date, this.currentPage);
      },
      date: function (date) {
        const {year, month, day} = this.$route.params;

        if (date !== [year, month, day].join('-')) {
          this.navigateToDate();
        }
      },
      currentPage: function () {
        this.getEvents(this.date, this.currentPage);
      },
    },
    methods: {
      initialiseDate() {
        const today = new Date();
        const currentMonth = today.getMonth() + 1;
        const currentYear = today.getFullYear();

        const {year, month, day} = this.$route.params;

        const dayNumber = Number(day);
        const monthNumber = Number(month);
        const yearNumber = Number(year);

        this.year = year ? yearNumber : currentYear;
        this.month = month ? monthNumber : currentMonth;
        this.day = 1;

        if (day) {
          if (this.daysInMonth >= dayNumber) {
            this.day = dayNumber;
          }
        } else if (month === undefined || monthNumber === currentMonth) {
          this.day = today.getDate();
        }
      },
      makeDateString(year, month, day) {
        return [year, month, day].join('-');
      },
      setDay(day) {
        this.day = day;
      },
      setMonth(month) {
        this.day = 1;
        this.month = month;
      },
      setYear(year) {
        this.day = 1;
        this.month = 1;
        this.year = year;
      },
      setCurrentPage(pageNumber) {
        this.currentPage = pageNumber;
      },
      navigateToDate() {
        this.$router.push({name: 'events', params: this.params})
      },
      getEvents(date, page = 1) {
        SERVER.get('/v1/events', {params: {date: date, page: page}})
          .then((response) => {
            const {data: eventsList, last_page, current_page} = response.data

            this.eventsList = eventsList;
            this.totalPages = last_page;
            this.currentPage = current_page;
          })
          .catch((error) => this.error = error)
      },
    },
  }
</script>

<style scoped>
  .container {
    display: grid;
    row-gap: 1rem;
  }

  .events-list {
    display: grid;
    grid-gap: 1rem;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  }

  .events-list .error {
    grid-column: 1 / -1;
  }
</style>
