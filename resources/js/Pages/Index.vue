<template>
    <div>
        <h1 class="text-white">Tabela de usuários</h1>

        <div class="flex flex-col">
            <Link :href="route('users.create')" class="text-blue-600">Adicionar usuários</Link>

            <form action="#" class="mt-10">
                <input type="text" 
                    v-model="search"
                    placeholder="Busque por um usuário"
                    class="py-2.5 px-3 ml-0 bg-gray-900
                    leading-tight text-gray-500 rounded-l-lg
                    border border-gray-300 text-xs text-white">
                <button @click.prevent="searchUser()" 
                    class="bg-blue-600 hover:bg-blue-700 
                    text-white font-bold p-2.5 text-xs 
                    rounded-r-lg border border-gray-300">
                    Buscar
                </button>
            </form>

            <span v-show="processingSuccess" class="text-green-500">Usuário deletado com sucesso!</span>
        </div>

        <Modal 
            :modal="modal" 
            @closeModal="modal.show = false" 
            @deleteUser="deleteUser(modal.userId)" 
        />

        <table class="border-collapse border border-slate-500 text-white w-96 mt-4 bg-gray-800 animate__animated animate__fadeIn" 
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
                        <Link :href="route('users.edit', customer.id)" class="ml-2 text-xs text-blue-600">Editar</Link>
                        <a href="" class="ml-2 text-xs text-red-600" @click.prevent="openModal(customer.id)">Excluir</a>
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
    import { Link, router } from '@inertiajs/vue3';
    import { ref } from 'vue'
    import Pagination from './components/Pagination.vue'
    import Modal from './components/Modal.vue'

    defineProps({ customers: Object })

    const processingSuccess = ref(false)
    const search = ref('')

    const modal = ref({
        show  : false,
        userId: null,
    });

    const openModal = (userId) => {
        modal.value.show = true;
        modal.value.userId = userId;
    };

    const deleteUser = (id) => {
        router.delete(`/delete/${id}`, {
            onFinish: () => {
                processingSuccess.value = true
                setTimeout(() => {
                    processingSuccess.value = false
                }, 3000)
            }
        })
        modal.value.show = false
    }

    const searchUser = () => {
        router.get('/', {search: search.value})
    }

</script>
