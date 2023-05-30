<template>
    <span v-if="showMessage" class="text-green-500 mt-6">
        {{ message }}
    </span>
</template>

<script setup>

    defineProps({
        message: {
            type: String,
            required: true
        },
        showMessage: {
            type: Boolean,
            default: true
        }
    })
</script>