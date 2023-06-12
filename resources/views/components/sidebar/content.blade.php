<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @can('user')
    <x-sidebar.link title="Pendaftaran" href="/student" :isActive="request()->routeIs('student*')">
        <x-slot name="icon">
            <x-heroicon-o-user-plus class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="Seleksi" href="{{ route('selection') }}" :isActive="request()->routeIs('selection')">
        <x-slot name="icon">
            <x-heroicon-o-user-group class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan
    @can('admin')
    <x-sidebar.link title="Pendaftar" href="/student-list" :isActive="request()->routeIs('student-list*')">
        <x-slot name="icon">
            <x-heroicon-o-user-group class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="Kriteria" href="/category" :isActive="request()->routeIs('category*')">
        <x-slot name="icon">
            <x-heroicon-o-clipboard-document-list class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="Perhitungan" href="{{ route('calculate') }}" :isActive="request()->routeIs('calculate')">
        <x-slot name="icon">
            <x-heroicon-o-calculator class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

</x-perfect-scrollbar>
