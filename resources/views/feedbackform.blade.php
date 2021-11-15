@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{route('main.feedbackform.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <div class="form-group col-lg-12 mb-2">
            <label for="inputTitle-"
                   class="col-xs-2 control-label"><strong>Тема:</strong></label>
            <div class="col-xs-8">
                <input type="text"
                       style="width: 50%"
                       name="title"
                       class="form-control"
                       id="inputTitle-"
                       placeholder="Заголовок"
                       value="{{old( 'title' )}}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group col-lg-12 mb-2">
            <label for="inputDescription"
                   class="col-xs-2 control-label"><strong>Текст повідомлення:</strong></label>
            <div class="col-xs-8">
                    <textarea type="text"
                              style="width: 50%"
                              name="description"
                              class="form-control"
                              id="inputDescription"
                              rows="10"
                              placeholder="Додайте опис">
                        </textarea>
                @error('description')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group col-5 mt-2 ">
            <label><strong> Прикріпити фаїл:</strong></label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file"
                           class="custom-file-input"
                           name="file"
                           multiple>
                    <label class="custom-file-label" for="customFileLangHTML"
                           data-browse="Обрати файл"
                    > фаїл</label>
                    @error('file')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group pl-0">
            <div class=" pl-0">
                <button type="submit" class="btn btn-dark px-5">Відправити</button>
            </div>
        </div>
    </form>

@endsection
