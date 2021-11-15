@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>##</th>
                        <th>Тема</th>
                        <th>Повідомлення</th>
                        <th>Клиент</th>
                        <th> Email Клиента</th>
                        <th>Фаїл</th>
                        <th>Статус</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($feedbacks as $feedback)
                        <form action="{{ route('admin.feedBack.update', $feedback) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->title }}</td>
                                <td>{{ $feedback->description }}</td>
                                <td>{{ $feedback->user->name }}</td>
                                <td>{{ $feedback->user->email }}</td>
                                <td>
                                    @if($feedback->file)
                                        <a href="{{ $feedback->file->getUrl() }}">скачать</a>
                                    @else
                                        <p>Фаїл відсутній</p>
                                    @endif
                                </td>
                                <td>
                                @foreach($statuses as $status)
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="status_id"
                                            id="flexRadioDefault1"
                                            {{$feedback->status->slug == $status->slug  ? 'checked' : ''}}
                                        value="{{$status->id}}"/>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{$status->title}}
                                        </label>
                                    </div>
                                @endforeach
                                <td>
                                    <div class="form-group">
                                        <div class="pl-3">
                                            <button type="submit">Зберегти</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @error('status_id')
                            <tr>
                                <td>
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </td>
                            </tr>
                            @enderror
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

