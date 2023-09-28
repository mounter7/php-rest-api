<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./index.js" defer></script>

    <style>
        * {
            appearance: none;
        }
    </style>
</head>

<body>
    <section id="section-0">
        <div class="container">
            <p class="msg"></p>
        </div>
        <div class="container">
            <form action="" id="form-1">
                <input type="text" name="username" id="username" required>
                <input type="number" name="age" id="age" required>
                <input type="submit" name="submit" id="form-1-submit" value="Add">
                <input type="submit" name="update" id="form-1-update" value="Update">
            </form>
        </div>
    </section>

    <section id="section-1">
        <div class="container">
            <table>
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </thead>
                <tbody id="table-data"></tbody>
            </table>
        </div>
    </section>
</body>

</html>