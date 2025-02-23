<!DOCTYPE html>
<html>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resume</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .resume-container {
                display: flex;
                max-width: 900px;
                margin: 20px auto;
                box-shadow: 0px 0px 10px 0px #ccc;
            }

            .sidebar {
                width: 35%;
                background-color: #2d3e50;
                color: white;
                padding: 20px;
            }

            .sidebar img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                display: block;
                margin: 0 auto 10px;
            }

            .sidebar h2 {
                text-align: center;
            }

            .sidebar p,
            .sidebar ul {
                font-size: 14px;
            }

            .sidebar ul {
                list-style: none;
                padding: 0;
            }

            .sidebar ul li {
                margin: 10px 0;
            }

            .content {
                width: 65%;
                background: white;
                padding: 20px;
            }

            h1 {
                color: #2d3e50;
            }

            h2 {
                border-bottom: 2px solid #2d3e50;
                padding-bottom: 5px;
                margin-bottom: 10px;
            }

            ul {
                list-style: none;
                padding: 0;
            }

            ul li {
                margin: 5px 0;
            }
        </style>
    </head>

    <body>
        <div class="resume-container">
            <div class="sidebar">
                @foreach ($about as $a)
                    <h2>{{ $a->name }}</h2>
                @endforeach
                @foreach ($contact_details as $con_index => $con)
                    <p>{{ $con->address }}</p>
                    <p>{{ $con->phone }}</p>
                    <p>{{ $con->email }}</p>
                @endforeach

                <h2>SUMMARY</h2>
                @foreach ($about as $a)
                    <p>{{ $a->tagline }}
                    </p>
                @endforeach

                <h2>SKILLS</h2>
                <ul>
                    @foreach ($skill as $sk)
                        <li>{{ $sk->skill_name }}</li>
                    @endforeach

                </ul>
            </div>
            <div class="content">
                @foreach ($about as $a)
                    <h1>{{ $a->name }}</h1>
                @endforeach
                <h2>EXPERIENCE</h2>

                @foreach ($experiences as $exp)
                    <p>
                        <strong>{{ $exp->company_name }}</strong> {{ $exp->location }}
                    </p>
                    <p>{{ $exp->start_date }} - {{ $exp->end_date }}</p>
                    <ul>
                        <li>{{ $exp->description }}</li>
                    </ul>
                @endforeach




                <h2>EDUCATION</h2>
                <p><strong>Diploma in Financial Accounting</strong></p>
                <p>Oxford Software Institute, New Delhi, India (2016)</p>
            </div>
        </div>
    </body>

    </html>



</body>

</html>
