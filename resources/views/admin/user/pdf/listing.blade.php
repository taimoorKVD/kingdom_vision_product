<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} | User Listing Pdf</title>
    <style>
        #user {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #user td, #user th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #user tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #user tr:hover {
            background-color: #ddd;
        }

        #user th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #6c757d;
            color: white;
        }

        .table-heading {
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="table-heading">
    User Listing
</h1>
<table id="user">
    <tr>
        <th>No#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
    </tr>
    @if($data->count() > 0)
        @foreach($data as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ date('d M, Y', strtotime($user->created_at)) }}</td>
            </tr>
        @endforeach
    @endif
</table>

</body>
</html>
