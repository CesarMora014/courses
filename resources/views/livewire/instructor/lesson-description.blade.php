<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descripción de la lección</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea class="form-input w-full" wire:model="description.name"></textarea>
                        @error('descritpion.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button class="btn btn-danger text-sm" wire:click="destroy">Eliminar</button>
                            <button type="submit" class="btn btn-primary text-sm ml-2">Actualizar</button>
                        </div>
                    </form>
                @else
                    <div>
                        <textarea class="form-input w-full" wire:model="name" placeholder="Agrega una descripción de la lección"></textarea>
                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button wire:click="store" class="btn btn-primary text-sm ml-2">Guardar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
