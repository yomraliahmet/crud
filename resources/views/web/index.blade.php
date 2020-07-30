@extends("main")

@section("content")
        <div class="card">
            <div class="card-header">
                <label>Laravel CRUD</label>
                <a href="{{ route("crud.create") }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Yeni Ekle</a>
            </div>
            <div class="card-body">
                @include("web.alert")
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Resim</th>
                        <th scope="col">Ad</th>
                        <th scope="col">Cinsiyet</th>
                        <th scope="col">Durum</th>
                        <th scope="col" style="width: 150px;">İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $key => $student)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>
                                    @if($student->image != null)
                                        <img style="width: 100px;" src="{{ url("/uploads/images/")."/".$student->image }}" />
                                    @else
                                        {{ $student->image }}
                                    @endif
                                </td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->is_active }}</td>
                                <td>
                                    <a href="{{ route("crud.show",[$student->id]) }}" class="btn btn-primary btn-sm mr-2"><i class="fa fa-search"></i></a>
                                    <a href="{{ route("crud.edit",[$student->id]) }}" class="btn btn-success btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route("crud.destroy",[$student->id]) }}" class="btn btn-danger btn-sm mr-2" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="Are you sure?"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection