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
      <Event />
      <Event />
      <Event />
      <Event />
      <Event />
      <Event />
      <Event />
    </div>

    <Pagination />
  </div>
</template>

<script>
  import Months from "./components/Months";
  import days from "./components/Days";
  import Event from "./components/Event";
  import Pagination from "../../components/Pagination";

  export default {
    name: 'events',
    components: {Pagination, Event, days, Months},
    beforeMount() {
      this.initialiseDate();
    },
    data() {
      return {
        day: null,
        month: null,
        year: null,
      }
    },
    computed: {
      daysInMonth: function () {
        return new Date(this.year, this.month, 0).getDate();
      },
      date: function () {
        return [this.day, this.month, this.year].join('/');
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
      date: function (date) {
        const {year, month, day} = this.$route.params;
        if (date !== [day, month, year].join('/')) {
          this.navigateToDate();
        }
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
      navigateToDate() {
        this.$router.push({name: 'events', params: this.params})
      }
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
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
</style>
