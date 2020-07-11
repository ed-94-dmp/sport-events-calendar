<template>
  <div class="pagination">
    <Btn
      v-if="shouldShowPreviousButton()"
      @clicked="setCurrentPage(currentPage - 1)"
    >
      <
    </Btn>

    <Btn
      v-for="pageNumber in totalPages"
      :is-active="isActive(pageNumber)"
      @clicked="setCurrentPage(pageNumber)"
    >
      {{pageNumber}}
    </Btn>

    <Btn
      v-if="shouldShowNextButton()"
      @clicked="setCurrentPage(currentPage + 1)"
    >
      >
    </Btn>
  </div>
</template>

<script>
  import Btn from "./Btn";

  export default {
    name: 'pagination',
    components: {Btn},
    props: {
      totalPages: {
        type: Number,
        default: 0,
      },
      currentPage: {
        type: Number,
        default: 0,
      },
    },
    methods: {
      shouldShowPreviousButton: function () {
        return this.totalPages !== 0 && this.currentPage > 1;
      },
      shouldShowNextButton: function () {
        return this.totalPages !== 0 && this.currentPage + 1 <= this.totalPages;
      },
      isActive: function(pageNumber) {
        return this.currentPage === pageNumber;
      },
      setCurrentPage: function(pageNumber) {
        this.$emit('setCurrentPage', pageNumber)
      },
    }
  }
</script>

<style scoped>
  .pagination {
    display: grid;
    grid-gap: 0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(30px, max-content));
    justify-content: center;
  }
</style>
