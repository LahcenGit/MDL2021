@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; Contact</div>
                        <div class="bigtitle">Contact</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div id="title-bg">
        <div class="title">Contact</div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p class="page-content">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indusy standard dummy text ever since the 1500s.
            </p>
            <ul class="contact-widget">
                <li class="fphone">+213 560 09 90 33 </li>
                <li class="fmail lastone">contact@lamaisondulait.dz</li>
            </ul>
        </div>
        <div class="col-md-7 col-md-offset-1">
            <div class="qc">
                <form id="contact-form" action="{{asset('/contact')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom complet<span>*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span>*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Sujet<span>*</span></label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="text">Messages<span>*</span></label>
                        <textarea class="form-control" id="message" name="message" required></textarea>
                    </div>

                    <div id="show_contact_msg" >

                    </div>
                    <button class="btn btn-default btn-red btn-sm">Envoyer</button>
                </form>
            </div>
        </div>
    </div>


    <div class="spacer"></div>

</div>
@endsection
@push('contact-scripts')
<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $("#contact-form").on("submit", function (e)
    {
        $('#show_contact_msg').html('<div >En cours....</div>');
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();
        var subject = $('#subject').val();
        var formURL = $(this).attr("action");
        var data = {
            "_token": "{{ csrf_token() }}",
            name: name,
            email: email,
            subject:subject,
            message: message
        };
        $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: data,
                    success: function (res) {
                        if (res === '1') {
                            $('#show_contact_msg').html('<div class="alert alert-success mt-2" id="form-success" role="alert"> Votre messgae à été bien envoyer !</div>');
                        }
                    }
                });
        e.preventDefault();
    });

</script>
@endpush
