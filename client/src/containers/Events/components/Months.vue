<template>
  <nav class="months">
    <Btn
      v-for="(month, index) in months"
      @clicked="setMonth(index + 1)"
      :is-active="isActive(index + 1)"
    >
      {{month}}
    </Btn>
  </nav>
</template>

<script>
  import Btn from "../../../components/Btn";

  export default {
    name: 'months',
    components: {Btn},
    props: {
      currentMonth: {
        type: Number,
      },
    },
    data() {
      return {
        months: [
          "January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December",
        ],
      }
    },
    methods: {
      setMonth(month) {
        this.$emit('setMonth', month)
      },
      isActive(month) {
        return this.currentMonth === month;
      },
    },
  }
</script>

<style scoped>
  nav {
    display: grid;
    grid-gap: 0.6rem;
    grid-auto-flow: column;
    overflow-x: auto;
  }
</style>
