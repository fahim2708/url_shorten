@extends('layout')

@extends('logout')

@section('content')
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center">SN</th>
                    <th>Long URL</th>
                    <th>Short URL</th>
                    <th style="text-align: center">Total Clicks</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sn = 1;
                @endphp
                @foreach ($datas as $data)
                    <tr>
                        <td style="text-align: center">{{ $sn }}</td>
                        <td>{{ $data->long_url }}</td>
                        <td><a href="{{ url('http://127.0.0.1:8000/' . $data->short_url) }}"
                                target="_blank">http://short_url.com/{{ $data->short_url }}</a></td>
                        <td style="text-align: center">{{ $data->clicks }}</td>
                    </tr>
                    @php
                        $sn++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
