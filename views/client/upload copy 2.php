<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $message = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $message = "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $message = "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $message = "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $message = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        $image_name = $_FILES["fileToUpload"]["name"];
?>




<?php

    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}
?>


{{ include('layouts/header.php', {title:'Téléverser image'})}}

<header class="entete">
    <section class="fil-ariane container">
        <span>Bonjour {{ session.user_name }}</span>
    </section>
</header>

<main class="container">

    <section class="produit-header">

        <div class="produit-achat">



            <h1>Finaliser votre enchère</h1>
            <br>
            {{ $message }}
            {{ $image_name }}
            <form method="POST" enctype="multipart/form-data"><!-- action vide: travailler avec le même nom de colonne -->
                <h2>Nouveau timbre</h2>

                <label class="hidden">Url de l'image
                    <input type="hidden" name="image_url" value="$image_name" required>
                </label>

                <label>Ajoutez une description à l'image (alt)
                    <input type="text" name="alt_text" placeholder="Description de l'image" required>
                </label>

                <label class="hidden">Image principale
                    <input type="hidden" name="principale" value="1" required>
                </label>



                <label class="hidden">id du timbre associé
                    <input type="hidden" name="timbres_id_timbre" value="{% for timbre in timbres %}
            {% if timbre.users_id_user == session.user_id %}
            {{ timbres|last.id_timbre }}
            {% endif %}
            {% endfor %}" required>
                </label>

                <img class="image-apercu" src="{{asset}}{{ $image_name }}" alt="" width="200">


                <input type="submit" class="bouton" value="Créer le timbre">
            </form>
        </div>
    </section>


</main>
{{ include('layouts/footer.php')}}