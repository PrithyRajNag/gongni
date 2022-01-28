<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <tr>
        <td><b>Full Name</b></td>
        <td><b>Father Name</b></td>
        <td><b>Mother Name</b></td>
        <td><b>Gender</b></td>
        <td><b>Phone Number</b></td>
        <td><b>Emergency Contact</b></td>
        <td><b>Date of Birth</b></td>
        <td><b>Blood Group</b></td>
        <td><b>Marital Status</b></td>
        <td><b>Spouse Name</b></td>
        <td><b>Present Address</b></td>
        <td><b>Permanent Address</b></td>
        <td><b>Designation</b></td>
        <td><b></b></td>
    </tr>
    <tbody>
    @foreach ($document as $item)
            <tr>
                <td>{{ $item->full_name }}</td>
                <td>{{ $item->father_name }}</td>
                <td>{{ $item->mother_name }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->phone_number }}</td>
                <td>{{ $item->emergency_contact }}</td>
                <td>{{ $item->dob }}</td>
                <td>{{ $item->blood_group_id}}</td>

                <td>{{ $item->marital_status }}</td>
                <td>{{ $item->spouse_name }}</td>
                <td>{{ $item->present_address }}</td>
                <td>{{ $item->permanent_address }}</td>
                <td>{{ $item->designation }}</td>

            </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
