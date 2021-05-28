
@extends('admin.master')

@section('content')


</nav>
<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
    <h1>dashboard</h1>
    <div class="col-md-6">
        <h1>bmw</h1>
        <h1>add new</h1>
        <div class="panel-body">

        {{!! Form::open(['route'=>'product.store','method'=>'post','files'=>true])!!}}
<div class="form-group">

{{ form::hidden('user_id',Auth::user()->id)}}

    {{Form::label('proname','name')}}
{{ form::text('pro_name',null,array('class'=>'form-control'))}}
</div>
<div class="form-group">
    {{Form::label('Code','Code')}}
{{ form::text('pro_code',null,array('class'=>'form-control'))}}
</div>



<div class="form-group">
    {{Form::label('price','price')}}
{{ form::text('pro_price',null,array('class'=>'form-control'))}}
</div>


<div class="form-group">
    {{Form::label('Description','Description')}}
{{ form::text('pro_info',null,array('class'=>'form-control'))}}
</div>
    
       <div class="form-group">
                 {{ Form::label('categorie_id', 'Categories') }}
                 {{ Form::select('categorie_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
            </div>
<div class="form-group">
    {{Form::label('image','image')}}
{{ form::file('image',null,array('class'=>'form-control'))}}
</div>
<div class="form-group">
    {{Form::label('Sale price','Sale price')}}
{{ form::text('spl_price',null,array('class'=>'form-control'))}}
</div>
{{Form::submit('submit',array('class'=>'btn btn-primary'))}}

{{!! Form::close() !!}}
    </div>
    </div>

</main>
</div>
@endsection