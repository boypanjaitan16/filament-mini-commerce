<header class="fixed inset-x-0 top-0 bg-white border-b md:px-32">
    <div class="flex flex-col py-3 bg-white md:flex-row md:space-x-5 lg:space-x-16">
        <div class="flex items-center">
            <span class="text-xl font-semibold">{{ config('app.name')}}</span>
        </div>
        <div class="relative flex flex-row items-center flex-grow">
            <input type="search" placeholder="Search for products" class="w-full px-3 py-1.5 border-[2px] border-gray-300 rounded-md placeholder:text-sm" />
            <button class="absolute px-5 py-1 text-white rounded-md right-1.5 bg-primary">
                Search
            </button>
        </div>
        <div x-data="{ showLogin: false, showSignUp: false }">
            <div class="flex flex-row items-center space-x-3">
                <button x-on:click="showLogin = true; document.getElementById('body').classList.add('overflow-hidden')" class="px-5 py-1.5 font-semibold bg-white border-2 rounded-full border-primary text-primary">
                    Login
                </button>
                <button x-on:click="showSignUp = true; document.getElementById('body').classList.add('overflow-hidden')" class="px-5 py-1.5 font-semibold text-white border rounded-full border-primary bg-primary">
                    Sign Up
                </button>
            </div>
            <div x-show="showLogin" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
                <div class="flex flex-col w-full md:w-[50%] lg:w-[35%]">
                    <div class="flex flex-row justify-end p-5 bg-white md:pb-2 md:px-0 md:bg-transparent">
                        <button x-on:click="showLogin = false; document.getElementById('body').classList.remove('overflow-hidden')" class="md:text-white">Close</button>
                    </div>
                    <livewire:components.login-form />
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row space-x-10">
        <div x-data="{ showCategoriesByButton: false, showCategoriesByContainer: false }">
            <button class="px-3 py-1 bg-gray-100 rounded-t" x-on:mouseenter="showCategoriesByButton = true" x-on:mouseleave="showCategoriesByButton = false">
                Categories
            </button>
            <div x-show="showCategoriesByButton || showCategoriesByContainer" x-transition class="absolute inset-x-0 py-1 md:px-32">
                <div x-on:mouseenter="showCategoriesByContainer = true" x-on:mouseleave="showCategoriesByContainer = false" class="flex flex-row p-5 bg-white border rounded shadow">
                    <nav class="lg:w-44">
                        <ul class="flex flex-col space-y-1">
                        @foreach ($categories as $category)
                            <li class="block px-3 py-1.5 hover:bg-gray-200 rounded cursor-pointer">
                                {{ $category->name }}
                            </li>
                        @endforeach
                        </ul>
                    </nav>
                    <div class="flex-grow pl-5 ml-5 border-l">
                    </div>
                </div>
            </div>
        </div>
        <nav class="flex-grow"></nav>
        <div x-data="{ showAddressForm: false }">
            <button class="px-3 py-1 bg-gray-100 rounded-t" x-on:click="showAddressForm = true; document.getElementById('body').classList.add('overflow-hidden')">
                Add your address for better experience
            </button>
            <div x-show="showAddressForm" x-transition class="fixed inset-0 z-50 flex items-center justify-center overflow-y-scroll bg-black bg-opacity-75">
                <div class="flex flex-col w-full md:w-[60%] lg:w-[45%]">
                    <div class="flex flex-row justify-end p-5 bg-white md:pb-2 md:px-0 md:bg-transparent">
                        <button x-on:click="showAddressForm = false; document.getElementById('body').classList.remove('overflow-hidden')" class="md:text-white">Close</button>
                    </div>
                    <livewire:components.create-address-form />
                </div>
            </div>
        </div>
    </div>
</header>
