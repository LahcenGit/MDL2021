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
                        <div class="bigtitle">Contactez-nous</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div id="title-bg">
        <div class="title">Contactez-nous</div>
    </div>

    <p class="page-content">
        N'hésitez pas à nous contacter pour toute question ou demande, nous sommes là pour vous aider.
    </p>
    <div class="spacer"></div>

    <div class="row">
        <form id="contact-form" action="{{asset('/contact')}}" method="POST">
        @csrf
    
        <div class="col-md-5">
            <div class="qc">
                <div class="form-group">
                    <label for="name">Nom complet<span>*</span></label>
                    <input type="text" class="form-control" placeholder="votre nom" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email<span>*</span></label>
                    <input type="email" class="form-control" placeholder="votre email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Sujet<span>*</span></label>
                    <input type="text" class="form-control" placeholder="le sujet" id="subject" name="subject" required>
                </div>
            </div>
        </div>
      
        <div class="col-md-5" >
            <div class="qc">
                <div class="form-group">
                    <label for="text">Messages<span>*</span></label>
                    <textarea class="form-control" id="message" name="message" required></textarea>
                </div>
                <div id="show_contact_msg" >
                </div>
                 <button class="btn btn-default btn-red btn-sm">Envoyer</button>
            </div>
        </div>

        </form>
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
