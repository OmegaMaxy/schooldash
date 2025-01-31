<form action="{{route('classes.store')}}" method="POST">
    @livewire('display-validation-error')
    <x-adminlte-input name="name" label="Class Name" placeholder="Enter class name" fgroup-class="col-md-6"/>
    <x-adminlte-select name="class_group_id" fgroup-class="col-md-6 mx-1" label="Class Group">
        @foreach ($classGroups as $classGroup)
            <option value="{{$classGroup->id}}">{{$classGroup->name}}</option>
        @endforeach
    </x-adminlte-select>
    @csrf
    <x-adminlte-button label="Create" theme="primary" icon="fas fa-key" type="submit"/>
</form>