<template>
    <div>
        <h1 class="text-white">Tabela de usuários</h1>
    
        <div class="flex flex-col">
            <Link :href="route('users.create')" class="text-blue-600">Adicionar usuários</Link>

            <alert-message :message="getMessage" :show-message="showMessage" />
        </div>

        <table class="border-collapse border border-slate-500 text-white w-96 mt-6 bg-gray-800" 
            v-if="customers.data.length !== 0">
            <thead class="bg-gray-700">
                <tr>
                    <th class="border border-slate-600">ID</th>
                    <th class="border border-slate-600">Nome</th>
                    <th class="border border-slate-600">E-mail</th>
                    <th class="border border-slate-600">Ações</th>
                </tr>
            </thead>
            <tbody v-for="customer in customers.data" :key="customer.id">
                <tr class="text-center p-4">
                    <td class="border border-slate-700 p-4">{{ customer.id }}</td>
                    <td class="border border-slate-700 p-4">{{ customer.name }}</td>
                    <td class="border border-slate-700 p-4">{{ customer.email }}</td>
                    <td class="border border-slate-700 p-4">
                        <a href="" class="ml-2 text-xs text-blue-600">Editar</a>
                        <a href="" class="ml-2 text-xs text-red-600">Excluir</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else class="mt-10 text-white">
            Sem nenhum usuário no sistema.
        </div>
    </div>
    <Pagination :data="customers"/>
    
</template>

<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import { computed, ref } from 'vue'
    import AlertMessage from './components/AlertMessage.vue'
    import Pagination from './components/Pagination.vue'

    defineProps({ customers: Object })

    const page = usePage()
    const getMessage = computed(() => page.props.flash.success)
    const showMessage = ref(true)

    setTimeout(() => {
        showMessage.value = false
    }, 3000)

</script>