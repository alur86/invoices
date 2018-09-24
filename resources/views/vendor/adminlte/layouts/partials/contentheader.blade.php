<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Invoices App')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{$breadcrumbs_url}}"><i class="fa fa-dashboard"></i>{{$breadcrumbs_title}}</a></li>
        <li class="active">{{$breadcrumbs_title_active}}</li>
    </ol>
</section>



