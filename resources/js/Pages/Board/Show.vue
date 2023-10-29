<template>
    <Header />
    <div class="container mx-auto mt-6" v-if="user">
      <div class="w-full shadow-md p-5">
        <h2 class="text-xl mb-3">Invite user to board</h2>
        <form @submit.prevent="inviteToBoard()" class="flex items-center space-x-3">
          <div class="w-1/3">
            <label>User Email: </label>
            <input v-model="form.email" type="text" class="shadow-sm px-4 py-2 rounded-sm w-full" />
          </div>
          <div class="w-1/3">
            <button type="submit" class="bg-green-500 rounded-sm text-white px-4 py-2 w-full">Invite User</button>
          </div>
        </form>
      </div>
        <div class="w-full shadow-md p-5">
            <h2 class="text-xl mb-3">Create a new ticket</h2>
            <form @submit.prevent="createTicket()" class="flex items-center space-x-3">
                <div class="w-1/3">
                    <label>Ticket: </label>
                    <input v-model="form.body" type="text" class="shadow-sm px-4 py-2 rounded-sm w-full" />
                </div>
                <div class="w-1/3">
                    <label>Category: </label>
                    <select v-model="form.category" class="shadow-sm px-4 py-2 rounded-sm w-full">
                        <option value="1" selected>Working</option>
                        <option value="2">Done</option>
                    </select>
                </div>
                <div class="w-1/3">
                    <button type="submit" class="bg-green-500 rounded-sm text-white px-4 py-2 w-full">Add Ticket</button>
                </div>
            </form>
        </div>
        <div class="w-full shadow-md p-5">
            <h2 class="text-xl mb-3">Create a new board</h2>
            <form @submit.prevent="createBoard()" class="flex items-center space-x-3">
                <div class="w-1/3">
                    <label>Title: </label>
                    <input v-model="form.title" type="text" class="shadow-sm px-4 py-2 rounded-sm w-full" />
                </div>
                <div class="w-1/3">
                    <label>Describtion: </label>
                    <input v-model="form.description" type="text" class="shadow-sm px-4 py-2 rounded-sm w-full" />
                </div>
                <div class="w-1/3">
                    <button type="submit" class="bg-green-500 rounded-sm text-white px-4 py-2 w-full">Add Board</button>
                </div>
            </form>
        </div>

        <div class="tasks__container w-full flex space-x-3 mt-10">
            <BoardColumn title="Working" :tickets="tickets.working" />
            <BoardColumn title="Done" :tickets="tickets.done" />
        </div>
        
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3'
    import BoardColumn from './Components/BoardColumn.vue';

    let props = defineProps({
        board: Object,
        tickets: Array,
        user: Boolean
    })

    const form = useForm({
        board_id: props.board.id,
        body: '',
        category: '',
        title: '',
        description: '',
        email: ''
    })

    function createTicket()
    {
        form.post('/tickets');

        form.body = '';
        form.category = '';
    }

    function createBoard()
    {
        form.post('/boards');

        form.title = '';
        form.description = '';
    }

    function inviteToBoard()
    {
      form.post('/invite/boards/' + props.board.id);

      form.title = '';
      form.description = '';
    }
</script>