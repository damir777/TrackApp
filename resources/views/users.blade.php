@extends('layout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-xs-8">
            <h2 class="page-title">Users</h2>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @if (!$users->isEmpty())
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables">
                                    <thead>
                                    <tr>
                                        <th>Cookie</th>
                                        <th>IP</th>
                                        <th>Country</th>
                                        <th>Region</th>
                                        <th>Currency code</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Browser</th>
                                        <th>Number of visits</th>
                                        <th>Time on page</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr class="gradeX">
                                            <td><a href="{{ route('GetVisits', $user->id) }}">{{ $user->cookie }}</a></td>
                                            <td>{{ $user->ip }}</td>
                                            <td>{{ $user->country }}</td>
                                            <td>{{ $user->region }}</td>
                                            <td>{{ $user->currency_code }}</td>
                                            <td>{{ $user->latitude }}</td>
                                            <td>{{ $user->longitude }}</td>
                                            <td>{{ $user->browser }}</td>
                                            <td>{{ $user->num_of_visits }}</td>
                                            <td>{{ $user->duration }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.dataTables').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                ]
            });
        });
    </script>
@endsection