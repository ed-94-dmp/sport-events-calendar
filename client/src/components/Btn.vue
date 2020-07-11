<template>
  <button @click="clickHandler" :class="{active: isActive}">
    <slot />
  </button>
</template>

<script>
  export default {
    name: 'btn',
    props: {
      clicked: {
        type: Function,
      },
      isActive: {
        type: Boolean,
        default: false,
      },
    },
    methods: {
      clickHandler () {
        this.$emit('clicked')
      }
    },
  }
</script>

<style scoped>
  button {
    border: none;
    padding: 0.3rem 0.6rem;
    cursor: pointer;
    color: var(--color-white);
    background-color: var(--color-indigo-dye);
    border-radius: 0.2rem;
  }

  button.active {
    background-color: var(--color-ming);
  }
</style>
