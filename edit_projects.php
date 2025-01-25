<?php
// Path to your JSON file
$jsonFilePath = 'projects.json';

// Load JSON data from file
function loadJsonData($filePath) {
    if (file_exists($filePath)) {
        return json_decode(file_get_contents($filePath), true);
    } else {
        return array();
    }
}

// Save JSON data to file
function saveJsonData($filePath, $data) {
    file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
}

// Load JSON data
$projectsData = loadJsonData($jsonFilePath);

// Handle form submission
if (isset($_POST['save'])) {
    $newData = $_POST;
    foreach ($projectsData['projects'] as &$project) {
        if ($project['id'] == $newData['id']) {
            $project['name'] = $newData['name'];
            $project['description'] = $newData['description'];
            $project['year'] = $newData['year'];
            $project['client'] = $newData['client'];
            $project['startDate'] = $newData['startDate'];
            $project['endDate'] = $newData['endDate'];
            break;
        }
    }
    saveJsonData($jsonFilePath, $projectsData);
}

// If a project ID is provided, populate the form with its data
$selectedProject = array();
if (isset($_GET['id'])) {
    foreach ($projectsData['projects'] as $project) {
        if ($project['id'] == $_GET['id']) {
            $selectedProject = $project;
            break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Projects</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        li a {
            text-decoration: none;
            color: #337ab7;
        }
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }
        button[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>

<h2>Projects List</h2>
<ul>
    <?php foreach ($projectsData['projects'] as $project) { ?>
        <li>
            <?= $project['name']; ?> -
            <a href="edit_projects.php?id=<?= $project['id']; ?>">Edit</a>
        </li>
    <?php } ?>
</ul>

<?php if (!empty($selectedProject)) { ?>
    <h2>Edit Project: <?= $selectedProject['name']; ?></h2>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $selectedProject['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $selectedProject['name']; ?>">

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= $selectedProject['description']; ?></textarea>

        <label for="year">Year:</label>
        <input type="text" id="year" name="year" value="<?= $selectedProject['year']; ?>">

        <label for="client">Client:</label>
        <input type="text" id="client" name="client" value="<?= $selectedProject['client']; ?>">

        <label for="startDate">Start Date:</label>
<input type="date" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime($selectedProject['startDate'])); ?>">

<label for="endDate">End Date:</label>
<input type="date" id="endDate" name="endDate" value="<?= date('Y-m-d', strtotime($selectedProject['endDate'])); ?>">


        <button type="submit" name="save">Save Changes</button>
    </form>
<?php } else { ?>
    <p>Please select a project to edit.</p>
<?php } ?>

</body>
</html>