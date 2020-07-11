<template>
  <div class="pagination">
    <Btn>
      <
    </Btn>

    <Btn v-for="page in 20">
      {{page}}
    </Btn>

    <Btn>
      >
    </Btn>
  </div>
</template>

<script>
  import Btn from "./Btn";

  export default {
    name: 'pagination',
    components: {Btn},
  }
</script>

<style scoped>
  .pagination {
    display: grid;
    grid-gap: 0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(30px, max-content));
    justify-content: center;
  }
</style>
