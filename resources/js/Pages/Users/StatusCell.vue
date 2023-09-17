<script setup lang="ts">
import { computed } from "vue";

const props = defineProps<{data: App.Data.StatusData}>();

const classObject = computed(() => ({
    'text-green-600': props.data?.indicator == 'enabled',
    'text-red-600': props.data?.indicator == 'disabled',
}))
</script>

<template>
    <td class="pl-4">
        <template v-if="data">
            <span :class="classObject">{{data.label}}</span>
        </template>
    </td>
</template>
