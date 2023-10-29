<template>
    <div class="w-1/3 border border-gray-300 p-6 shadow-sm rounded-sm">
      <h2 class="text-xl font-bold">Board Has Most Done Tickets</h2>
      <h5 class="text font-bold">Board: {{ mostDone.title }}</h5>
        <p class="text-sm font-light mb-6">Boarder Count: {{ mostDone.total }}</p>
    </div>
</template>

<script setup>
    defineProps({
      mostDone: Array
    })
</script>