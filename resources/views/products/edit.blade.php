<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="mt-6 flex justify-between">
            <h2 class="font-semibold text-xl">Edit Products</h2>
            @include('products.partials.delete-product-form')
        </div>
        
        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $product->foto }}' }">
            <form enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}" method="POST" class="flex gap-8">
                @csrf
                @method('PUT')
                
                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded-md" alt="">
                </div>
                <div class="w-1/2">
                    <div class="mt-2">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input 
                            id="foto" 
                            class="block mt-1 w-full border p-1" 
                            type="file" 
                            accept="image/*"
                            name="foto" 
                            :value="$product->foto"  
                            @change="imageUrl = URL.createObjectURL(event.target.files[0])"
                            />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="$product->nama" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input x-mask:dynamic="$money($input, ',')" id="harga" class="block mt-1 w-full" type="text"  name="harga" :value="$product->harga" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-text-area id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi">{{ $product->deskripsi }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
   </div>
</x-app-layout>
