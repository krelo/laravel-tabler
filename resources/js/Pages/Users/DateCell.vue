<script setup lang="ts">

import {Link, usePage} from "@inertiajs/vue3";
const props = defineProps<{data: App.Data.DateTimeData|null}>();
console.log(props)
</script>

<template>
    <td class="pl-4">
        <template v-if="data">{{data.formatted}}</template>
    </td>   
</template>
