
<li class="{{Request::is('login') ? 'active' : ''}}">
    <a class="nav-link pull-right" href="#">Zalogowano jako: {{Auth::User()->name}}</a>
</li>

<li class="">
    <a class="nav-link" href="/logout">Logout</a>
</li>
