<!-- Find Your Travel Form -->
<div id="st" class="container my-5">
  <h2>Find Your Travel</h2>
  <form>
    <div class="form-group">
      <label for="departureCity">City of Departure</label>
      <select class="form-control" id="departureCity" name="departureCity">
        <?php foreach ($cities as $city): ?>
          <option value="<?php echo $city->getVilleID(); ?>"><?php echo $city->getVilleNom(); ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="destinationCity">City of Destination</label>
      <select class="form-control" id="destinationCity" name="destinationCity">
        <?php foreach ($cities as $city): ?>
          <option value="<?php echo $city->getVilleID(); ?>"><?php echo $city->getVilleNom(); ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="departureDate">Departure Date</label>
      <input type="date" class="form-control" id="departureDate" name="departureDate">
    </div>
    <div class="form-group">
      <label for="numberOfTravelers">Number of Travelers</label>
      <input type="number" class="form-control" id="numberOfTravelers" name="numberOfTravelers" placeholder="Enter number of travelers" value="1" min="1" max="100">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
  </form>
</div>
