<x-admin-layout title="Citas" :breadcrumbs="[
    [
        'name' => 'Citas',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Citas',
    ]
]">

    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.appointments.create') }}">
            <i class="fa-solid fa-plus"></i>
            Nuevo
        </x-wire-button>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Paciente</th>
                    <th scope="col" class="px-6 py-3">Doctor</th>
                    <th scope="col" class="px-6 py-3">Fecha</th>
                    <th scope="col" class="px-6 py-3">Hora Inicio</th>
                    <th scope="col" class="px-6 py-3">Hora Fin</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $appointment->id }}</td>
                    <td class="px-6 py-4">{{ $appointment->patient->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $appointment->date }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($appointment->end_time)->format('H:i') }}</td>
                    <td class="px-6 py-4">
                        @if($appointment->status == 1)
                            Programada
                        @else
                            Completada
                        @endif
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        @include('admin.appointments.actions', ['id' => $appointment->id, 'appointment' => $appointment])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>
