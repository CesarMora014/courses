<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line mr-2"></i>Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class="fas fa-tags mr-2"></i>Categoría: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users mr-2"></i>Matriculados: {{$course->students_count}}</p>
                <p class="mb-2"><i class="far fa-star mr-2"></i>Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6 pb-12">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-700 mr-2"></i> {{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section>
                <h1 class="font-bold text-3xl mb-2">Temario</h1>
                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow"  x-data="{ open: {{($loop->first)? 'true ':'false' }} }">
                        <header  x-on:click="open = !open" class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200">
                            <h2 class="font-bold text-lg text-gray-600" >{{$section->name}}</h2>
                        </header>
                        <div x-show="open" class="bg-white py-2 px-4 ">
                            <ul class="grid grid-col-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base mb-2"><i class="fas fa-play-circle mr-2 text-gray-600"></i> {{$lesson->name}}</li>
                                @endforeach
                            </ul>

                        </div>
                    </article>
                @endforeach
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl text-gray-800">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @endforeach
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl text-gray-800">Descripción</h1>
                <div class=" text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>

            @livewire('course-reviews', ['course' => $course])

        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">
                                Prof: {{$course->teacher->name}}
                            </h1>
                            <a class="text-blue-700 text-sm" href="">{{'@'.Str::slug($course->teacher->name,'')}}</a>
                        </div>
                    </div>
                    @can('is_enrolled', $course)
                        <a href="{{route('courses.status',$course)}}" class="btn btn-primary btn-block mt-4">Continuar con el curso</a>
                    @else

                        @if ($course->price->value == 0)
                            <p class="text-2xl font-bold text-gray-500 mb-2 mt-3">
                                Gratis
                            </p>
                            <form action="{{route('courses.enrolled',$course)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block">Inscribirse</button>
                            </form>
                        @else
                            <p class="text-2xl font-bold text-gray-500 mb-2 mt-3">
                                US$ {{$course->price->value}}
                            </p>
                            <a href="{{route('payment.checkout',$course)}}" class="btn btn-danger btn-block">Comprar curso</a>
                        @endif

                    @endcan
                    
                </div>
            </section>
            <aside class="hidden lg:block">
                @foreach ($similar as $similary)
                    <article class="flex mb-6">
                        <img class="h-32 w-40" src="{{ Storage::url($similary->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3" href="{{route('courses.show',$similary)}}">{{ Str::limit($similary->title,40)}}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similary->teacher->profile_photo_url}}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{$similary->teacher->name}}</p>
                            </div>

                            <p class="text-sm">
                                <i class="fas fa-star mr-2 text-yellow-400">{{$similary->rating}}</i>
                            </p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>

</x-app-layout>