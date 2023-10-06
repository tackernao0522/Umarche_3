<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品一覧') }}
        </h2>
        <div>
            <form method="GET" action="{{ route('user.items.index') }}">
                <div class="lg:flex lg:justify-around">
                    <div class="lg:flex items-center">
                        <select name="category" class="mb-2 lg:mb-0 lg:mr-2">
                            <option value="0" {{ \Request::get('category') === '0' ? 'selected' : '' }}>全て
                            </option>
                            @foreach ($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach ($category->secondaries as $secondary)
                                        <option value="{{ $secondary->id }}"
                                            {{ \Request::get('category') == $secondary->id ? 'selected' : '' }}>
                                            {{ $secondary->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <div class="flex space-x-2 items-center">
                            <div><input name="keyword" class="border border-gray-500 py-2" placeholder="キーワードを入力"></div>
                            <div>
                                <button
                                    class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <div>
                            <span class="text-sm">表示順</span><br>
                            <select name="sort" id="sort" class="mr-4">
                                <option value="{{ \Constant::SORT_ORDER['recommend'] }}"
                                    {{ \Request::get('sort') === \Constant::SORT_ORDER['recommend'] ? 'selected' : '' }}>
                                    おすすめ順</option>
                                <option value="{{ \Constant::SORT_ORDER['higherPrice'] }}"
                                    {{ \Request::get('sort') === \Constant::SORT_ORDER['higherPrice'] ? 'selected' : '' }}>
                                    料金の高い順</option>
                                <option value="{{ \Constant::SORT_ORDER['lowerPrice'] }}"
                                    {{ \Request::get('sort') === \Constant::SORT_ORDER['lowerPrice'] ? 'selected' : '' }}>
                                    料金の安い順</option>
                                <option value="{{ \Constant::SORT_ORDER['later'] }}"
                                    {{ \Request::get('sort') === \Constant::SORT_ORDER['later'] ? 'selected' : '' }}>
                                    新しい順</option>
                                <option value="{{ \Constant::SORT_ORDER['older'] }}"
                                    {{ \Request::get('sort') === \Constant::SORT_ORDER['older'] ? 'selected' : '' }}>
                                    古い順</option>
                            </select>
                        </div>
                        <div>
                            <span class="text-sm">表示件数</span><br>
                            <select name="pagination" id="pagination">
                                <option value="20" {{ \Request::get('pagination') === '20' ? 'slected' : '' }}>
                                    20件</option>
                                <option value="50" {{ \Request::get('pagination') === '50' ? 'selected' : '' }}>
                                    50件</option>
                                <option value="100" {{ \Request::get('pagination') === '100' ? 'selected' : '' }}>
                                    100件</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <div class="flex flex-wrap">
                        @foreach ($products as $product)
                            <div class="w-1/4 p-2 md:p-4">
                                <a href="{{ route('user.items.show', $product->id) }}">
                                    <div class="border rounded-md p-2 md:p-4">
                                        <x-thumbnail filename="{{ $product->filename ?? '' }}" type="products" />
                                        <div class="mt-4">
                                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                                {{ $product->category }}
                                            </h3>
                                            <h2 class="text-gray-900 title-font text-lg font-medium">
                                                {{ $product->name }}
                                            </h2>
                                            <p class="mt-1">{{ number_format($product->price) }}<span
                                                    class="text-sm text-gray-700">円(税込)</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->appends([
                            'sort' => \Request::get('sort'),
                            'pagination' => \Request::get('pagination'),
                        ])->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        const select = document.getElementById('sort');
        select.addEventListener('change', function() {
            this.form.submit()
        })

        const paginate = document.getElementById('pagination')
        paginate.addEventListener('change', function() {
            this.form.submit()
        })
    </script>
</x-app-layout>
