<script setup lang="ts">

import {Link, usePage} from "@inertiajs/vue3";
defineProps<{column: App.Data.Column}>();
console.log(usePage().props);
</script>

<template>
    <template v-if="column.sortable">
        <Link :href="'users?sort='+column.sort_key">{{ column.label }}</Link>
    </template>
    <template v-else>
        {{ column.label }}
    </template>
</template>
