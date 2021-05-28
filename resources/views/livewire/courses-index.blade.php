<div>
    
    <div class="bg-gray-200 py-2 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button wire:click="resetFilters" class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 text-sm mr-4 focus:outline-none">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los cursos
            </button>

            <!-- Dropdown categoria -->
            <div class="relative mr-4" x-data="{ open:false }">
                <button class="block h-12 text-sm rounded-lg overflow-hidden focus:outline-none bg-white shadow px-4 text-gray-700" x-on:click="open = !open">
                    <i class="fas fa-tags text-xs mr-2"></i>
                    Categoría
                    <i class="fas fa-angle-down text-xs ml-2"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl cursor-pointer" x-show="open" x-on:click.away="open = false">   
                    @foreach ($categories as $category)
                        <a class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('category_id',{{$category->id}})" x-on:click="open = false">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>

            <!-- Dropdown niveles -->
            <div class="relative" x-data="{ open:false }">
                <button class="block h-12 text-sm rounded-lg overflow-hidden focus:outline-none bg-white shadow px-4 text-gray-700" x-on:click="open = !open">
                    <i class="fas fa-tags text-xs mr-2"></i>
                    Niveles
                    <i class="fas fa-angle-down text-xs ml-2"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl cursor-pointer" x-show="open" x-on:click.away="open = false">   
                    @foreach ($levels as $level)
                        <a  class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('level_id',{{$level->id}})" x-on:click="open = false">{{$level->name}}</a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
       
        @foreach ($courses->sortByDes('rating') as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $courses->links()}}
    </div>
</div>
