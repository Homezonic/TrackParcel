<div>
    <!-- Display shipment details -->
    <h1>Shipment Tracking</h1>
    <p>Tracking ID: {{ $shipment->tracking_id }}</p>
    <p>Shipper: {{ $shipment->shipper_name }}</p>
    <!-- Add more fields as needed -->

    <!-- Update label status using Alpine.js -->
    <div x-data="{ labelStatus: '{{ $shipment->tracking->label_status }}' }">
        <p>Label Status: <span x-text="labelStatus"></span></p>
        <button x-on:click="labelStatus = 'In Progress'">Update Label Status</button>
        <!-- Add more Alpine.js interactions as needed -->
    </div>
</div>
