<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>item list report</title>
    <style>
        .container {
            margin-left: auto;
            margin-right: auto;
            padding: 16px;
        }

        .text-2xl {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #e2e8f0;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #e2e8f0;
        }
    </style>
</head>

<body class="bg-opacity-50">
    <div class="container mx-auto p-4">
        <center>
            <h2 class="text-2xl font-semibold mb-4">List of all mesurements taken</h2>
        </center>
        <table style="width: 100%" class="w-full table-auto border border-collapse">
            <thead>
                <tr>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        Date
                    </th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        TDS value
                    </th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        Decision
                    </th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        Device
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($measures as $measure)
                <tr>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        {{$measure->created_at}}
                    </td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        {{$measure->value}}
                    </td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        {{$measure->value}}
                    </td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        @if ($measure->value > 1200)
                        {{"Bad Quality"}}
                        @else
                        {{"Good Quality"}}
                        @endif
                    </td>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        WM0000125
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h6 class="text-2xl font-semibold mb-4">Printed on: {{now()}}</h6>
        <h6 class="text-2xl font-semibold mb-4">Printed by {{Auth::user()->name}}</h6>
    </div>
</body>

</html>