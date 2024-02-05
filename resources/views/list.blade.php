@extends('layout')

@extends('logout')

@section('content')
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Long URL</th>
                    <th>Short URL</th>
                    <th>Total Clicks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->long_url}}</td>
                    <td><a href="{{ url('http://127.0.0.1:8000/' . $data->short_url) }}" target="_blank">http://short_url.com/{{ $data->short_url }}</a></td>
                    <td>{{$data->clicks }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
