
    <link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/vendor/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/vendor/chartist/chartist.min.css">
    @php
  $getheaderSetting =  App\Models\parametre :: getSingle(); 
@endphp
<link href="{{$getheaderSetting->getfavicon() }}" rel="icon"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css"> 
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
