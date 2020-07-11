<template>
  <header>
    <h1>{{headerMessage}}</h1>

    <Navigation />
  </header>
</template>

<script>
  import Navigation from "./Navigation";

  export default {
    name: 'headerBar',
    components: {Navigation},
    data() {
      return {
        headerMessage: 'Sport Events Calendar'
      }
    }
  }
</script>

<style scoped>
  header {
    display: grid;
    align-items: center;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }

  header h1 {
    font-size: 2rem;
  }

  header .navigation {
    margin-left: auto;
  }
</style>
