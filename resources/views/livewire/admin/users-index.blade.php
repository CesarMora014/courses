<div>
    <div class="card">
        <div class="card-header">
            <input type="text" wire:keydown="cleanPage" class="form-control w-100" placeholder="Escriba un nombre" wire:model="search">
        </div>

        @if ($users->count())
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>{{$user->id}}</th>
                                <th>{{$user->name}}</th>
                                <th>{{$user->email}}</th>
                                <th width="10px">
                                    <a href="{{route('admin.users.edit',$user)}}" class="btn btn-primary">Editar</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>

        @else
            <div class="card-body">
                <strong>No se encontraron resultados</strong>
            </div>
        @endif
    </div>
</div>
