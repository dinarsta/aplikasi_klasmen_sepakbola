@extends('layout.tampilan')
@section('content')
<div style="margin: auto" class="col-10">
    <div class="card-body">
        <h4 class="card-title">Klasmen</h4>
        <p class="card-description">

        </p>
        <div class="table-responsive">
            <table class="table table-bordered align="center"">
                <thead>
                    <tr>
                        <th>Nama Klub</th>
                        <th>Kota Klub</th>
                        <th>Main</th>
                        <th>M</th>
                        <th>S</th>
                        <th>K</th>
                        <th>GM</th>
                        <th>GK</th>
                        <th>Total Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($klasemen as $club)
                    <tr>
                        <td>{{ $club->name }}</td>
                        <td>{{ $club->kota }}</td>
                        <td>sekian</td>
                        {{-- <td>{{ $club->scores->where('result', 'M')->count() }}</td> --}}
                        <td>{{ $club->scores->where('result', 'M')->count() == null ? '0' : $club->scores->where('result', 'M')->count() }}
                        </td>
                        <td>{{ $club->scores->where('result', 'S')->count() == null ? '0' : $club->scores->where('result', 'S')->count() }}
                        </td>
                        <td>{{ $club->scores->where('result', 'K')->count() == null ? '0' : $club->scores->where('result', 'K')->count() }}
                        </td>
                        <td>{{ $club->goals_for }}</td>
                        <td>{{ $club->goals_against }}</td>
                        <td>{{ $club->total_score }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </table>
        </div>
    </div>
</div>
@endsection
