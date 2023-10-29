<template>
    <div class="w-1/3 border border-gray-300 p-6 shadow-sm rounded-sm">
      <h2 class="text-xl font-bold uppercase">Most Board Has tickets</h2>
      <h5 class="text font-bold">Board: {{ board.title }}</h5>
        <p class="text-sm font-light mb-6">Tickets Count: {{ board.total }}</p>
    </div>
</template>

<script setup>
    defineProps({
      board: Array
    })
</script>