<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight capitalize">
            {{ __('data kriteria') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium capitalize">
                            {{ __('input data kriteria') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Input biodata kriteria.") }}
                        </p>
                    </header>
                    <form method="POST" action="/category/{{ $category->id }}" class="mt-6 space-y-6">
                        @method('put')
                        @csrf
                        <div class="space-y-2">
                            <x-form.label for="category_name" :value="__('Nama Kriteria')"/>
                            <x-form.input id="category_name" name="category_name" type="text" class="block w-full disabled:bg-gray-200" :value="old('category_name', $category->category_name)" required autofocus autocomplete="category_name" />
                            <x-form.error :messages="$errors->get('category_name')" />
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="weight" :value="__('Bobot')"/>
                            <x-form.input id="weight" name="weight" type="text" class="block w-full" :value="old('weight', $category->weight)" required autofocus autocomplete="weight"/>
                            <x-form.error :messages="$errors->get('weight')" />
                        </div>
    
                        <div class="space-y-2">
                            <x-form.label for="type" :value="__('Tipe')"/>
                            <select name="type" id="type" class="block w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                                <option value="benefit" {{ $category->type == 'benefit' ? 'selected' : '' }}>Benefit</option>
                                <option value="cost" {{ $category->type == 'cost' ? 'selected' : '' }}>Cost</option>
                            </select>
                        </div>
    
                        <div class="flex items-center gap-4">
                            <x-button type="submit">{{ __('Save') }}</x-button>
                        </div>
                    </form>
                </section>             
            </div>
        </div>
    </div>
</x-app-layout>