<template>
    <div>
        <div class="border-collapse border border-slate-500 p-10 mt-10 rounded-lg bg-gray-800">
            <h1 class="text-white">Editar usuário: <b>{{customer.name}}</b></h1>

            <span v-show="form.processingSuccess" class="text-green-500">Usuário editado com sucesso!</span>
            
            <form @submit.prevent="updateForm()" action="#" method="POST" class="flex flex-col mt-6">
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
                    class="animate__animated animate__fadeInDown mt-4 text-white bg-blue-700 rounded-full text-xs p-2 hover:bg-blue-800">
                    <SppinerLoading v-show="form.processing"/>
                    <span v-if="form.processing">Atualizando....</span>
                    <span v-else>Atualizar</span>
                </button>
                <Link :href="route('users.index')" class="text-blue-600 flex justify-center text-xs mt-2">Voltar</Link>
            </form>
        </div>
    </div>
</template>

<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import { reactive } from 'vue'
    import { router } from '@inertiajs/vue3'
    import SppinerLoading from './components/SppinerLoading.vue'

    defineProps({
        customer: Object,
        errors: Object
    })

    const page = usePage()
    
    const form = reactive({
        id               : page.props.customer.id,
        name             : page.props.customer.name,
        email            : page.props.customer.email,
        processing       : false,
        processingSuccess: false
    })

    const updateForm = () => {
        router.put(`/edit/${form.id}`, form, {
            onStart: () => (form.processing = true),
            onFinish: () => {
                form.processing = false
                form.processingSuccess = true
                setTimeout(() => {
                    form.processingSuccess = false
                }, 3000)
            }
        })
    }
 
</script>

