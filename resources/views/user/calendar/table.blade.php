@extends('user.calendar.register')

@section('register')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('user.calendar.store') }}" method="post">
                @csrf
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class=" table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Thứ 2</th>
                                            <th>Thứ 3</th>
                                            <th>Thứ 4</th>
                                            <th>THứ 5</th>
                                            <th>Thứ 6</th>
                                            <th>Thứ 7</th>
                                            <th>Chủ nhật</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sáng</td>
                                            @for ($i = 0; $i <= 6; $i++)
                                                <td>
                                                    {{ Form::hidden("day1s[$i]", 0, ['id' => 'hidden-input-1-' . $i]) }}
                                                    {{ Form::checkbox("day1s[$i]", 1, false, ['id' => 'checkbox-1-' . $i, 'class' => 'checkboxe1s form-control']) }}
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Chiều</td>
                                            @for ($i = 0; $i <= 6; $i++)
                                                <td>
                                                    {{ Form::hidden("day2s[$i]", 0, ['id' => 'hidden-input-2-' . $i]) }}
                                                    {{ Form::checkbox("day2s[$i]", 1, false, ['id' => 'checkbox-2-' . $i, 'class' => 'checkboxe2s form-control']) }}
                                                </td>
                                            @endfor
                                        </tr>
                                        <tr>
                                            <td>Tối</td>
                                            @for ($i = 0; $i <= 6; $i++)
                                                <td>
                                                    {{ Form::hidden("day3s[$i]", 0, ['id' => 'hidden-input-3-' . $i]) }}
                                                    {{ Form::checkbox("day3s[$i]", 1, false, ['id' => 'checkbox-3-' . $i, 'class' => 'checkboxe3s form-control']) }}
                                                </td>
                                            @endfor
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-success">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
