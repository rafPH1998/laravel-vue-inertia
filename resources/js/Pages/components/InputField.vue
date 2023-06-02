<template>
   <label :for="name" class="leading-7 text-sm text-white">{{ label }}</label>
    <input 
        :modelValue="modelValue"
        :type="type" 
        :value="modelValue"
        :name="name" 
        :id="name" 
        @input="$emit('update:modelValue', $event.target.value)"
        class="bg-gray-700 border-collapse border border-slate-500 rounded-lg text-white px-4 py-1">
    <span class="text-red-600 text-xs" v-if="error">{{ error }}</span>
</template>
  
<script setup>
     defineProps({
        label: {
            type: String,
            required: true,
        },
        modelValue: {
            type: String,
            required: true,
        },
        name: {
            type: String,
            required: true,
        },
        value: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            default: 'text',
        },
        error: {
            type: String
        },
    })
</script>