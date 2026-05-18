<x-admin-layout title="Doctores" :breadcrumbs="[
    [
        'name' => 'Doctores',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Doctores',
    ]
]">

    <x-slot name="action">
        <x-wire-button blue href="#">
            <i class="fa-solid fa-plus"></i>
            Nuevo
        </x-wire-button>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Especialidad</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $doctor->id }}</td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $doctor->user->name }}
                    </th>
                    <td class="px-6 py-4">{{ $doctor->user->email }}</td>
                    <td class="px-6 py-4">{{ $doctor->specialty }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.doctors.schedules', $doctor) }}" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 text-center" title="Horarios">
                            <i class="fa-solid fa-clock"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>
