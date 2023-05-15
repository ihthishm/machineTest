<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Student List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Student</th>
                    <th>Parent Name</th>
                    <th>Opted Courses</th>
                    <th>Enable or Disable</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->parent->name }}</td>
                        <td>
                            @foreach ($student->optedCourses as $course)
                                {{ $course->course_name }},
                            @endforeach
                        </td>
                        <td>
                            <button class="toggle-status btn btn-sm btn-{{ $student->is_active ? 'success' : 'danger' }}" data-student-id="{{ $student->id }}">{{ $student->is_active ? 'Disable' : 'Enable' }}</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let toggleButtons = document.querySelectorAll('.toggle-status');

            toggleButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let studentId = this.getAttribute('data-student-id');
                    let isCurrentlyActive = this.textContent.trim().toLowerCase() === 'disable';

                    axios.post('{{ route('updateStatus') }}', {
                        student_id: studentId,
                        is_active: !isCurrentlyActive
                    })
                    .then(function(response) {
                        if (response.data.success) {
                            let buttonText = isCurrentlyActive ? 'Enable' : 'Disable';
                            let buttonClass = isCurrentlyActive ? 'danger' : 'success';

                            button.textContent = buttonText;
                            button.classList.remove('btn-danger', 'btn-success');
                            button.classList.add('btn-' + buttonClass);
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                });
            });
        });
    </script>
</body>
</html>
