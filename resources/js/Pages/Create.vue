<template>
    <div>
        <div class="border-collapse border border-slate-500 p-10 mt-10 rounded-lg bg-gray-800">
            <h1 class="text-white">Criar um novo usuário</h1>

            <form @submit.prevent="submit()" action="#" method="POST" class="flex flex-col mt-6">
                <label for="name" class="leading-7 text-sm text-white">Nome</label>
                <input 
                    v-model="form.name"
                    type="text" name="name" id="name" 
                    class="bg-gray-700 border-collapse border border-slate-500 rounded-lg text-white px-4 py-1">
                <span class="text-red-600 text-xs" v-if="errors.name">{{ errors.name }}</span>

                <label for="email" class="leading-7 text-sm text-white">E-mail</label>
                <input v-model="form.email" 
                    type="email" name="email" id="email"
                    class="bg-gray-700 border-collapse border border-slate-500 rounded-lg text-white px-4 py-1">
                <span class="text-red-600 text-xs" v-if="errors.email">{{ errors.email }}</span>


                <button type="submit" :disabled="form.processing" 
                    class="mt-4 text-white bg-blue-700 rounded-full text-xs p-2 hover:bg-blue-800">
                    <SppinerButton v-show="form.processing"/>
                    <span v-if="form.processing">Salvando....</span>
                    <span v-else>Salvar</span>
                </button>
                <Link :href="route('users.index')" class="text-blue-600 flex justify-center text-xs mt-2">Voltar</Link>
            </form>
        </div>
    </div>

</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    import { reactive } from 'vue'
    import { router } from '@inertiajs/vue3'
    import SppinerButton from './components/SppinerButton.vue'

    defineProps({
        errors: Object
    })

    const form = reactive({
        name: null,
        email: null,
        processing: false
    })

    const submit = () => {
        router.post('/create', form, {
            onStart: () => (form.processing = true),
            onFinish: () => (form.processing = false)
        })
    }
 
</script>

