{{ include('layouts/header.php', {title:'User Show'})}}
<header class="entete">
    <section class="fil-ariane container">
        <span><a href="">Comptes </a> > <a href=""> Compte</a></span>
    </section>
</header>

<div class="container">
    <h1>Utilisateur</h1>
    <p><strong>Numéro: </strong>{{ user.id }}</p>
    <p><strong>Nom : </strong>{{ user.name }}</p>
    <p><strong>Username (email): </strong>{{ user.username }}
    </p>
    <p><strong>Niveau de privilège: </strong>{{ user.privilege_id }}
    </p>
    <p><strong>Date de création : </strong>{{ user.created_at }}
    </p>
    <a href="{{ base }}/user/userEdit?id={{ user.id }}" class="btn">Edit</a>
    <form action="{{ base }}/user/delete" method="post">
        <input type="hidden" name="id" value="{{ user.id }}">
        <button type="submit" class="btn">Delete</button>
    </form>
</div>
{{ include('layouts/footer.php')}}