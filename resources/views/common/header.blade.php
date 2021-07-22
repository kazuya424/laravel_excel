@auth
    <nav class="navbar navbar-dark bg-warning">
        <a class="navbar-brand text-dark" href="/" style="font-size:x-large;">全国特産品ECサイト</a>
        <ul class="list-inline navbar-brand-01 text-dark">
            <ul class="list-inline navbar-brand text-dark">
                <li class="navbar bg-faded text-right" style="flex-direction: row-reverse;">{{ Auth::user()->fullName }}さん</li>
                @if(auth()->user()->user_classification_id === 2)
                <li class="list-inline-item"><a class="nav-link" href="{{ route('product.create') }}">商品登録</a></li>
                @endif
                <li class="list-inline-item"><a class="nav-link" href="{{ route('product.index') }}">商品検索</a></li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('cart.index') }}">カート</a></li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('order.all',['all' => 'all']) }}">注文履歴</a></li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('user.show', ['id' => Auth::id()])}}">ユーザー情報</a></li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('logout') }}">ログアウト</a></li>
            </ul>
        </ul>
    </nav>
@endauth

@guest
    <div class="navbar navbar-dark bg-success">
        <a class="navbar-brand text-dark" style="font-size:x-large;" href="/">
        顧客管理アプリ
        </a>
        <ul class="list-inline navbar-brand text-dark">
            <li class="list-inline-item">
                <a class="nav-link" href="">ログアウト</a>
            </li>
        </ul>
    </div>
@endguest
