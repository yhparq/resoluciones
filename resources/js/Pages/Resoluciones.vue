<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
        <h1 class="text-2xl mb-4">Lista de PDFs Públicos</h1>

        <!-- Usamos el componente DataTable -->
        <DataTable :headers="['Numero', 'Nombre', 'Anio', 'Ver PDf']" :items="pdfs" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import DataTable from '@/Components/DataTable.vue';

// Recibir PDFs como props desde el controlador
const props = defineProps({
  pdfs: Array
});
</script>
