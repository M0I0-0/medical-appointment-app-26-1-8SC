<a class="btn btn-blue text-blue-500 hover:text-blue-700" href="{{ route('admin.appointments.edit', $id) }}" title="Editar">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<form action="{{ route('admin.appointments.destroy', $id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta cita?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-red text-red-500 hover:text-red-700" title="Eliminar">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
<a class="btn btn-green text-green-500 hover:text-green-700" href="{{ route('admin.appointments.consultation', $id) }}" title="Atender Cita">
    <i class="fa-solid fa-stethoscope"></i>
</a>
