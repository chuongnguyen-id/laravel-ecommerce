@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" value="{{$menu->name}}" class="form-control" id="menu"
                       placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{$menu->parent_id == 0 ? 'selected' : ''}}>Danh Mục Cha</option>
                    @foreach($menus as $menuParent)
                        <option
                            value="{{$menuParent->id}}"
                            {{$menu->parent_id == $menuParent->id ? 'selected' : ''}}>
                            {{$menuParent->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mô Tả</label>
                <textarea class="form-control" name="description">{{$menu->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea class="form-control" name="content" id="content">{{$menu->content}}</textarea>
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{$menu->active == 1 ? 'checked' : ''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{$menu->active == 0 ? 'checked' : ''}}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
