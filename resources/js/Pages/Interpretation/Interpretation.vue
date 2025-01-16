<script setup>
import UserLayouts from "@/Pages/User/Layouts/UserLayouts.vue";
import { Head, router } from "@inertiajs/vue3";

</script>

<template>
        <Head title="Interpretación" />
        <UserLayouts>
            <div class="p-5 mt-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Interpretación
            </h2>
        </div>
        <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
    <div class="p-6 border-b border-gray-200">
        <table class="min-w-full border-collapse border border-gray-200">
            <!-- Cabecera -->
            <thead>
                <tr>
                    <th class="border border-gray-200 bg-gray-100 p-4 text-left text-lg text-gray-700">Percentil</th>
                    <th class="border border-gray-200 bg-gray-100 p-4 text-left text-lg text-gray-700">Puntuación por dimensión</th>
                    <th class="border border-gray-200 bg-gray-100 p-4 text-left text-lg text-gray-700">Puntuación Total</th>
                    <th class="border border-gray-200 bg-gray-100 p-4 text-left text-lg text-gray-700">Interpretación</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody>
                <tr class="bg-green-200 text-green-800 hover:bg-green-100">
                    <td class="border border-gray-200 p-4">95-100</td>
                    <td class="border border-gray-200 p-4">De 60 a 70</td>
                    <td class="border border-gray-200 p-4">240-280</td>
                    <td class="border border-gray-200 p-4 font-bold">Excelente</td>
                </tr>
                <tr class="bg-blue-200 text-blue-800 hover:bg-blue-100">
                    <td class="border border-gray-200 p-4">80-94</td>
                    <td class="border border-gray-200 p-4">De 48 a 60</td>
                    <td class="border border-gray-200 p-4">196-239</td>
                    <td class="border border-gray-200 p-4 font-bold">Muy bueno</td>
                </tr>
                <tr class="bg-purple-200 text-purple-800 hover:bg-purple-100">
                    <td class="border border-gray-200 p-4">60-79</td>
                    <td class="border border-gray-200 p-4">De 36 a 48</td>
                    <td class="border border-gray-200 p-4">168-195</td>
                    <td class="border border-gray-200 p-4 font-bold">Bueno</td>
                </tr>
                <tr class="bg-yellow-200 text-yellow-800 hover:bg-yellow-100">
                    <td class="border border-gray-200 p-4">40-59</td>
                    <td class="border border-gray-200 p-4">De 24 a 36</td>
                    <td class="border border-gray-200 p-4">140-167</td>
                    <td class="border border-gray-200 p-4 font-bold">Regular</td>
                </tr>
                <tr class="bg-orange-200 text-orange-800 hover:bg-orange-100">
                    <td class="border border-gray-200 p-4">20-39</td>
                    <td class="border border-gray-200 p-4">De 12 a 24</td>
                    <td class="border border-gray-200 p-4">112-139</td>
                    <td class="border border-gray-200 p-4 font-bold">Deficiente</td>
                </tr>
                <tr class="bg-red-200 text-red-800 hover:bg-red-100">
                    <td class="border border-gray-200 p-4">0-19</td>
                    <td class="border border-gray-200 p-4">De 0 a 12</td>
                    <td class="border border-gray-200 p-4">40-111</td>
                    <td class="border border-gray-200 p-4 font-bold">Muy deficiente</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        </UserLayouts>
</template>