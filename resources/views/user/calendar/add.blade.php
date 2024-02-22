<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body table-responsive p-0">
                @foreach ($calendars as $calendar)
                    @if ($calendar->is_calendar_enabled)
                        <div class="row">
                            @foreach ($data as $item)
                                <div class="col ">
                                    <ul class=" list-unstyled text-center border">
                                        <li class="border">{{ $item['day'] }}</li>
                                        <li class="border"><input type="checkbox" name="" id=""></li>
                                        <li class="border"><input type="checkbox" name="" id=""></li>
                                        <li class="border"><input type="checkbox" name="" id=""></li>
                                        <li class="border"><input type="checkbox" name="" id=""></li>
                                        <li class="border"><input type="checkbox" name="" id=""></li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @else
                        ''
                    @endif
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
