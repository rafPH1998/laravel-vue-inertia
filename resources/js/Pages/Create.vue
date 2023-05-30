<template>
    <div>
        <div class="border-collapse border border-slate-500 p-10 mt-10 rounded-lg bg-gray-800">
            <h1 class="text-white">Criar um novo usuário</h1>

            <form action="" method="POST" class="flex flex-col mt-10">
                <label for="name" class="leading-7 text-sm text-white">Nome</label>
                <input type="text" name="name" class="bg-gray-700 border-collapse border border-slate-500 rounded-lg text-white">
                <span class="text-red-600 text-xs">Erro</span>

                <label for="email" class="leading-7 text-sm text-white">E-mail</label>
                <input type="email" name="email" class="bg-gray-700 border-collapse border border-slate-500 rounded-lg text-white">
                <span class="text-red-600 text-xs">Erro</span>

                <button class="mt-4 text-white bg-blue-700 rounded-full text-xs p-2 hover:bg-blue-800">Salvar</button>
                <Link :href="route('users.index')" class="text-blue-600 flex justify-center text-xs mt-2">Voltar</Link>
            </form>
        </div>
    </div>

</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    components: {
        Link
    }
</script>