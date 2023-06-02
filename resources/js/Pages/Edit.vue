<template>
    <div>
        <div class="border-collapse border border-slate-500 p-10 mt-10 rounded-lg bg-gray-800">
            <h1 class="text-white">Editar usuário: <b>{{customer.name}}</b></h1>

            <span v-show="page.props.flash.success" class="text-green-500">{{page.props.flash.success}}</span>
            
            <form @submit.prevent="updateForm()" action="#" method="POST" class="flex flex-col mt-6">

                <InputField 
                    label="Nome" v-model="form.name" 
                    name="name" type="text" 
                    :error="errors.name" 
                    @update:modelValue="value => form.name = value"
                />

                <InputField 
                    label="E-mail" v-model="form.email" 
                    name="email" type="email" 
                    :error="errors.email" 
                    @update:modelValue="value => form.email = value"
                />

                <button type="submit" :disabled="form.processing" 
                    class="animate__animated animate__fadeInDown mt-4 text-white bg-blue-700 rounded-full text-xs p-2 hover:bg-blue-800">
                    <SppinerLoading v-show="form.processing"/>
                    <span v-if="form.processing">Editando...</span>
                    <span v-else>Editar</span>
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
    import InputField from './components/InputField.vue'

    defineProps({
        customer: Object,
        errors: Object
    })

    const page = usePage()
    
    const form = reactive({
        id               : page.props.customer.id,
        name             : page.props.customer.name,
        email            : page.props.customer.email,
        processing       : false
    })

    const updateForm = () => {
        router.put(`/edit/${form.id}`, form, {
            onStart: () => (form.processing = true),
            onFinish: () => {
                form.processing = false
            }
        })
    }
 
</script>

