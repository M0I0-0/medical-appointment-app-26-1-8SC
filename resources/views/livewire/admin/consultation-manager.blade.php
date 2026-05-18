<div>
    <!-- Header Info -->
    <div class="bg-white shadow sm:rounded-lg mb-6 p-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $appointment->patient->user->name ?? 'Paciente' }}</h2>
            <p class="text-sm text-gray-500">DNI: {{ $appointment->patient->user->id_number ?? 'N/A' }}</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.patients.edit', $appointment->patient_id) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fa-solid fa-clock-rotate-left mr-2"></i> Ver Historia
            </a>
            <button wire:click="$set('showConsultasModal', true)" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fa-solid fa-list-ul mr-2"></i> Consultas Anteriores
            </button>
        </div>
    </div>

    <!-- Tabs Container -->
    <div class="bg-white shadow sm:rounded-lg p-6">
        <div class="border-b border-gray-200 mb-4">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button wire:click="setTab('consulta')" class="{{ $activeTab === 'consulta' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm flex items-center">
                    <i class="fa-solid fa-stethoscope mr-2"></i> Consulta
                </button>
                <button wire:click="setTab('receta')" class="{{ $activeTab === 'receta' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm flex items-center">
                    <i class="fa-solid fa-file-prescription mr-2"></i> Receta
                </button>
            </nav>
        </div>

        <!-- Consulta Tab -->
        @if($activeTab === 'consulta')
        <div class="space-y-4">
            <div>
                <label for="diagnostico" class="block text-sm font-medium text-gray-700">Diagnóstico</label>
                <textarea wire:model="diagnostico" id="diagnostico" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Describa el diagnóstico del paciente aquí..."></textarea>
                @error('diagnostico') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label for="tratamiento" class="block text-sm font-medium text-gray-700">Tratamiento</label>
                <textarea wire:model="tratamiento" id="tratamiento" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Describa el tratamiento recomendado aquí..."></textarea>
                @error('tratamiento') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="notas" class="block text-sm font-medium text-gray-700">Notas</label>
                <textarea wire:model="notas" id="notas" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Agregue notas adicionales sobre la consulta..."></textarea>
                @error('notas') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        @endif

        <!-- Receta Tab -->
        @if($activeTab === 'receta')
        <div class="space-y-4">
            <div class="flex items-end space-x-2">
                <div class="flex-1">
                    <label class="block text-xs font-medium text-gray-700">Medicamento</label>
                    <input wire:model="nuevoMedicamento" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Ej. Amoxicilina 500mg">
                </div>
                <div class="flex-1">
                    <label class="block text-xs font-medium text-gray-700">Dosis</label>
                    <input wire:model="nuevaDosis" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Ej. 1 cada 8 horas">
                </div>
                <div class="flex-1">
                    <label class="block text-xs font-medium text-gray-700">Frecuencia / Duración</label>
                    <input wire:model="nuevaFrecuencia" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Ej. por 7 días">
                </div>
                <button wire:click="addMedicamento" class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="fa-solid fa-plus"></i> Añadir
                </button>
            </div>
            
            @if($errors->has('nuevoMedicamento') || $errors->has('nuevaDosis') || $errors->has('nuevaFrecuencia'))
                <div class="text-red-500 text-xs">Todos los campos del medicamento son requeridos para añadir.</div>
            @endif

            <div class="mt-4 border border-gray-200 rounded-md">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medicamento</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosis</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frecuencia</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($medicamentos as $index => $med)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $med['nombre'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $med['dosis'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $med['frecuencia'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button wire:click="removeMedicamento({{ $index }})" class="text-red-600 hover:text-red-900"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No hay medicamentos en la receta.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <div class="mt-6 flex justify-end">
            <button wire:click="saveConsultation" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fa-solid fa-lock mr-2"></i> Guardar Consulta
            </button>
        </div>
    </div>

    <!-- Modals -->
    @if($showConsultasModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="$set('showConsultasModal', false)"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Consultas Anteriores</h3>
                        <button wire:click="$set('showConsultasModal', false)" class="text-gray-400 hover:text-gray-500">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    
                    <div class="space-y-4 max-h-96 overflow-y-auto pr-2">
                        @forelse($pastConsultations as $past)
                        <div class="border border-blue-200 rounded-md p-4 bg-blue-50">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-semibold text-blue-800"><i class="fa-regular fa-calendar mr-1"></i> {{ \Carbon\Carbon::parse($past->date)->format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($past->start_time)->format('H:i') }}</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Atendido por: Dr(a). {{ $past->doctor->user->name ?? 'N/A' }}</p>
                            <div class="text-sm">
                                <p><span class="font-semibold text-gray-800">Motivo:</span> {{ $past->reason }}</p>
                                <!-- We don't have separate diagnostico field in db for this task except reason. If they want actual past diagnoses, usually there is a Consultation table, but we use the reason here. -->
                            </div>
                        </div>
                        @empty
                        <p class="text-sm text-gray-500 text-center">No hay consultas anteriores registradas.</p>
                        @endforelse
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="$set('showConsultasModal', false)" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
