@component('mail::message')


##Name :  {{ $form["fname"] }} {{ $form["lname"] }}
##Email :  {{ $form["email"] }}
##Subject :  {{ $form["subject"] }}
*Message* :  {{ $form["message"] }}


@endcomponent
