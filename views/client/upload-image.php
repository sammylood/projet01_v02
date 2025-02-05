{{ include('layouts/header.php', {title:'Téléverser image'})}}

<header class="entete">
    <section class="fil-ariane container">
        <span>Bonjour {{ session.user_name }}</span>
    </section>
</header>

<main class="container">

    <section class="produit-header">

        <div class="produit-achat">
            <h1>Création de timbre</h1>
            <br>
            <form action="upload-image" method="POST" enctype="multipart/form-data"><!-- action vide: travailler avec le même nom de colonne -->
                <h2>Ajouter une image</h2>

                Choisissez l'image à téléverser:
                <input type="file" name="fileToUpload" id="fileToUpload">

                <input type="submit" class="bouton" value="Téléverser l'image et passer à l'étape finale">
            </form>
        </div>
    </section>


</main>
{{ include('layouts/footer.php')}}