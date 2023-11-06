<div class="container">
    <h2>Evenement aanmaken</h2>
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
            <label for="location">straatnaam:</label>
            <input id="location" type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="house_number">huisnummer:</label>
            <input id="house_number" type="text" name="house_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="postal_code">postcode:</label>
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
        <button type="submit" class="btn btn-primary">Evenement Aanmaken</button>
    </form>
</div>
