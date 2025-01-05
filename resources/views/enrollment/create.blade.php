<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enrollment - College of Business Education</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #FFC107;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .navbar a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .navbar a:hover {
            background-color: #FF8c00;
            color: white;
        }

        .main-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .enrollment-container {
            width: 100%;
            max-width: 800px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .enrollment-header {
            background-color: #FFC107;
            color: #333;
            padding: 20px;
            text-align: center;
        }

        .enrollment-header h1 {
            margin: 0;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .enrollment-form {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #eee;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #FFC107;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.1);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M8 11l-4-4h8l-4 4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #FFC107;
            border: none;
            border-radius: 8px;
            color: #333;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background-color: #FF8c00;
            color: white;
            transform: translateY(-1px);
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .back-link a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .back-link a:hover {
            color: #FFC107;
        }

        @media (max-width: 768px) {
            .enrollment-container {
                margin: 10px;
            }
            
            .enrollment-form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="nav-brand">College of Business Education</a>
            <div class="nav-links">
                <a href="{{ route('login') }}">Student Login</a>
                <a href="{{ route('officer.login') }}">Officer Login</a>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="enrollment-container">
            <div class="enrollment-header">
                <h1>New Student Enrollment</h1>
                <p>Please fill out the form below to begin your enrollment</p>
            </div>

            <div class="enrollment-form">
                <form method="POST" action="{{ route('enrollment.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" 
                            id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                        @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                            id="phone" name="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="course">Desired Course</label>
                        <select class="form-control @error('course') is-invalid @enderror" 
                            id="course" name="course" required>
                            <option value="">Select a course</option>
                            <option value="bsba" {{ old('course') == 'bsba' ? 'selected' : '' }}>BSBA</option>
                            <option value="bsoa" {{ old('course') == 'bsoa' ? 'selected' : '' }}>BSOA</option>
                            <!-- Add more courses as needed -->
                        </select>
                        @error('course')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class='bx bx-check'></i>
                        <span>Submit Enrollment</span>
                    </button>

                    <div class="back-link">
                        <a href="{{ route('enrollment.index') }}">
                            <i class='bx bx-left-arrow-alt'></i>
                            <span>Back to Enrollment Options</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
