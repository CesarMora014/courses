<x-app-layout>
    
    {{-- Portada --}}
    <section class="bg-cover" style="background-image: url({{ asset('img/home/home_1.jpg')}});">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">

                <h1 class="text-white font-bold text-4xl">
                    Domina la tecnología web con MyCompany
                </h1>
                <p class="text-white text-lg mt-2 mb-4">
                    En MyCompany encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web
                </p>
                
                @livewire('search')
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">Contenido</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/home_2.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Cursos y proyectos
                    </h1>
                </header>
                <p class="text-sm text-gray-500">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus quam asperiores aut. Natus quam asperiores aut
                </p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/home_3.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Manual de laravel
                    </h1>
                </header>
                <p class="text-sm text-gray-500">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus quam asperiores aut. Natus quam asperiores aut
                </p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/home_4.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Blog
                    </h1>
                </header>
                <p class="text-sm text-gray-500">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus quam asperiores aut. Natus quam asperiores aut
                </p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/home_5.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Desarrollo web
                    </h1>
                </header>
                <p class="text-sm text-gray-500">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus quam asperiores aut. Natus quam asperiores aut
                </p>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes que curso llevar?</h1>
        <p class="text-center text-white">Dirígete al catalogo de cursos y filtra por categoría o nivel</p>
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catálogo de cursos
            </a>
        </div>
        
    </section>


    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-700">Últimos cursos</h1>
        <p class="text-center text-sm text-gray-500 mb-6">Trabajo duro para seguir subiendo cursos</p>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>