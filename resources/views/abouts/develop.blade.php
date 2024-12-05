<div class="row">
    <div class="col-lg-12">
        <div class="card border">
            <div class="card-header">
                <i class="mdi mdi-account-circle display-6"></i>
            </div>
            <div class="card-body">
                @php
                    $groupedFiturCodings = $fiturCodings->groupBy('judul');
                @endphp

                @foreach ($groupedFiturCodings as $judul => $items)
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <i data-feather="check-circle" class="text-success icon-dual-success icon-xs"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5>{{ $judul }}</h5>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <th>Contoh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $index => $item)
                                        <tr>
                                            <td width="50%">{{ $item->deskripsi }}</td>
                                            <td>{{ $item->contoh }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
