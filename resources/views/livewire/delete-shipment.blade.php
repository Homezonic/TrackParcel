<div>
    <h4>Confirm Deletion</h4>
    <p>Are you sure you want to delete the shipment?</p>

    <button wire:click="deleteShipment" class="btn btn-danger">Yes, Delete</button>
    <button wire:click="$emit('cancelDelete')" class="btn btn-secondary">Cancel</button>
</div>





<div class="col-md-4">
    <button type="button" class="btn btn-block bg-gradient-warning mb-3" data-bs-toggle="modal" data-bs-target="#modal-notification">Notification</button>
    
  </div>