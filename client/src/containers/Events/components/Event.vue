<template>
  <div class="card">
    <div class="thumbnail"></div>
    <div class="content">
      <span class="title">{{event.competitor1.name}} - {{event.competitor2.name}}</span>
      <span class="subtitle">{{event.competition.name}}</span>
      <span class="details">
        {{event.location.name}}, {{event.location.city.name}}, {{event.location.city.state.country.code}}
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
    height: 300px;
    display: flex;
    flex-direction: column;
    border: 2px solid var(--color-jet);
  }

  .card .thumbnail {
    flex-grow: 1;
    max-height: 200px;
    background-image: url("https://brandcenter.euroleague.net/uploads/2/brand_center_web/492/99//2019-06-28-10-23-1815.png");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    border-bottom: 2px solid var(--color-jet);
  }

  .card .content {
    padding: 0.5rem;
    display: flex;
    flex-direction: column;
  }

  .card .title {
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
