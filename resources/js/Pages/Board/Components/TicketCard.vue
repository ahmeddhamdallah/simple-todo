<template>
    <div class="shadow-sm mb-4 p-4 rounded-sm" @dblclick="isEditing = ! isEditing">
        <div v-if="isEditing">
            <form @submit.prevent="form.post('/tickets');">
                <input type="text" class="border" />
            </form>
        </div>
        <div v-else class="text-sm">
            {{ ticket.body }}
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue'
    import { useForm } from '@inertiajs/vue3'

    let props = defineProps({
        ticket: Object
    })

    let isEditing = ref(false)

    let form = useForm({
        ticket_id: props.ticket.id,
        body: ''
    })
</script>