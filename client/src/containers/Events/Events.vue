<template>
  <div class="container">
    <Sports
      @setSportId="setSportId"
      :sportsList="sportsList"
    />

    <Months
      @setMonth="setMonth"
      :currentMonth="month"
    />

    <Days
      @setDay="setDay"
      :daysInMonth="daysInMonth"
      :currentDay="day"
    />

    <EventsList :events-list="eventsList" />

    <Error v-if="!eventsList.length">
      There are no events on {{date}}.
    </Error>

    <Error v-if="error">
      {{error.message}}
    </Error>

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
  import Days from "./components/Days";
  import Event from "./components/Event";
  import Pagination from "../../components/Pagination";
  import Error from "../../components/Error";
  import Sports from "./components/Sports";
  import EventsList from "./components/EventsList";

  export default {
    name: 'events',
    components: {EventsList, Sports, Error, Pagination, Event, Days, Months},
    beforeMount() {
      this.initialiseDate();
    },
    mounted() {
      this.getEvents();
      this.getSports();
    },
    data() {
      return {
        day: null,
        month: null,
        year: null,
        sportId: null,

        eventsList: [],
        sportsList: [],

        totalPages: 0,
        currentPage: 1,

        error: null,
      }
    },
    computed: {
      daysInMonth: function () {
        return new Date(this.year, this.month, 0).getDate();
      },
      date: function () {
        return this.makeDateString(this.year, this.month, this.day);
      },
      routeParams: function () {
        return {
          day: this.day,
          month: this.month,
          year: this.year,
        }
      },
      apiParams: function () {
        return {
          date: this.date,
          sportId: this.sportId,
        }
      },
    },
    watch: {
      date: function (date) {
        const {year, month, day} = this.$route.params;

        if (date !== [year, month, day].join('-')) {
          this.navigateToDate();
          this.getEvents();
        }
      },
      currentPage: function () {
        this.getEvents();
      },
      sportId: function() {
        this.getEvents();
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
      setSportId(sportId) {
        this.sportId = sportId;
      },
      navigateToDate() {
        this.$router.push({name: 'events', params: this.routeParams})
      },
      getEvents() {
        SERVER.get('/v1/events', {params: this.apiParams})
          .then((response) => {
            const {data: eventsList, last_page, current_page} = response.data

            this.eventsList = eventsList;
            this.totalPages = last_page;
            this.currentPage = current_page;
          })
          .catch((error) => this.error = error)
      },
      getSports() {
        SERVER.get('/v1/sports')
          .then((response) => {
            const {data: sportsList} = response

            this.sportsList = sportsList;
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

  .sports {
    margin-left: auto;
    min-width: 10rem;
  }
</style>
