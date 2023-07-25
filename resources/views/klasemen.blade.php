<!-- Tampilan klasemen -->
<table>
    <thead>
        <tr>
            <th>Nama Klub</th>
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
                <td>sekian</td>
                {{-- <td>{{ $club->scores->where('result', 'M')->count() }}</td> --}}
                <td>{{ $club->scores->where('result', 'M')->count() == null ? '0' : $club->scores->where('result', 'M')->count() }}</td>
                <td>{{ $club->scores->where('result', 'S')->count() == null ? '0' : $club->scores->where('result', 'S')->count() }}</td>
                <td>{{ $club->scores->where('result', 'K')->count() == null ? '0' : $club->scores->where('result', 'K')->count() }}</td>
                <td>{{ $club->goals_for }}</td>
                <td>{{ $club->goals_against }}</td>
                <td>{{ $club->total_score }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
