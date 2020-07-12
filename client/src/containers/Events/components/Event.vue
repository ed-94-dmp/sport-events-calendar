<template>
  <div class="card">
    <div class="content">
      <span class="title">{{event.competitor1.name}} - {{event.competitor2.name}}</span>
      <span class="subtitle">{{event.competition.name}}</span>
      <hr>
      <span class="details">
        Sport: {{event.sport.name}}
        <br>
        Location: {{event.location.name}}, {{event.location.city.name}}, {{event.location.city.state.country.code}}
        <br>
        Status: {{event.status}}
      </span>
    </div>
  </div>
</template>

<script>
  import Btn from "../../../components/Btn";

  export default {
    name: 'event',
    components: {Btn},
    props: {
      event: {
        type: Object,
      },
    },
  }
</script>

<style scoped>
  .card {
    display: flex;
    flex-direction: column;
    border: 2px solid var(--color-jet);
  }

  .card .content {
    padding: 0.5rem;
    display: flex;
    flex-direction: column;
  }

  .card .title {
    font-weight: bold;
    font-size: 1.25rem;
    display: flex;
  }

  .card .subtitle {
    font-size: 1rem;
  }

  .card .details {
    font-size: 0.8rem;
  }
</style>
