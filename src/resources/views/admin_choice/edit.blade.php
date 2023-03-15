<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- web.php -> methodを探す-> Root::resource ->  --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{追加していく}} --}}
                    <h1>編集</h1>

                    <form method="POST" action="{{route('questions.update',['question' =>$questions->id])}}">
                        @method('PATCH')
                        @csrf

                        <div>
                            問題文
                            <input type="text" name=content value="{{ $questions->content }}">
                        </div>

                        <div>
                            画像
                            <input type="text" name=image value="{{ $questions->image }}">
                        </div>

                        <div>
                            引用文
                            <input type="text" name=supplement value="{{ $questions->supplement }}">
                        </div>


                        <input type="submit" value="更新する">
                        <a href="{{route('questions.index')}}">{{ __('詳細に戻る') }}</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
