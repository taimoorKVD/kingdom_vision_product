<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} | Role Listing Pdf</title>
    <style>
        #role {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #role td, #role th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #role tr:nth-child(even){background-color: #f2f2f2;}

        #role tr:hover {background-color: #ddd;}

        #role th {
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
    Role Listing
</h1>
<table id="role">
    <tr>
        <th>No#</th>
        <th>Name</th>
        <th>Created At</th>
    </tr>
    @if($data->count() > 0)
        @foreach($data as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ date('d M, Y', strtotime($role->created_at)) }}</td>
            </tr>
        @endforeach
    @endif
</table>

</body>
</html>
