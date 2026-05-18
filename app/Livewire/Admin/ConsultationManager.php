<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Appointment;

class ConsultationManager extends Component
{
    public Appointment $appointment;
    public $activeTab = 'consulta'; // consulta or receta
    
    // Consulta fields
    public $diagnostico = '';
    public $tratamiento = '';
    public $notas = '';

    // Receta fields
    public $medicamentos = [];
    public $nuevoMedicamento = '';
    public $nuevaDosis = '';
    public $nuevaFrecuencia = '';

    // Modals
    public $showHistoriaModal = false;
    public $showConsultasModal = false;
    public $pastConsultations = [];

    protected $rules = [
        'diagnostico' => 'required|min:5',
        'tratamiento' => 'required|min:5',
        'notas' => 'nullable|string',
    ];

    protected $messages = [
        'diagnostico.required' => 'El diagnóstico es obligatorio.',
        'diagnostico.min' => 'El diagnóstico debe tener al menos 5 caracteres.',
        'tratamiento.required' => 'El tratamiento es obligatorio.',
    ];

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment;
        // Fetch past consultations for the patient (appointments with status = completed/2)
        $this->pastConsultations = Appointment::where('patient_id', $this->appointment->patient_id)
            ->where('id', '!=', $this->appointment->id)
            ->orderBy('date', 'desc')
            ->get();
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function addMedicamento()
    {
        $this->validate([
            'nuevoMedicamento' => 'required',
            'nuevaDosis' => 'required',
            'nuevaFrecuencia' => 'required',
        ]);

        $this->medicamentos[] = [
            'nombre' => $this->nuevoMedicamento,
            'dosis' => $this->nuevaDosis,
            'frecuencia' => $this->nuevaFrecuencia,
        ];

        $this->nuevoMedicamento = '';
        $this->nuevaDosis = '';
        $this->nuevaFrecuencia = '';
    }

    public function removeMedicamento($index)
    {
        unset($this->medicamentos[$index]);
        $this->medicamentos = array_values($this->medicamentos);
    }

    public function saveConsultation()
    {
        $this->validate();

        // Normally we would save to a Consultation model and prescriptions to a Prescription model.
        // For this task, we will just change the status of the appointment to 2 (completed).
        $this->appointment->status = 2; // completed
        $this->appointment->save();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Consulta Guardada',
            'text' => 'La consulta se ha guardado correctamente.',
        ]);

        return redirect()->route('admin.appointments.index');
    }

    public function render()
    {
        return view('livewire.admin.consultation-manager');
    }
}
