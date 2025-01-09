<div class="row">
    <div class="col-lg-12">
        <div class="card border">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="dailyMessageTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dailyMessages as $dailyMessage)
                                    <tr>
                                        <td>{{ $dailyMessage->date }}</td>
                                        <td>{{ $dailyMessage->message }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
