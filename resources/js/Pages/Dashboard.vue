<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import DataTable from '@/Components/DataTable.vue';
    import {
        Head
    } from '@inertiajs/vue3';
    import {
        ref
    } from 'vue';
    import {
        Inertia
    } from '@inertiajs/inertia';

    // Recibimos los PDFs como props desde Laravel/Inertia
    const props = defineProps({
        pdfs: Array
    });

    // Estado del formulario
    const form = ref({
        name: '',
        file: null
    });

    // Manejamos la subida del archivo
    const handleFileUpload = (event) => {
        form.value.file = event.target.files[0];
    };

    // Enviar el formulario
    const submit = () => {
        const formData = new FormData();
        formData.append('numero_resoluction', form.value.numero_resolucion);
        formData.append('nombre_resolucion', form.value.nombre_resolucion);
        formData.append('anio', form.value.anio);
        formData.append('file', form.value.file);

        Inertia.post(route('resoluciones.storage'), formData);
    };

    // Eliminar un PDF
    const deletePdf = (id) => {
        if (confirm('¿Estás seguro de que quieres eliminar este PDF?')) {
            Inertia.delete(route('pdfs.destroy', id));
        }
    };
    console.log(props.pdfs);

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Resoluciones</h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div>
                        <h1 class="py-5 uppercase text-3xl">Subir Resolucion Rectoral</h1>
                        <form @submit.prevent="submit" enctype="multipart/form-data">
                            <input type="text" v-model="form.numero_resolucion" placeholder="Numero">
                            <input type="text" v-model="form.nombre_resolucion" placeholder="Nombre">
                            <input type="number" v-model="form.anio" placeholder="Anio">
                            <input type="file" @change="handleFileUpload">
                            <button type="submit">Subir PDF</button>
                        </form>

                        <h1 class="py-5 uppercase text-3xl">Lista de resoluciones</h1>


                        <DataTable :headers="['Numero', 'Nombre', 'Anio', 'PDF']" :items="pdfs" />

                    </div>

                </div>
            </div>
        </div>
        </template>

    </AuthenticatedLayout>
</template>

