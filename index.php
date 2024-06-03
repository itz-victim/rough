<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.png">

    <style>
        body {
            background-color: black;
        }

        /* Transparent input fields with borders */
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            background-color: transparent;
            border: 1px solid #ccc;
            color: white;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 10px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            background-color: transparent; /* Set background color to transparent when focused */
            outline: none;
        }
        h4 {
            background-color: transparent;
            border: 1px solid #ccc;
            color: white;
            padding: 10px;
            border-radius: 15px;
            width: fit-content;
            margin: 10px auto;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            text-align: center;
        }
    </style>
</head>
<body>
    <main class="container mx-auto p-6 text-white">
        <h3 class="text-2xl text-center mb-8">Store User Information<hr><hr><hr><hr></h3>
        <h4 class="mb-14"><a href="https://igdrones.com/">IG Drones</a></h4>

        <form method="post" action="store.php" class="w-full max-w-lg mx-auto">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-medium mb-2" for="user_name">
                        Name
                    </label>
                    <input class="appearance-none block bg-transparent text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-transparent" id="user_name" type="text" name="user_name">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-medium mb-2" for="email">
                        Email
                    </label>
                    <input class="appearance-none block bg-transparent text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-transparent" id="email" type="email" name="email">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-medium mb-2" for="phone">
                        Phone
                    </label>
                    <input class="appearance-none block bg-transparent text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-transparent" id="phone" type="tel" name="phone">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-medium mb-2" for="in_time">
                        IN Time
                    </label>
                    <input class="appearance-none block bg-transparent text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-transparent" id="in_time" type="text" name="in_time">
                </div>
                <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-white text-xs font-medium mb-2" for="subject">
                       Subject
                </label>
                <select class="appearance-none block bg-transparent text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-transparent" id="subject" name="subject">
                <option value="">Select a subject</option>
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-medium mb-2" for="out_time">
                        OUT Time
                    </label>
                    <input class="appearance-none block bg-transparent text-gray-700 border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-transparent" id="out_time" type="text" name="out_time">
                </div>
            </div>
            <div class="md:flex md:items-center md:justify-center mb-6">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline-blue focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Submit
                    </button>
            </div>
        </form>
     
        <form method="post" action="show(sql).php" class="w-full max-w-lg mx-auto">
            <div class="md:flex md:items-center md:justify-center mb-6">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline-blue focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Show all details
                    </button>
            </div>
        </form>
     </div>
    </main>
</body>
</html> 