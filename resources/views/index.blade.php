@extends('layout')

@extends('logout')


@section('content')
    <div style="text-align: center; padding-top: 20px;">
        <form action="{{ route('url.shorten') }}" method="post"
            style="display: inline-block; background-color: #f0f0f0; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            @csrf
            <input type="url" name="long_url" placeholder="Enter URL"
                style="width: 300px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; margin-right: 10px;">
            <button type="submit"
                style="padding: 10px 20px; background-color: #4caf50; color: white; border: none; border-radius: 4px; cursor: pointer;">Shorten</button>
        </form>
    </div>

   
@endsection
