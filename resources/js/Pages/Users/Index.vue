<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import TableHead from "./TableHead.vue";
const props = defineProps<{
    data: App.Data.UserIndexViewModel;
}>();
   console.log(props.data);
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
        </template>
        <table>
            <thead>
            <tr>
                <th class="ml-10 p-4" v-for="column in data.columns">
                    <TableHead :column="column" />
                </th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="row in data.collection.data">
                    <td class="pl-4" v-for="column in data.columns">
                        {{row[column.key]}}
                    </td>
                </tr>
            </tbody>
        </table>

    </AuthenticatedLayout>
</template>
