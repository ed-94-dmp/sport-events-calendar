<template>
  <nav>
    <ul>
      <li>
        <router-link to="/404">Nav 1</router-link>
        <router-link to="/404">Nav 2</router-link>
        <router-link to="/404">Nav 3</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
  export default {
    name: 'navigation',
    data() {
      return {
        headerMessage: 'Sport Events Calendar'
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  ul {
    list-style: none;
  }

  a {
    text-decoration: none;
    padding: 5px 10px;
    color: var(--color-white);
    background-color: var(--color-ming);
    border-radius: 4px;
  }
</style>
