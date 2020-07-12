<template>
  <select class="sports" @change="setSportId">
    <option value="">All sports</option>
    <option v-for="sport in sportsList" :value="sport.id">
      {{sport.name}}
    </option>
  </select>
</template>

<script>
  export default {
    name: 'sports',
    props: {
      sportsList: {
        type: Array,
      },
    },
    methods: {
      setSportId(event) {
        this.$emit('setSportId', event.target.value)
      },
    },
  }
</script>
