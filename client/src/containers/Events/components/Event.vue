<template>
  <div class="card">
    <div class="thumbnail"></div>
    <div class="content">
      <span class="title">Anadolu Efes - Zalgiris Kaunas</span>
      <span class="subtitle">Euroleague</span>

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
    methods: {},
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
  }

  .card .title {
    font-size: 1.25rem;
    display: flex;
  }

  .card .subtitle {
    font-size: 1rem;
    color: var(--color-gainsboro);
    margin-left: auto;
  }
</style>
