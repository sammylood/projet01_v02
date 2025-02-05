{{ include('layouts/header.php', {title:'Client Create'})}}

<header class="entete">
    <section class="fil-ariane container">
        <span>Bonjour {{ session.user_name }}</span>
    </section>
</header>

<main class="container width-100">

    <section class="produit-header">

        <div class="produit-achat">

            <?php
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

                    $image_name = $_FILES["fileToUpload"]["name"];
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            ?>


            <h1>Création de timbre</h1>
            <br>
            <form  method="POST" enctype="multipart/form-data"><!-- action vide: travailler avec le même nom de colonne -->
                <h2>Nouveau timbre</h2>
                <label class="hidden">User ID
                    <input type="hidden" name="users_id_user" value="{{session.user_id}}" required>
                </label>
                <label>Nom
                    <input type="text" name="nom" required>
                </label>
                <label>Annee
                    <input type="number" name="annee" value="1900" required>
                </label>
                <label>Couleur
                    <input type="text" name="couleur" value="bleu" required>
                </label>
                <label>Tirage
                    <input type="text" name="tirage" value="tirage {{ timbres|last.id_timbre }}" required>
                </label>
                <label>Dimensions
                    <input type="text" name="dimensions" value="5cmx5cm" required>
                </label>
                <label>Certification</label>
                <label for="nonCertifie">Non certifié</label>
                <input type="radio" id="nonCertifie" name="certifie" value="0" required>
                <br>
                <label for="certifie">Certifié</label>
                <input type="radio" id="certifie" name="certifie" value="1" required>
                <br>

                <label for="conditions">Conditions</label>
                <select id="conditions" name="conditions_id_condition" required>
                    {% for condition in conditions %}
                    <option value="{{ condition.id_condition }}">{{ condition.niveau }}</option>
                    {% endfor %}
                </select>

                <label for="countries">Pays</label>
                <select id="countries" name="pays_id_pays" required>
                    {% for country in countries %}
                    <option value="{{ country|sort.id_country }}">{{ country.country_name }}</option>
                    {% endfor %}
                </select>

                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">

                <input type="submit" class="bouton" value="Créer le timbre">
            </form>
        </div>
    </section>


</main>
{{ include('layouts/footer.php')}}