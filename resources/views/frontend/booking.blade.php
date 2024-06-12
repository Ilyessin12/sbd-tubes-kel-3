@extends('frontend.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Services Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container">

            <div class="section-title">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Booking</h2>
            </div>

            <form action="{{ route('frontend.booking.store') }}" method="post" role="form" id="form-add" enctype="multipart/form-data" onsubmit="prepareFormSubmission()">
                @csrf <!-- Ensure you have CSRF token for form submission -->
                <div class="mb-3">
                    <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
                    <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" required>
                </div>

                <!-- Booking Duration Selection -->
                <div class="mb-3">
                    <label for="hours">Pilih Jam Booking :</label>
                    <select id="hours" name="hours" class="form-control" onchange="updateTimeSlots()">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Dynamic Time Slot Selection -->
                <div class="mb-3">
                    <label for="timeSlots">Jam Tersedia:</label>
                    <select id="timeSlots" name="timeSlots" class="form-control">
                        <!-- Options will be added here by JavaScript -->
                    </select>
                </div>

                <input type="hidden" id="jam_mulai" name="jam_mulai">
                <input type="hidden" id="jam_selesai" name="jam_selesai">

                <div class="mb-3">
                    <label for="id_fasilitas" class="form-label">Fasilitas</label>
                    <select class="form-control" id="id_fasilitas" name="id_fasilitas" required>
                        <option value="" selected>Pilih</option>
                            @foreach ($fasilitas as $row)
                                <option value="{{$row->id_fasilitas}}">{{($row->nama_fasilitas)}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_voucher" class="form-label">Voucher (Optional)</label>
                    <select class="form-control" id="id_voucher" name="id_voucher">
                        <option value="" selected>Pilih</option>
                            @foreach ($voucher as $row)
                                <option value="{{$row->id_voucher}}">{{($row->nama_voucher)}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_ekstra" class="form-label">Ekstra (Optional)</label>
                    <select class="form-control" id="id_ekstra" name="id_ekstra">
                        <option value="" selected>Pilih</option>
                            @foreach ($ekstra as $row)
                                <option value="{{$row->id_ekstra}}">{{($row->nama_ekstra)}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_ekstra" class="form-label">Jumlah Ekstra</label>
                    <input type="number" class="form-control" id="jumlah_ekstra" name="jumlah_ekstra" value="0">
                </div>

                <a href="{{ route('frontend.home') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></a>
                <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add" form="form-add">Tambah Booking</button>
            </form>
        </div>
    </section>

</main><!-- End #main -->

<script>
    var statusMember = "{{ $customer->status_member }}";

    function updateTimeSlots() {
        let hoursElement = document.getElementById('hours');
        let hours = hoursElement.value;
        let timeSlots = document.getElementById('timeSlots');
        timeSlots.innerHTML = '';

        if (statusMember === 'member') {
            hours = '4'; // Lock hours to 4
            hoursElement.value = hours; // Set the select value to 4
            hoursElement.disabled = true; // Disable the select element
        } else {
            hoursElement.disabled = false; // Ensure it's enabled for non-members
        }

        let startTime = 7; // 7 AM
        let endTime = 17; // 5 PM

        for (let i = startTime; i <= endTime - hours; i++) {
            let startHour = String(i).padStart(2, '0') + ':00';
            let endHour = new Date(new Date('1970-01-01 ' + startHour).getTime() + (parseInt(hours) * 60 * 60 * 1000) - 60 * 1000);
            let endHourFormatted = endHour.getHours().toString().padStart(2, '0') + ':' + endHour.getMinutes().toString().padStart(2, '0');

            let option = document.createElement('option');
            option.value = startHour + '-' + endHourFormatted;
            option.text = startHour + ' to ' + endHourFormatted;
            timeSlots.add(option);
        }
    }

    function prepareFormSubmission() {
        let timeSlots = document.getElementById('timeSlots').value;
        let [jam_mulai, jam_selesai] = timeSlots.split('-');

        document.getElementById('jam_mulai').value = jam_mulai;
        document.getElementById('jam_selesai').value = jam_selesai;
    }

    updateTimeSlots(); // Call this function to initialize the hours select on page load
</script>

@endsection