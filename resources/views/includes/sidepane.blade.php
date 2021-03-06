<div class="sidebar">
    <ul class="nav nav-pills flex-column pe-2 ">
        <li class="nav-item brand">
            <a class="nav-link d-flex flex-column align-items-center" href="/">
                <img src="/img/logo.png" alt="logo">
                <span>{{config ('app.name')}}</span>
            </a>
        </li>
        <hr>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
                <span class="bi-speedometer"></span> Admin Dashboard</a>
        </li>
        <hr>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/new-enrollees') ? 'active' : '' }}" href="/admin/new-enrollees">
                <span class="bi-person-bounding-box"></span> New Applicants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/students') ? 'active' : '' }}" href="/admin/students">
                <span class="bi-people"></span> Students</a>
        </li>
        <hr>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/programs') ? 'active' : '' }}" href="/admin/programs">
                <span class="bi-card-list"></span> Programs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/courses') ? 'active' : '' }}" href="/admin/courses">
                <span class="bi-book"></span> Courses</a>
        </li>
        <hr>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/assessments') ? 'active' : '' }}" href="/admin/assessments">
                <span class="bi-file-text"></span> Assessments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/clearances') ? 'active' : '' }}" href="/admin/clearances">
                <span class="bi-clipboard2-check"></span> Clearances</a>
        </li>
        <hr>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/academic-schedule') ? 'active' : '' }}" href="/admin/academic-schedule">
                <span class="bi-calendar-event"></span> A.Y. Settings</a>
        </li>
    </ul>
</div>
