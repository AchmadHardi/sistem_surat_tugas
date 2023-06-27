@foreach($purchasedTickets as $purchasedTicket)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $purchasedTicket->flightTicket->nama_maskapai }}</h5>
            <p class="card-text">Kelas: {{ $purchasedTicket->flightTicket->kelas }}</p>
            <p class="card-text">Asal: {{ $purchasedTicket->flightTicket->asal }}</p>
            <p class="card-text">Tujuan: {{ $purchasedTicket->flightTicket->tujuan }}</p>
            <p class="card-text">Tanggal: {{ $purchasedTicket->flightTicket->tanggal }}</p>
            <p class="card-text">Jam Berangkat: {{ $purchasedTicket->flightTicket->jam_berangkat }}</p>
            <p class="card-text">Jam Tiba: {{ $purchasedTicket->flightTicket->jam_tiba }}</p>
        </div>
    </div>
@endforeach
