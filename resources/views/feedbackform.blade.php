@extends('layouts.app')

@section('content')
    <form method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <div class="col-12 pl-0 mb-3">
        </div>
        <div class="card strpied-tabled-with-hover rounded-0 mb-4">
            <div class="card-body table-full-width table-responsive ">
                <div class="tab-content mt-3" id="nav-tabContent">
                        <div class="tab-pane" id="id-">
                            <div class="form-group col-lg-12 mb-2">
                                <label for="inputTitle-"
                                       class="col-xs-2 control-label"><strong>Назва:</strong></label>
                                <div class="col-xs-8">
                                    <input type="text" name="{" class="form-control"
                                           id="inputTitle-"
                                           placeholder="Введіть назву тендера"
                                           value="{{old( 'title' )}}">
                                    @error('title')
                                    <div class="alert alert-danger mt-2">Введіть назву тендера</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-lg-12 mb-2">
                                <label for="inputDescription-"
                                       class="col-xs-2 control-label"><strong>Опис:</strong></label>
                                <div class="col-xs-8">
                                    <textarea type="text" name="description"
                                              class="form-control summernote"
                                              id="inputDescription-"
                                              rows="10"
                                              placeholder="Введіть опис тендера">
                                        </textarea>
                                    @error(  'description')
                                    <div class="alert alert-danger mt-2">Введіть опис тендера</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <div class="form-group col-5 mt-2 ">
                    <label><strong> Змінити фаїл тендеру:</strong></label>
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
                            <div class="alert alert-danger mt-2">Введіть коректні дані файлу</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 pl-0 d-sm-flex">
            <div class="mr-4 mb-4 ">
                <a class="btn btn-dark px-4" href="#" title="Go back">
                    <small><i class="fas fa-backward "></i> <b>Повернутись</b></small>
                </a>
            </div>
            <div class="form-group pl-0">
                <div class=" pl-0">
                    <button type="submit" class="btn btn-dark px-5">Створити</button>
                </div>
            </div>
        </div>
    </form>

@endsection
