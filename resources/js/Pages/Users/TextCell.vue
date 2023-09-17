<script setup lang="ts">

import {Link, usePage} from "@inertiajs/vue3";
const props = defineProps<{data: string|number|null}>();
</script>

<template>
    <td class="pl-4">
        {{data}}
    </td>   
</template>
