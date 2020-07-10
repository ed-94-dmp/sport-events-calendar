<template>
  <div id="app">
    <HeaderBar />

    <main>
      <router-view></router-view>
    </main>
  </div>
</template>

<script>
  import HeaderBar from "./components/HeaderBar";

  export default {
    name: 'app',
    components: {HeaderBar}
  }
</script>

<style>
  :root {
    --color-indigo-dye: #284B63;
    --color-gainsboro: #D9D9D9;
    --color-white: #FFFFFF;
    --color-ming: #3C6E71;
    --color-jet: #353535;
  }

  body {
    margin: 0;
    background-color: var(--color-white);
  }

  #app {
    display: grid;
    grid-gap: 25px;
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
  }

  main {
    grid-column: 1 / -1;
    padding: 20px;
  }

  header {
    grid-column: 1 / -1;
    padding: 20px;
    background-color: var(--color-jet);
    color: var(--color-white);
  }
</style>
