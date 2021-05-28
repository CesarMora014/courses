<div class="card" x-data="{open:false}">
    <div class="card-body bg-gray-100">
        <header>
            <h1 class="cursor-pointer" x-on:click="open = !open">Recursos de la lección</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">

            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p class="cursor-pointer" wire:click="download"><i class="fas fa-download text-gray-500 mr-2"></i> {{$lesson->resource->url}}</p>
                    <i class="fas fa-trash text-red-500 cursor-pointer" wire:click="destroy"></i>
                </div>
            @else
                
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input type="file" class="form-input flex-1" wire:model="file">
                        <button type="submit" class="btn btn-primary text-sm ml-4">Guardar</button>
                    </div>

                    <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                        Cargando...
                    </div>

                    @error('file')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </form>

            @endif

        </div>

    </div>
</div>