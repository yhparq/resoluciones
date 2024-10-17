<script setup>

import { Inertia } from '@inertiajs/inertia';
import { defineProps } from 'vue';

const props = defineProps({
    headers: Array,
    items: Array,
});

const deleteItem = (id) =>{
    if(confirm('Estas seguro que deseas eliminar el pdf')){
        Inertia.delete(route('pdfs.destrooy', id));
    }
};

</script>

<template>

  <div class="datatable-container">
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th v-for="header in headers" :key="header" class="px-4 py-2">{{ header }}</th>
          <th class="px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.id">
          <td class="border px-4 py-2">{{ item.name }}</td>
          <td class="border px-4 py-2">
            <a :href="`/storage/${item.file_path}`" target="_blank" class="text-blue-500 underline">Ver PDF</a>
          </td>
          <td class="border px-4 py-2">
            <button @click="deleteItem(item.id)" class="text-red-500 underline">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</template>

<style scoped>

    .datatable-container {
    margin: 20px 0;
    }
    .table-auto {
    border-collapse: collapse;
    }
    .table-auto th, .table-auto td {
    border: 1px solid #ddd;
    }

</style>

