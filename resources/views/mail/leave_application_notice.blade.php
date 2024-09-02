<!-- resources/views/emails/leave_notification.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Leave Application Notification')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }

        .content {
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>@yield('title', 'Leave Application Notification')</h2>
        </div>

        <div class="content">
            <p>Dear {{ $approver->first_name }},</p>

            <p>This is to inform you that <strong>{{ $leave->employee->first_name??'' }} {{
                    $leave->employee->last_name??'' }}</strong> has submitted a leave application for the following
                dates:</p>

            <ul>
                <li><strong>Leave Type:</strong> {{ $leave->type->name??'' }}</li>
                <li><strong>Leave Duration:</strong> {{ $leave->start_date }} to {{ $leave->end_date }}</li>
                <li><strong>Total Days:</strong> {{ $leave->days_requested }}</li>
            </ul>

            <p>Your approval is required to process this leave request. Please log in to the {{ config('app.name') }} to
                review and take the necessary action.</p>

            <p>Thank you for your prompt attention to this matter.</p>

            <p>Best regards,</p>
            <p>{{ config('app.name') }}</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>