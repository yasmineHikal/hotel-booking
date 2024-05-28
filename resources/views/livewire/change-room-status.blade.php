<div>
    <select  wire:model.lazy="selectedValue"  class="form-select">
        @foreach ($available_status as $id => $name)
            <option class="form-select " value="{{ $id }}" {{ $selectedValue == $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>
