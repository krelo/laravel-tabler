<script setup lang="ts">

import {Link, usePage} from "@inertiajs/vue3";
defineProps<{column: App.Data.Column<any>}>();
</script>

<template>
    <template v-if="column.sortable">
        <Link :href="column.sort_url">{{ column.label }}</Link>
        <span v-if="column.sort_direction == 'ASC'"> ^</span>
        <span v-if="column.sort_direction == 'DESC'"> v</span>
    </template>
    <template v-else>
        {{ column.label }}
    </template>
</template>
