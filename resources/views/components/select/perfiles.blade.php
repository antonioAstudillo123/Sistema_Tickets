<div>
    <label class="visually-hidden form-label">Perfiles</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fas fa-users"></i></div>
        <select x-model="perfil" class="form-control" name="">
            <option disabled selected value="">-- Elige una opción -- </option>
            @foreach ($perfiles as $perfil )
                <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
            @endforeach
        </select>
    </div>
</div>
