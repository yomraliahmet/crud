@extends("main")

@section("content")
    <div class="card">
        <div class="card-header">
            <label>Yeni Kayıt</label>
            <a href="{{ route("crud.index") }}" class="btn btn-primary float-right"><i class="fa fa-chevron-left"></i> Geri</a>
        </div>
        <div class="card-body">
            @include("web.alert")

            <form action="{{ route("crud.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">İsim</label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
                <div class="form-group">
                    <label for="gender">Cinsiyet</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="male">{{ trans("models.students.male") }}</option>
                        <option value="female">{{ trans("models.students.female") }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Resim</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="active" value="1" checked>
                    <label class="form-check-label" for="active">
                        {{ trans("models.students.is_active.1") }}
                    </label>
                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="passive" value="0">
                    <label class="form-check-label" for="passive">
                        {{ trans("models.students.is_active.0") }}
                    </label>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>

        </div>
    </div>
@endsection