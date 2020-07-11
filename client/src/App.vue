<template>
  <div id="app">
    <HeaderBar />

    <main>
      <router-view />
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
    font-size: 50%;
  }

  main {
    padding: 1rem;
  }

  header {
    padding: 1rem;
    background-color: var(--color-jet);
    color: var(--color-white);
  }
</style>
