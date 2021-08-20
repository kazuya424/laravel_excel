@auth

<div class="navbar navbar-dark bg-success">
    <a class="navbar-brand text-dark" style="font-size:x-large;" href="/">
        顧客管理アプリ
    </a>
    <ul class="list-inline navbar-brand text-dark">
        <li class="list-inline-item" style="flex-direction: row-reverse;">{{ Auth::user()->name }}さん</li>
        <li class="list-inline-item"><a class="nav-link" href="{{ route('logout') }}">ログアウト</a></li>
    </ul>
</div>
@endauth

@guest
<div class="navbar navbar-dark bg-success">
    <a class="navbar-brand text-dark" style="font-size:x-large;" href="/">
        顧客管理アプリ
    </a>
    <ul class="list-inline navbar-brand text-dark">
        <li class="list-inline-item">
        </li>
    </ul>
</div>
@endguest