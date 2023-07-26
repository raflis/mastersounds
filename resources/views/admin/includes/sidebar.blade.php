<div class="layoutNav shadow" id="#navDesktop">
    <div class="nav-items">
        <div class="sidenav-menu-heading mt-3">Dashboard</div>
        <a class="nav-link @if(Route::currentRouteName()=="admin") active @endif" 
        href="{{ route('admin') }}">
            <i class="fas fa-tachometer-alt text-gray pr-1"></i> Dashboard
        </a>
        <a class="nav-link" target="_blank" 
        href="{{ route('index') }}">
            <i class="fas fa-globe text-gray pr-1"></i> Ver Web
        </a>
        @if (validatePermission('pagefields.logos', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/panel.localetag/", Route::currentRouteName())) active @endif" 
        href="{{ route('panel.localetag') }}">
            <i class="fas fa-home text-gray pr-1"></i> Traducir
        </a>
        @endif

        <div class="sidenav-menu-heading">Páginas</div>
        @if (validatePermission('pagefields.logos', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/pagefields.logos/", Route::currentRouteName())) active @endif" 
        href="{{ route('pagefields.logos') }}">
            <i class="fas fa-home text-gray pr-1"></i> Logos
        </a>
        @endif
        @if (validatePermission('pagefields.home', Auth::user()->permissions) == true)
        
        <a class="nav-link @if(preg_match("/pagefields.home/", Route::currentRouteName()) && Route::current()->parameters()["id"]==1) active @endif" 
        href="{{ route('pagefields.home',1) }}">
            <i class="fas fa-home text-gray pr-1"></i> Inicio [ES]
        </a>
        <a class="nav-link @if(preg_match("/pagefields.home/", Route::currentRouteName()) && Route::current()->parameters()["id"]==2) active @endif" 
        href="{{ route('pagefields.home',2) }}">
            <i class="fas fa-home text-gray pr-1"></i> Inicio [PT]
        </a>
        @endif
        @if (validatePermission('pagefields.social', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/pagefields.social/", Route::currentRouteName())) active @endif" 
        href="{{ route('pagefields.social') }}">
            <i class="fas fa-home text-gray pr-1"></i> Redes sociales
        </a>
        @endif
        @if (validatePermission('pagefields.files', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/pagefields.files/", Route::currentRouteName()) && Route::current()->parameters()["id"]==1) active @endif" 
        href="{{ route('pagefields.files',1) }}">
            <i class="fas fa-home text-gray pr-1"></i> Files Footer [ES]
        </a>
        @endif
        @if (validatePermission('pagefields.files', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/pagefields.files/", Route::currentRouteName()) && Route::current()->parameters()["id"]==2) active @endif" 
        href="{{ route('pagefields.files',2) }}">
            <i class="fas fa-home text-gray pr-1"></i> Files Footer [PT]
        </a>
        @endif

        <div class="sidenav-menu-heading">Sliders</div>
        @if (validatePermission('home_sliders.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/home_sliders/", Route::currentRouteName())) active @endif" 
        href="{{ route('home_sliders.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Inicio
        </a>
        @endif
        @if (validatePermission('solution_sliders.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/solution_sliders/", Route::currentRouteName())) active @endif" 
        href="{{ route('solution_sliders.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Soluciones
        </a>
        @endif
        @if (validatePermission('episode_sliders.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/episode_sliders/", Route::currentRouteName())) active @endif" 
        href="{{ route('episode_sliders.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Episodios
        </a>
        @endif
        @if (validatePermission('post_sliders.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/post_sliders/", Route::currentRouteName())) active @endif" 
        href="{{ route('post_sliders.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Noticias
        </a>
        @endif

        <div class="sidenav-menu-heading">Soluciones</div>
        @if (validatePermission('category_solutions.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/category_solutions/", Route::currentRouteName())) active @endif" 
        href="{{ route('category_solutions.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Categorias
        </a>
        @endif
        @if (validatePermission('item_solutions.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/item_solutions/", Route::currentRouteName())) active @endif" 
        href="{{ route('item_solutions.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Soluciones
        </a>
        @endif

        <div class="sidenav-menu-heading">Episodios</div>
        @if (validatePermission('category_episodes.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/category_episodes/", Route::currentRouteName())) active @endif" 
        href="{{ route('category_episodes.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Categorias
        </a>
        @endif
        @if (validatePermission('item_episodes.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/item_episodes/", Route::currentRouteName())) active @endif" 
        href="{{ route('item_episodes.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Episodios
        </a>
        @endif

        <div class="sidenav-menu-heading">Noticias</div>
        @if (validatePermission('category_posts.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/category_posts/", Route::currentRouteName())) active @endif" 
        href="{{ route('category_posts.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Categorias
        </a>
        @endif
        @if (validatePermission('item_posts.index', Auth::user()->permissions) == true)
        <a class="nav-link @if(preg_match("/item_posts/", Route::currentRouteName())) active @endif" 
        href="{{ route('item_posts.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Noticias
        </a>
        @endif


        @if (validatePermission('posts.index', Auth::user()->permissions) == true)
        <div class="sidenav-menu-heading">Noticias</div>
        <a class="nav-link @if(preg_match("/posts/", Route::currentRouteName())) active @endif" 
        href="{{ route('posts.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Entradas
        </a>
        @endif

        @if (validatePermission('records.index', Auth::user()->permissions) == true)
        <div class="sidenav-menu-heading">Registros</div>
        <a class="nav-link @if(preg_match("/records/", Route::currentRouteName())) active @endif" 
        href="{{ route('records.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Registros
        </a>
        @endif

        {{-- <a class="nav-link @if(in_array(Route::currentRouteName(), array('pagefields.choose'))) active @endif" 
        href="{{ route('pagefields.choose') }}">
            <i class="fas fa-home text-gray pr-1"></i> ¿Porqué elegirnos?
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('pagefields.achievement'))) active @endif" 
        href="{{ route('pagefields.achievement') }}">
            <i class="fas fa-home text-gray pr-1"></i> Nuestros logros
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('partners.index', 'partners.edit', 'partners.create'))) active @endif" 
        href="{{ route('partners.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Partners
        </a>

        <div class="sidenav-menu-heading">Cursos & Insignias</div>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('course_subareas.index', 'course_subareas.edit', 'course_subareas.create'))) active @endif" 
        href="{{ route('course_subareas.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Sub Áreas
        </a>
        <a class="nav-link @if(preg_match("/course_areas|course_categories|courses|topics|badge/", Route::currentRouteName())) active @endif" 
        href="{{ route('course_areas.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Áreas de capacitación
        </a>

        <div class="sidenav-menu-heading">Equipo</div>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('worker_managers.index', 'worker_managers.edit', 'worker_managers.create'))) active @endif" 
        href="{{ route('worker_managers.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Dirección
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('worker_teachers.index', 'worker_teachers.edit', 'worker_teachers.create'))) active @endif" 
        href="{{ route('worker_teachers.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Docentes
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('worker_administrators.index', 'worker_administrators.edit', 'worker_administrators.create'))) active @endif" 
        href="{{ route('worker_administrators.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Administración
        </a>

        <div class="sidenav-menu-heading">Páginas</div>
        <a class="nav-link @if(preg_match("/pagefields.cover_page/", Route::currentRouteName())) active @endif" 
        href="{{ route('pagefields.cover_page') }}">
            <i class="fas fa-home text-gray pr-1"></i> Portadas & títulos
        </a>
        <a class="nav-link @if(preg_match("/pagefields.support/", Route::currentRouteName())) active @endif" 
        href="{{ route('pagefields.support') }}">
            <i class="fas fa-home text-gray pr-1"></i> Soporte
        </a>

        <div class="sidenav-menu-heading">Blog</div>
        <a class="nav-link @if(preg_match("/blog_tags/", Route::currentRouteName())) active @endif" 
        href="{{ route('blog_tags.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Tags
        </a>
        <a class="nav-link @if(preg_match("/blog_categories/", Route::currentRouteName())) active @endif" 
        href="{{ route('blog_categories.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Categorías y Entradas
        </a> --}}

    </div>
    <div class="nav-footer">
        <p>Logueado como:</p>
        <p>{{ ucwords(Auth::user()->name) }} {{ ucwords(Auth::user()->lastname) }}</p>
        <p>{{ getRole(Auth::user()->role) }}</p>
    </div>
</div>