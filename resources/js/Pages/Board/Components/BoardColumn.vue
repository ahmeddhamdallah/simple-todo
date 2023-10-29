<template>
    <div class="tasks__col w-1/4 shadow-sm p-4">
        <h2 class="text-xl font-bold uppercase">{{ title }}</h2>
        <hr class="mb-3">
        <div>

            <TicketCard v-for="ticket in tickets" :key="ticket.id" :ticket="ticket" />

        </div>
    </div>
</template>

<script setup>
    import TicketCard from './TicketCard.vue'

    defineProps({
        title: String,
        tickets: Array
    })
</script>