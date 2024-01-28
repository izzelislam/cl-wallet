@extends("layouts.app")

@section("title", "Wallet")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 m-auto my-5">
                <livewire:user/>
                <livewire:wallet />
                <livewire:transaction />
            </div>
        </div>
    </div>

    

@endsection
