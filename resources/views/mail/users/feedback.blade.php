@component('mail::message')
    Получено новое сообщения <br>
От пользователя: {{$feedBack->user->name}}<br>
Почта: {{$feedBack->user->email}}<br>
Тема: {{$feedBack->title}} <br>
Текст: {{$feedBack->description}} <br>
Псилання на закріплений  фаїл: <br>
    {{ $feedBack->file->getUrl() }}




З повагою ,<br>
{{ config('app.name') }}
@endcomponent
