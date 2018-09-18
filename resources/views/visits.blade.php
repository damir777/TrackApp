@extends('layout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-xs-8">
            <h2 class="page-title">Visits</h2>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @if (!$visits->isEmpty())
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>User: {{ $user }}</h4>
                                    <div class="table-responsive m-t-lg">
                                        <table class="footable table table-stripped toggle-arrow-tiny">
                                            <thead>
                                            <tr>
                                                <th>Visit time</th>
                                                <th>Time on page</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($visits as $visit)
                                                <tr>
                                                    <td>{{ date('d.m.Y. H:i:s', strtotime($visit->start_time)) }}</td>
                                                    <td>{{ $visit->duration }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="2">{{ $visits->links() }}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection