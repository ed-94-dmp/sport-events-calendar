<template>
  <div id="app">
    <HeaderBar/>

    <main>
      <router-view/>
    </main>
  </div>
</template>

<script>
  import axios from "axios";
  import HeaderBar from "./components/HeaderBar";

  export const SERVER = axios.create({
    baseURL: `http://localhost:8000/api`,
    transformRequest: [
      function (params) {
        const serializedData = []

        for (const param in params) {
          if (params.hasOwnProperty(param) && params[param]) {
            serializedData.push(`${param}=${encodeURIComponent(params[param])}`)
          }
        }

        return serializedData.join('&')
      }
    ]
  })

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
    --color-red: #FF0000;
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
