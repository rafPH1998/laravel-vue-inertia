<template>
    <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px mt-4">
            <li>
                <Link 
                    :disabled="data.prev_page_url == null"
                    :href="data.prev_page_url" as="button"
                    class="py-2 px-3 ml-0 leading-tight text-gray-500 rounded-l-lg 
                    border border-gray-300 hover:bg-gray-700 dark:bg-gray-800 
                    dark:border-gray-700 dark:text-gray-400 text-xs text-white
                    dark:hover:bg-gray-700 dark:hover:text-white">Anterior
                </Link>
            </li>
            <li>
                <Link
                    v-for="link in links" :key="link.label"
                    :href="link.url" as="button"
                    :class="{ 'text-blue-500 bg-gray-700': link.active }"
                    class="py-2 px-3 leading-tight text-gray-500 border 
                    border-gray-300 hover:bg-gray-700 dark:bg-gray-800 
                    dark:border-gray-700 dark:text-gray-400 text-xs text-white
                    dark:hover:bg-gray-700 dark:hover:text-white">
                    {{ link.label }}
                </Link>
            </li>
            <li>
                <Link 
                    :disabled="data.next_page_url == null" 
                    :href="data.next_page_url" as="button"
                    class="py-2 px-3 ml-0 leading-tight text-gray-500 
                    rounded-r-lg border border-gray-300 hover:bg-gray-700
                    dark:bg-gray-800 dark:border-gray-700 text-xs text-white
                    dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Próximo
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue'

    defineProps({
        data: Object,
    })

    const page = usePage()

    const links = computed(() => {
        const cleanLinks = [...page.props.customers.links];
        cleanLinks.shift();
        cleanLinks.pop();
        return cleanLinks;
    });

</script>