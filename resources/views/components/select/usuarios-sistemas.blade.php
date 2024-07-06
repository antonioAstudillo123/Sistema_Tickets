<div>
    <label for="asignar" class="form-label">Asignar reporte</label>
    <select x-model="user_id" class="form-control" name="" id="asignar">
        <option disabled selected value="">-- Elige una opción -- </option>
        @foreach ($usuariosSistemas as $usuario )
        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
        @endforeach
    </select>
</div>
