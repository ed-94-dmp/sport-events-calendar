<template>
  <nav class="navigation">
    <ul>
      <li><router-link to="/">Events</router-link></li>
      <li><router-link to="/news">News</router-link></li>
      <li><router-link to="/sports">Sports</router-link></li>
      <li><router-link to="/live">Live</router-link></li>
      <li>-</li>
      <li><router-link to="/new-event">New Event</router-link></li>
    </ul>
  </nav>
</template>

<script>
  export default {
    name: 'navigation',
  }
</script>

<style scoped>
  ul {
    display: flex;
    list-style: none;
    padding: 0;
    align-items: center;
  }

  ul li {
    margin: 0 0.2rem;
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
