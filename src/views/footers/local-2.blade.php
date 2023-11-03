<footer class="py-10 bg-gray-800">
    <div class="px-4 text-white lg:px-16">
        <div class="-mx-2 flex flex-wrap justify-between space-y-8 lg:space-y-0">
            <div class="w-full px-2 lg:w-auto">
                <a
                    class="inline-block hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-400"
                    href="{{ $logoUrl }}"
                >
                    {{ $logo }}
                </a>

                @isset($address)
                    <address class="mt-4 text-sm not-italic">
                        {{ $address }}
                    </address>
                @endisset

                @isset($phone)
                    <div class="mt-8 text-sm">
                        {{ $phone }}
                    </div>
                @endisset
            </div>

            @foreach($links as $link)
                <div class="w-1/2 px-2 flex flex-col md:w-1/2 lg:w-auto">

                    @isset($link['href'])
                        <a href="{{ $link['href'] }}">
                            <h3 class="font-bold">
                                {{ data_get($link, 'text', '') }}
                            </h3>
                        </a>
                    @else
                        <h3 class="font-bold">
                            {{ data_get($link, 'text', '') }}
                        </h3>
                    @endisset

                    @foreach(data_get($link, 'children', []) as $child)
                        <a
                            class="mt-2 text-sm text-gray-300 hover:text-gray-400 focus:outline-none focus:ring focus:ring-blue-400"
                            href="{{ data_get($child, 'href', '#') }}"
                        >
                            {{ data_get($child, 'text', '') }}
                        </a>
                    @endforeach
                </div>
            @endforeach

            <div class="w-full px-2 flex flex-col lg:w-auto">
                @if(isset($form) && is_array($form))
                    <form 
                        action="{{ data_get($form, 'action', '#') }}" 
                        class="max-w-sm"
                    >
                        <h3 class="font-bold">
                            {{ data_get($form, 'title', '') }}
                        </h3>

                        <p class="mt-2 text-sm">
                            {{ data_get($form, 'description', '') }}
                        </p>

                        <div class="mt-4">
                            <label for="footer-form-input" class="sr-only">
                                {{ data_get($form['input'], 'label', '') }}
                            </label>

                            <div class="flex items-stretch">
                                <input 
                                    id="footer-form-input" 
                                    type="{{ data_get($form['input'], 'type', 'text') }}" 
                                    class="text-gray-600 border-transparent bg-gray-200 lg:text-sm focus:bg-white" 
                                    placeholder="{{ data_get($form['input'], 'placeholder', '') }}"
                                >
                                <button class="btn text-white border-transparent bg-red-600 hover:bg-red-800">
                                    {{ data_get($form['input'], 'submit', 'Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    {{ $form }}
                @endif

                @if (is_array($socialLinks))
                    <div class="mt-8 -mx-2 flex flex-wrap items-center text-xs divide-x divide-gray-200">
                        @foreach ($socialLinks as $link)
                            <a 
                                class="
                                    px-2 hover:text-gray-300 
                                    focus:outline-none focus:ring focus:ring-blue-400
                                    {{ !$loop->last ? 'border-gray-500 border-r' : '' }}
                                " 
                                href="{{ data_get($link, 'href', '#') }}"
                            >
                                {{ data_get($link, 'text', '#') }}
                            </a>                            
                        @endforeach
                    </div>
                @else
                    {{ $socialLinks }}
                @endif
            </div>
        </div>
    </div>
</footer>