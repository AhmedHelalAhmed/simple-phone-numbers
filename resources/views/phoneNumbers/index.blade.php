<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Laravel</title>
    <!-- Styles -->
    <style></style>
</head>

<body>
<section class="container-fluid">
    <h2>Phone Numbers</h2>
    <form class="inline-block" method="get" action="{{ route('phone-numbers.index') }}" id="filter_form">
        @csrf
        <div class="row mt-3">
            <div class="col-md-6">
                <select class="form-select"
                        aria-label="Default select example"
                        name="country_code">
                    <option @if(!request('country_code')) selected @endif value="">Select country</option>
                    @foreach ($countries as $country)
                        <option @if(request('country_code')==$country['code']) selected
                                @endif value="{{ $country['code'] }}">{{ $country['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-select"
                        aria-label="Default select example"
                        name="state">
                    @foreach($states as $value => $text)
                        <option value="{{$value}}" @if(request('state')==$value) selected @endif >{{$text}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <table class="table table-striped table-bordered table-hover mt-2">
        <thead>
        <tr>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">Country code</th>
            <th scope="col">Phone num.</th>
        </tr>
        </thead>
        <tbody>
        @foreach($phoneNumbers as $phoneNumber)
            <tr>
                <th scope="row">{{ $phoneNumber['countryName'] }}</th>
                <td>{{ $phoneNumber['state'] }}</td>
                <td>{{ $phoneNumber['countryCode'] }}</td>
                <td>{{ $phoneNumber['phoneNumber'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center mt-3 mb-5">
        {!! $phoneNumbers->links() !!}
    </div>
</section>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="{{ mix('/phoneNumbers-index.js') }}" defer></script>
</body>
</html>
