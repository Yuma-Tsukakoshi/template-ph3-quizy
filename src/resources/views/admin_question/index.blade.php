<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- web.php -> methodを探す-> Root::resource ->  --}}

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{追加していく}} --}}
                    <div>
                        <h1>一覧表示</h1>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>問題文</th>
                                <th>画像</th>
                                <th>引用文</th>
                            </tr>
                            @foreach ($questions as $question)
                                <tr class="py-5">
                                    <td>{{ $question->id }}</td>
                                    <td><a
                                            href="{{ route('choices.index', ['choice' => $question->id]) }}">{{ $question->content }}</a>
                                    </td>
                                    <td>{{ $question->image }}</td>
                                    <td>{{ $question->supplement }}</td>
                                    <td><a
                                            href="{{ route('questions.edit', ['question' => $question->id]) }}">{{ __('編集') }}</a>
                                            {{-- TODO questionの情報をわたす --}}
                                    </td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('questions.destroy', ['question' => $question->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <a href="{{ route('questions.create') }}">{{ __('新規作成') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
