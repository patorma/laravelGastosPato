<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de Notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px3-4 sm:px0">
                            <h3 class="text-lg text-gray-900">
                                Listado de notas
                            </h3>
                            <p class="text-sm text-gray-600">
                                Toma el registro correcto correcto y ejecuta
                                cualquier función (ver,editar o eliminar)
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                       <div class="shadow bg-white md:rounded-md p-4">
                            <!-- se alinean izquierda uno y derecha otro -->
                            <div class="flex justify-between">
                                <input type="text" class="form-input rounded-md shadow-sm" placeholder="Buscar..." v-model="q">
                                <inertia-link :href="route('notes.create')" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md">
                                     Crear
                                </inertia-link>
                            </div>
                            <hr class="my-6">
                          
                           <table>
                              <tr v-for="note in notes">
                                 <td class="border px-4 py-2">
                                     {{ note.excerpt}}
                                 </td>
                                 <td class="px-4 py-2">
                                   <inertia-link :href="route('notes.show',note.id)">
                                       Ver
                                   </inertia-link>
                                 </td>
                                 <td class="px-4 py-2">
                                   <inertia-link :href="route('notes.edit',note.id)">
                                      Editar
                                   </inertia-link>
                                 </td>
                              </tr>
                           </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <Paginator :paginator="paginator" /> -->
    </app-layout>
    
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
// import Paginator from "@/Components/Paginator";


export default {
    components: {
        AppLayout,
    },
    props: {
        notes: Array,
        //  paginator: Object,
    },
    data(){
        return {
            q: ''
        }
    },
    watch: {// se observa que pasa en q y se dispara el evento
        q: function (value){
          
            this.$inertia.get(this.route('notes.index',{q: value}),{ preserveState: true })
            // this.$inertia.get(this.route('notes.index', Object.keys(value).length ? q :{q: value}), {}, { preserveState: true })
           
        }
    }
};
</script>
