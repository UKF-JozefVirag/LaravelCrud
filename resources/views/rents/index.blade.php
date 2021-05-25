@extends('layouts.app')

@section('title')
    Rents
@endsection

@section('tst')


@endsection

@section('content')



    <div class="d-flex">
        <div class="p-2">
            <a class="btn btn-md btn-primary" href="{{ route('rents.create') }}">Create</a>
        </div>
        <div class="ms-auto p-2">
            <button id="export-btn" class="btn btn-sm btn-success">Export to xlsx <i class="bi bi-file-spreadsheet"></i>
            </button>
        </div>
        <div class="p-2">
            <button id="export-btn-csv" class="btn btn-sm btn-success">Export to csv <i
                    class="bi bi-file-earmark-spreadsheet"></i></button>
        </div>
        <div class="p-2">
            <button id="export-btn-pdf" class="btn btn-sm btn-danger">Export to pdf <i
                    class="bi bi-file-earmark-pdf"></i></button>
        </div>
    </div>
    <table id="datatable" class="table table-striped display">
        <thead>
        <tr>
            <th scope="col" class="th-sm">#</th>
            <th scope="col" class="th-sm">From</th>
            <th scope="col" class="th-sm">To</th>
            <th scope="col" class="th-sm">Sportsground</th>
            <th scope="col" class="th-sm">Customer</th>
            <th scope="col" class="th-sm">Price</th>
            <th scope="col" class="th-sm">Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rents as $rent)
            <tr>
                <th scope="row"> {{$rent->id}} </th>
                <td> {{$rent->from}} </td>
                <td> {{$rent->to}} </td>
                <td> {{$rent->sTitle}} </td>
                <td> {{$rent->full_name}} </td>
                <td> {{$rent->price}} €</td>
                <td> {{$rent->created_at}}</td>
                <td>
                    <a href="{{ route('rents.edit', $rent->id) }}" class="btn btn-sm btn-success"><i
                            class="bi bi-pencil"></i></a>
                    <form method="post" action="{{ route('rents.destroy', $rent->id) }}" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $rents->links() }}
    </div>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('js/table2excel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/table2CSV.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/TableCSVExporter.js') }}" type="text/javascript"></script>


    <script>
        document.getElementById('export-btn').addEventListener('click', function () {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll("#datatable"), "rents");
        });

        const table = document.getElementById("datatable");
        const btnExportToCsv = document.getElementById("export-btn-csv");
        btnExportToCsv.addEventListener("click", () => {
            const exporter = new TableCSVExporter(table);
            const csvOutput = exporter.convertToCSV();
            const csvBlob = new Blob([csvOutput], {type: "text/csv"});
            const blobUrl = URL.createObjectURL(csvBlob);
            const anchorElement = document.createElement("a");

            anchorElement.href = blobUrl;
            anchorElement.download = "rents.csv";
            anchorElement.click();

            setTimeout(() => {
                URL.revokeObjectURL(blobUrl);
            }, 500);
        });

        $("body").on("click", "#export-btn-pdf", function () {
            html2canvas($('#datatable')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("rents.pdf");
                }
            });
        });

    </script>


@endsection





