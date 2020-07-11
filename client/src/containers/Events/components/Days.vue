<template>
  <nav class="days">
    <Btn
      v-for="day in daysInMonth"
      @clicked="setDate(day)"
      :is-active="isActive(day)"
    >
      {{day}}
    </Btn>
  </nav>
</template>

<script>
  import Btn from "../../../components/Btn";

  export default {
    name: 'days',
    components: {Btn},
    props: {
      daysInMonth: {
        type: Number,
      },
      currentDay: {
        type: Number,
      },
    },
    methods: {
      setDate(day) {
        this.$emit('setDay', day)
      },
      isActive(day) {
        return this.currentDay === day;
      },
    },
  }
</script>

<style scoped>
  .days {
    display: grid;
    grid-gap: 0.6rem;
    grid-auto-flow: column;
    overflow-x: auto;
  }
</style>
