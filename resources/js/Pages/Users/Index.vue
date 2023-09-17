<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import TableHead from "./TableHead.vue";
import TextCell from './TextCell.vue';
import DateCell from './DateCell.vue';
import StatusCell from './StatusCell.vue';

const props = defineProps<{
    data: App.Data.UserIndexViewModel;
}>();

const getType = (type: string) => {
    switch (type){
    case 'Status':
        return StatusCell;
    case 'Date':
        return DateCell;
    default:
        return TextCell;
    }
}
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
                <component :is="getType(column.type)" :data="(row[column.key] as never)" v-for="column in data.columns"/>
                </tr>
            </tbody>
        </table>

    </AuthenticatedLayout>
</template>
