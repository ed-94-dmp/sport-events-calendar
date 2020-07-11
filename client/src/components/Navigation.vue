<template>
  <nav class="navigation">
    <ul>
      <li>
        <router-link to="/news">News</router-link>
        <router-link to="/sports">Sports</router-link>
        <router-link to="/live">Live</router-link>
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

<style scoped>
  ul {
    list-style: none;
    padding: 0;
  }

  a {
    text-decoration: none;
    padding: 5px 10px;
    color: var(--color-white);
    background-color: var(--color-ming);
    border-radius: 4px;
    font-size: 1rem;
  }
</style>
