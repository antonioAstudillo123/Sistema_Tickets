<div>
    <label class="visually-hidden form-label" for="departamentos">Departamento</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fas fa-users"></i></div>
        <select x-model="departamento" class="form-control" name="" id="departamentos">
            <option disabled selected value="">-- Elige una opción -- </option>
            @foreach ($departamentos as $departamento )
                <option value="{{ $departamento->id }}">{{ $departamento->departamento }}</option>
            @endforeach

        </select>
    </div>
</div>
