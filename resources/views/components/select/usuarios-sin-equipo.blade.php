<div>
    <label for="idUser" class="form-label">Asignar a</label>
    <select x-model="idUser" id="idUser" class="form-control">
        <option value="" selected disabled>-- Elige un usuario --</option>
        @foreach ($usuarios as $usuario )
            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
        @endforeach
    </select>
</div>
