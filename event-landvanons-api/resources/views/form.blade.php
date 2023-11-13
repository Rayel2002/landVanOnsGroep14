<div class="container">
    <h2>Evenement aanmaken</h2>
    <form method="post" action="{{route('event.store')}}">
        @csrf
        <div class="form-group">
            <label for="event_name">Naam:</label>
            <input id="event_name" type="text" name="event_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="begin_time">Begin Tijd:</label>
            <input id="begin_time" type="datetime-local" name="begin_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">Eind Tijd:</label>
            <input id="end_time" type="datetime-local" name="end_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="street_name">straatnaam:</label>
            <input id="street_name" type="text" name="street_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="house_number">huisnummer:</label>
            <input id="house_number" type="text" name="house_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="postal_code">postcode:</label>
            <input id="postal_code" type="text" name="postal_code" class="form-control" required pattern="[1-9][0-9]{3}\s?[a-zA-Z]{2}">
        </div>
        <div class="form-group">
            <label for="amount_of_volunteers_needed">Aantal Benodigde Vrijwilligers:</label>
            <input id="amount_of_volunteers_needed" type="number" name="amount_of_volunteers_needed" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Beschrijving:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Evenement Aanmaken</button>
    </form>
</div>
