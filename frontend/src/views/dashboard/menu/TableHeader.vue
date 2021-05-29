<template>
  <div class="row header">
   <div class="cell">Photo</div>
   <div class="cell">Name</div>
     <div class="cell">Gender</div>
  <div class="cell">Nick Name</div>
    <div class="cell">Email</div>

  </div>
</template>

<script>
  export default {
    name: 'FoodCalculatorTableHeader',
    props: {
      columns: {
        type: Array,
        default: () => { return [] }
      },
    }
  }
</script>

<style scoped>
  .header{
    text-transform: uppercase;
    font-weight: bold;
  }
</style>