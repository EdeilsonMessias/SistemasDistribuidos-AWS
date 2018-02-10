@extends('cabecalho')
@section('conteudo')
	<div class="row">
		<div class="col-sm-6">
			@if (isset($dados['alert']) && $dados['alert'])
				<div class="alert alert-success">Upload Realizado com Sucesso!</div>
			@elseif (isset($dados['alert']) && !$dados['alert'])
				<div class="alert alert-danger">Upload não Realizado!</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Upload</h3>
				</div>
				<div class="panel-body">
					<form method="post" action="{{ url('aws')}}" enctype="multipart/form-data">  
				    	{{ csrf_field() }}
				    	<div class="form-group">
						    <input required type="file" class="form-control" name="file">
					  	</div>
				    	<input class="btn btn-primary" type="submit" value="Confirmar"/>
			    	</form>	
				</div>
			</div>	
		</div>
		@if (!empty($dados['arquivos']))
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Download</h3>
					</div>
					<div class="panel-body">
						<ul class="list-group">
						@foreach ($dados['arquivos'] as $arquivo)
							<li class="list-group-item"><a target="_blank" href="{{ $arquivo['url'] }}">{{ $arquivo['nome'] }}</a></li>
						@endforeach
						</ul>
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection</form>