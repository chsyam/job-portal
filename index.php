<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <style>
        table {
            margin: 1.5% 17%;
        }

        table p {
            font-size: 2rem;
            font-weight: bolder;
        }

        table td {
            font-size: 1.1rem;
            padding: 10px;
            margin: 10px;
            width: 400px;
            text-align: center;
        }

        .info {
            font-size: 1.1rem;
            color: darkgray;
            line-height: 40px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .button button {
            padding: 10px;
            border: 1px solid black;
            color: green;
            outline: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        .button button:hover {
            background-color: green;
            color: white;
            font-weight: bolder;
            box-shadow: 8px 8px 16px green;
            transition: 0.3s all ease-in-out;
        }

        .com {
            background: #00c3ff;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #ffff1c, #00c3ff);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #ffff1c, #00c3ff);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .com p {
            padding: 10px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 10px;
        }

        .des {
            background: #67B26F;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #4ca2cd, #67B26F);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #4ca2cd, #67B26F);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .des td {
            padding: 30px 50px;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <img class="logo" alt="" src="logo.jpg" alt="">
            <nav>
                <ul class="nav_links">
                    <li><a href="career_sample.php">Posted Jobs</a></li>
                    <li><a href="#">services</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="Login.php">Login/Sign up</a></li>
                </ul>
            </nav>
            <a href="#" class="cta"><button>Contact</button></a>
        </header>
        <table>
            <tr>
                <td colspan="2" class="info">
                    <p>Matching developers with great companies...</p>
                </td>
            </tr>
            <tr class="com">
                <td>
                    <p>For companies</p>
                </td>
                <td>
                    <p>For Job Seekers</p>
                </td>
            </tr>
            <tr class="des">
                <td>We are the market-leading technical interview platform to identify and hire developers wherever they are.</td>
                <td>Search for relavent jobs offered by hundreads of companies.</td>
            </tr>
            <tr>
                <td class="button">
                    <a href="companyAdmin.php"><button>Start Hiring</button></a>
                </td>
                <td class="button">
                    <a href="user_login.php"><button>Sign Up & Search</button></a>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>