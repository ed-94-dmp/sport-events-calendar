<template>
  <span class="error">
    <slot/>
  </span>
</template>

<script>
  export default {
    name: 'error',
  }
</script>

<style scoped>
  span {
    font-weight: bold;
    font-size: 2rem;
    color: var(--color-red);
  }
</style>
