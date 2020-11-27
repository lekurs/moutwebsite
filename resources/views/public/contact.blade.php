<div class="contact-form">
    <div class="form-contact-container">
        <form action="{{ route('contactMail') }}" method="post">
            @csrf
            @include('layouts.form_errors.errors')
            <div class="floating-label contact-form-input-container">
                <input type="text" class="floating-input" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" ">
                <label for="exampleInputEmail1" class="float">Nom</label>
            </div>
            <div class="floating-label contact-form-input-container">
                <input type="text" class="floating-input" name="lastname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" ">
                <label for="exampleInputEmail1" class="float">Prénom</label>
            </div>
            <div class="floating-label contact-form-input-container">
                <input type="text" class="floating-input" name="company" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" ">
                <label for="exampleInputEmail1" class="float">Société</label>
            </div>
            <div class="floating-label contact-form-input-container">
                <input type="email" class="floating-input" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" ">
                <label for="exampleInputEmail1" class="float">Email</label>
            </div>
            <div class="floating-label contact-form-input-container">
                <input type="text" class="floating-input" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" ">
                <label for="exampleInputEmail1" class="float">Téléphone</label>
            </div>
            <div class="floating-label contact-form-input-container custom-control custom-radio">
                <div>
                    <input type="radio" class="custom-control-input" id="1" name="type">
                    <label class="custom-control-label" for="1">Web</label>
                </div>
                <div>
                    <input type="radio" class="custom-control-input" id="2" name="type">
                    <label class="custom-control-label" for="2">conseil</label>
                </div>
                <div>
                    <input type="radio" class="custom-control-input" id="3" name="type">
                    <label class="custom-control-label" for="3">création</label>
                </div>
            </div>
            <div class="floating-label contact-form-input-container text-left">
                <h6>Votre message</h6>
                <textarea name="message" cols="30" rows="10" id="message" class="textarea-contact" name="message"></textarea>
            </div>
            <div class="floating-label contact-form-input-container button-container text-right">
                <button type="submit" class="btn-submit-form">Envoyer</button>
            </div>
        </form>
    </div>
</div>
