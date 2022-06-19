<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        html {
            font-family: Tahoma, sans-serif;
        }

        .p-5 {
            padding: 5rem;
        }

        .flex-column {
            flex-direction: column;
        }

        .justify-content-center {
            justify-content: center;
        }

        .align-items-center {
            align-items: center;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table.unstyledTable td,
        table.unstyledTable th {
            border: 1px solid #AAAAAA;
            padding: 2px 6px;
        }

        table.unstyledTable thead {
            text-align: center;
        }

        table.unstyledTable thead th {
            font-weight: normal;
        }

        .float-bottom {
            position: absolute;
            bottom: 0;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>
                    <h1>Bluecloud Enrollment</h1>
                    <h5>Certificate of Enrollment</h5>
                </th>
            </tr>
        </thead>

    </table>

    <table class="unstyledTable">
        <tbody>
            <tr>
                <td><strong>Student ID:</strong> {{ $student->student_id }}</td>
                <td><strong>Academic Year:</strong>
                    {{ $academicSchedule->year_start . ' - ' . $academicSchedule->year_end }}</td>
            </tr>
            <tr>
                <td><strong>Student Name:</strong> {{ $student->first_name . ' ' . $student->last_name }}</td>
                <td><strong>Term:</strong>
                    {{ $academicSchedule->term }}</td>
            </tr>
            <tr>
                <td><strong>Program:</strong> {{ $student->program }}</td>
                <td><strong>Year Level:</strong> {{ $student->year }}</td>
            </tr>
        </tbody>
        </tr>
    </table>

    <hr>
    <h4>Assessment #{{ $assessment->assessment_id }}</h4>

    <table class="unstyledTable">
        <thead>
            <tr>
                <td>Course Code</td>
                <td>Course Name</td>
                <td>Schedule</td>
                <td>Instructor</td>
                <td>Units</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->name }}</td>
                    <td> {{ $course['days'] . ', ' . date('g:h a', strtotime($course['time_start'])) . ' - ' . date('g:h a', strtotime($course['time_end'])) }}
                    </td>
                    <td>{{ $course->instructor }}</td>
                    <td>{{ $course->units }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Fees Breakdown</h3>
    <table class="unstyledTable">
        <tbody>
            <tr>
                <td colspan="2"><strong>Tuition Fee</strong></td>
            </tr>
            <tr>
                <td>Total Units x Price per unit:</td>
                <td>{{ $assessment->total_units . ' x ' . $assessment->unit_price }}</td>
            </tr>
            <tr>
                <td></td>
                <td>= {{ $assessment->total_unit_price }}</td>
            </tr>
            <tr>
                <td><strong>Miscellaneous Fee</strong></td>
                <td>{{ $assessment->misc_price }}</td>
            </tr>
            <tr>
                <td>
                    <h4>Total: </h4>
                </td>
                <td>
                    <h4>Php {{ $assessment->total_price }}</h4>
                </td>
            </tr>
        </tbody>
    </table>
    <p class="float-bottom">
        Issued: {{ date('M d, Y') }}
    </p>
</body>

</html>
