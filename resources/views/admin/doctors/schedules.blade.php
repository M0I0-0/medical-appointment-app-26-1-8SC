<x-admin-layout title="Horarios" :breadcrumbs="[
    [
        'name' => 'Doctores',
        'href' => route('admin.doctors.index'),
    ],
    [
        'name' => 'Horarios',
    ]
]">

    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Gestor de horarios</h2>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar horario
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">DÍA/HORA</th>
                        <th scope="col" class="px-6 py-3">LUNES</th>
                        <th scope="col" class="px-6 py-3">MARTES</th>
                        <th scope="col" class="px-6 py-3">MIÉRCOLES</th>
                        <th scope="col" class="px-6 py-3">JUEVES</th>
                        <th scope="col" class="px-6 py-3">VIERNES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <input type="checkbox" class="mr-2"> 08:00:00
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-2">
                                <div><input type="checkbox" class="mr-1"> Todos</div>
                                <div><input type="checkbox" checked class="mr-1 text-blue-600 focus:ring-blue-500"> 08:00 - 08:15</div>
                                <div><input type="checkbox" class="mr-1"> 08:15 - 08:30</div>
                                <div><input type="checkbox" class="mr-1"> 08:30 - 08:45</div>
                                <div><input type="checkbox" class="mr-1"> 08:45 - 09:00</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-2">
                                <div><input type="checkbox" class="mr-1"> Todos</div>
                                <div><input type="checkbox" checked class="mr-1 text-blue-600 focus:ring-blue-500"> 08:00 - 08:15</div>
                                <div><input type="checkbox" class="mr-1"> 08:15 - 08:30</div>
                                <div><input type="checkbox" class="mr-1"> 08:30 - 08:45</div>
                                <div><input type="checkbox" class="mr-1"> 08:45 - 09:00</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-2">
                                <div><input type="checkbox" class="mr-1"> Todos</div>
                                <div><input type="checkbox" checked class="mr-1 text-blue-600 focus:ring-blue-500"> 08:00 - 08:15</div>
                                <div><input type="checkbox" class="mr-1"> 08:15 - 08:30</div>
                                <div><input type="checkbox" class="mr-1"> 08:30 - 08:45</div>
                                <div><input type="checkbox" class="mr-1"> 08:45 - 09:00</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-2">
                                <div><input type="checkbox" class="mr-1"> Todos</div>
                                <div><input type="checkbox" class="mr-1"> 08:00 - 08:15</div>
                                <div><input type="checkbox" class="mr-1"> 08:15 - 08:30</div>
                                <div><input type="checkbox" class="mr-1"> 08:30 - 08:45</div>
                                <div><input type="checkbox" class="mr-1"> 08:45 - 09:00</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-2">
                                <div><input type="checkbox" class="mr-1"> Todos</div>
                                <div><input type="checkbox" class="mr-1"> 08:00 - 08:15</div>
                                <div><input type="checkbox" class="mr-1"> 08:15 - 08:30</div>
                                <div><input type="checkbox" class="mr-1"> 08:30 - 08:45</div>
                                <div><input type="checkbox" class="mr-1"> 08:45 - 09:00</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>
