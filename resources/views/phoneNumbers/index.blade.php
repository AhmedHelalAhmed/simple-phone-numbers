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
    <div class="row mt-3">
        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example">
                <option selected>Select country</option>
                <option value="1">One</option>
            </select>
        </div>
        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example">
                <option selected>All Numbers</option>
                <option value="0">Invalid phone numbers</option>
                <option value="1">Valid phone numbers</option>
            </select>
        </div>
    </div>
    <table class="table table-striped table-bordered mt-2">
        <thead>
        <tr>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">Country code</th>
            <th scope="col">Phone num.</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        </tbody>
    </table>
</section>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
