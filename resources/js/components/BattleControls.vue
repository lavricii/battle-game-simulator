<template>
    <button @click="$emit('run')" :disabled="loading">
        {{ loading ? 'Simulating...' : 'Start Battle' }}
    </button>
</template>

<script setup>
defineProps({
    loading: Boolean
});

defineEmits(['run']);
</script>
