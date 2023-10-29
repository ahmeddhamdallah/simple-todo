<template>
    <div class="w-1/3 border border-gray-300 p-6 shadow-sm rounded-sm">
      <h2 class="text-xl font-bold uppercase">Most User Includded On Board</h2>
      <h5 class="text font-bold">Board: {{ mostUser.name }}</h5>
        <p class="text-sm font-light mb-6">Boarder Count: {{ mostUser.boards_count }}</p>
    </div>
</template>

<script setup>
    defineProps({
      mostUser: Array
    })
</script>