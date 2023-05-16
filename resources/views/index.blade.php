<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
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
                @foreach ($optedCourse as $course)
                    <tr>
                        <td>{{ $course->student->name }}</td>
                        <td>{{ $course->student->parent->name }}</td>
                        <td>
                                {{ $course->course->course_name}}
                        </td>
                        <td>
                            <button class="toggle-status btn btn-sm btn-{{ $course->is_active ? 'success' : 'danger' }}" data-student-id="{{ $course->id }}">{{ $course->is_active ? 'Disable' : 'Enable' }}</button>
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
