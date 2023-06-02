<template>
    <div>
        <div class="border-collapse border border-slate-500 p-10 mt-10 rounded-lg bg-gray-800">
            <h1 class="text-white">Criar um novo usuário</h1>

            <form @submit.prevent="submit()" action="#" method="POST" class="flex flex-col mt-6">
                <InputField label="Nome" v-model="form.name" name="name" type="text" :error="errors.name"/>
                <InputField label="E-mail" v-model="form.email" name="email" type="email" :error="errors.email"/>
                <button type="submit" :disabled="form.processing" 
                    class="animate__animated animate__fadeInDown mt-4 text-white bg-blue-700 rounded-full text-xs p-2 hover:bg-blue-800">
                    <SppinerLoading v-show="form.processing"/>
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
    import SppinerLoading from './components/SppinerLoading.vue'
    import InputField from './components/InputField.vue'

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

