<template>
    <Header />
    <div class="container mx-auto">
        
        <div v-if="boards" class="w-full flex space-x-4 mt-10">
            <BoardCard
                v-for="board in boards"
                :key="board.id"
                :board="board"
            />
        </div>

        <div v-if="admin" class="w-full flex space-x-4 mt-10">

          <MostUser :mostUser="mostUser"/>
        </div>
      <div v-if="admin" class="w-full flex space-x-4 mt-10">
        <MostDone :mostDone="mostDone"/>
      </div>
        <div v-if="admin" class="w-full flex space-x-4 mt-10">
          <TicketsBoard v-for="board in ticketBoard"
                        :key="board.board_id"
                        :board="board"
          />
        </div>

    </div>
</template>

<script setup>
import BoardCard from './Components/BoardCard.vue';
import MostUser from './Components/MostUser.vue';
import TicketsBoard from './Components/TicketsBoard.vue';
import MostDone from './Components/MostDone.vue';

    let props = defineProps({
        boards: Array,
        mostUser: Array,
        admin: Boolean,
        ticketBoard: Array,
        mostDone: Array
    })
</script>