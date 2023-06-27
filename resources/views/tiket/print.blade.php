<!DOCTYPE html>
<html>
<head>
  <title>Flight Ticket</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    
    .ticket {
      width: 500px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f5f5f5;
      margin: 0 auto;
    }
    
    .ticket-header {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .ticket-header h2 {
      margin: 0;
      font-size: 24px;
    }
    
    .ticket-details {
      margin-bottom: 20px;
    }
    
    .ticket-details p {
      margin: 5px 0;
    }
    
    .ticket-passenger {
      margin-bottom: 20px;
    }
    
    .ticket-passenger p {
      margin: 5px 0;
    }
    
    .ticket-qrcode {
      text-align: center;
    }
    
    .ticket-qrcode img {
      max-width: 150px;
    }
  </style>
</head>
<body>
  <div class="ticket">
    <div class="ticket-header">
      <h2>Flight Ticket</h2>
    </div>
    <div class="ticket-details">
      <p><strong>Airline:</strong> {{ $tiket->nama_maskapai }}</p>
      <p><strong>Price:</strong>  {{ $tiket->harga }}</p>
      <p><strong>Departure Time:</strong> {{ $tiket->jam_berangkat }}</p>
      <p><strong>Arrival Time:</strong> {{ $tiket->jam_tiba }} </p>
      <p><strong>From:</strong> {{ $tiket->asal }}</p>
      <p><strong>To:</strong> {{ $tiket->tujuan }}</p>
    </div>
    <div class="ticket-passenger">
      <h3>Passenger Information</h3>
      <div class="ticket-passenger">
        <h3>Passenger Information</h3>
        <p><strong>Name:</strong> {{ $tiket->employee->nama_karyawan ?? 'N/A' }}</p>
      </div>
      
    </div>
    
  </div>
</body>
</html>
