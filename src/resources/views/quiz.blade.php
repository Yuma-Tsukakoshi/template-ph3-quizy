<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ITクイズ | POSSE 初めてのWeb制作</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{asset('/assets/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/font.css')}}">
    <script src="{{asset('/assets/js/common.js')}}" defer></script>
    <script src="{{asset('/assets/js/quiz.js')}}" defer></script>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <header id="js-header" class="l-header p-header">
            <div class="p-header__logo"><img src="{{asset('/assets/img/logo.svg')}}" alt="POSSE"></div>
            <button class="p-header__button" id="js-headerButton"></button>
            <div class="p-header__inner">
                <nav class="p-header__nav">
                    <ul class="p-header__nav__list">
                        <li class="p-header__nav__item">
                            <a href="./" class="p-header__nav__item__link">POSSEとは</a>
                        </li>
                        <li class="p-header__nav__item">
                            <a href="." class="p-header__nav__item__link">クイズ</a>
                        </li>
                    </ul>
                </nav>
                <div class="p-header__official">
                    <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer"
                        class="p-header__official__link--line">
                        <i class="u-icon__line"></i>
                        <span class="">POSSE公式LINEを追加</span>
                        <i class="u-icon__link"></i>
                    </a>
                    <a href="" class="p-header__official__link--website">POSSE 公式サイト<i
                            class="u-icon__link"></i></a>
                </div>
                <ul class="p-header__sns p-sns">
                    <li class="p-sns__item">
                        <a href="https://twitter.com/posse_program" target="_blank" rel="noopener noreferrer"
                            class="p-sns__item__link" aria-label="Twitter">
                            <i class="u-icon__twitter"></i>
                        </a>
                    </li>
                    <li class="p-sns__item">
                        <a href="https://www.instagram.com/posse_programming/" target="_blank" rel="noopener noreferrer"
                            class="p-sns__item__link" aria-label="instagram">
                            <i class="u-icon__instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        <!-- /.l-header .p-header -->

        <main class="l-main">
            <section class="p-hero p-quiz-hero">
                <div class="l-container">
                    <h1 class="p-hero__title">
                        <span class="p-hero__title__label">POSSE課題</span>
                        <span class="p-hero__title__inline">ITクイズ</span>
                    </h1>
                </div>
            </section>
            <!-- /.p-hero .p-quiz-hero -->
            <div class="p-quiz-container l-container">
                @foreach($questions as $question)
                <section class="p-quiz-box js-quiz" data-quiz="{{$loop->index}}">
                    <div class="p-quiz-box__question">
                        <h2 class="p-quiz-box__question__title">
                        <span class="p-quiz-box__label">Q{{$loop->iteration}}</span>
                            <span class="p-quiz-box__question__title__text">{{$question->content}}</span>
                        </h2>
                        <figure class="p-quiz-box__question__image">
                            <img src="{{asset('/assets/img/'.$question->image)}}" alt="">
                        </figure>
                    </div>
                    <div class="p-quiz-box__answer">
                        <span class="p-quiz-box__label p-quiz-box__label--accent">A</span>
                        <ul class="p-quiz-box__answer__list">
                            @foreach ($question->choices as $choice)
                            <li class="p-quiz-box__answer__item"><button class="p-quiz-box__answer__button js-answer" data-answer="{{$loop->index}}"
                                data-correct="{{$choice->valid}}">
                                {{ $choice->name }}<i class="u-icon__arrow"></i>
                            </button></li>
                            @endforeach
                        </ul>
                        <div class="p-quiz-box__answer__correct js-answerBox">
                            <p class="p-quiz-box__answer__correct__title   js-answerTitle"></p>
                            <p class="p-quiz-box__answer__correct__content">
                                <span class="p-quiz-box__answer__correct__content__label">A</span>
                                <span class="js-answerText"></span>
                            </p>
                        </div>
                    </div>
                    @unless($question->supplement=='')
                    <cite class="p-quiz-box__note">
                        <i class="u-icon__note"></i>
                        {{$question->supplement}}
                    </cite>
                    @endunless
                </section>
                @endforeach
            </div>
            <!-- /.l-container .p-quiz-container -->
        </main>
        {{-- {{$question}} --}}

        <div class="p-line">
            <div class="l-container">
                <div class="p-line__body">
                    <div class="p-line__body__inner">
                        <h2 class="p-heading -light p-line__title"><i class="u-icon__line"></i>POSSE 公式LINE</h2>
                        <div class="p-line__content">
                            <p>公式LINEにてご質問を随時受け付けております。<br>詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので<br>下記ボタンより友達追加をお願いします！
                            </p>
                        </div>
                        <div class="p-line__footer">
                            <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank"
                                rel="noopener noreferrer" class="p-line__button">LINE追加<i class="u-icon__link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.p-line -->

        <footer class="l-footer p-footer">
            <div class="p-fixedLine">
                <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer"
                    class="p-fixedLine__link">
                    <i class="u-icon__line"></i>
                    <p class="p-fixedLine__link__text"><span class="u-sp-hidden">POSSE</span>公式LINEで<br>最新情報をGET！</p>
                    <i class="u-icon__link"></i>
                </a>
            </div>
            <div class="l-footer__inner">
                <div class="p-footer__siteinfo">
                    <span class="p-footer__logo">
                        <img src="{{asset('/assets/img/logo.svg')}}" alt="POSSE">
                    </span>
                    <a href="https://posse-ap.com/" target="_blank" rel="noopener noreferrer"
                        class="p-footer__siteinfo__link">POSSE公式サイト</a>
                </div>
                <div class="p-footer__sns">
                    <ul class="p-sns__list p-footer__sns__list">
                        <li class="p-sns__item">
                            <a href="https://twitter.com/posse_program" target="_blank" rel="noopener noreferrer"
                                class="p-sns__item__link" aria-label="Twitter">
                                <i class="u-icon__twitter"></i>
                            </a>
                        </li>
                        <li class="p-sns__item">
                            <a href="https://www.instagram.com/posse_programming/" target="_blank"
                                rel="noopener noreferrer" class="p-sns__item__link" aria-label="instagram">
                                <i class="u-icon__instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-footer__copyright">
                <small lang="en">©︎2022 POSSE</small>
            </div>
        </footer>
        <!-- /.l-footer .p-footer -->
    </div>
</body>

</html>
