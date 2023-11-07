<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<body style="background-color: #f5f5f5;">

<div class="container">
        <h2 class="text-decoration-underline">Evenement aanmaken</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    <form method="post" action="/events">
        @csrf
        <div class="form-group">
            <label for="name">Naam:</label>
            <input id="name" type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="beginTime">Begin Tijd:</label>
            <input id="beginTime" type="datetime-local" name="beginTime" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="endTime">Eind Tijd:</label>
            <input id="endTime" type="datetime-local" name="endTime" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Straatnaam:</label>
            <input id="location" type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="house_number">Huisnummer:</label>
            <input id="house_number" type="text" name="house_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Postcode:</label>
            <input id="postal_code" type="text" name="postal_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amountOfVolunteersNeeded">Aantal Benodigde Vrijwilligers:</label>
            <input id="amountOfVolunteersNeeded" type="number" name="amountOfVolunteersNeeded" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Beschrijving:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Evenement Aanmaken</button>
    </form>
</div>
</body>
