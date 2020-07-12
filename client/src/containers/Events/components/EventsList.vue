<template>
  <div class="events-list">
    <Event v-for="event in eventsList" :event="event"/>
  </div>
</template>

<script>
  import Event from "./Event";

  export default {
    name: 'eventsList',
    components: {Event},
    props: {
      eventsList: {
        type: Array,
      },
    },
  }
</script>

<style scoped>
  .events-list {
    display: grid;
    grid-gap: 1rem;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  }
</style>
