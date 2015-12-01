<table class="table">
    <thead>
    <th>Codmun</th>
			<th>Nommun</th>
			<th>Codest</th>
			<th>Codest</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($municipios as $municipios)
        <tr>
            <td>{!! $municipios->codmun !!}</td>
			<td>{!! $municipios->nommun !!}</td>
			<td>{!! $municipios->codest !!}</td>
			<td>{!! $municipios->codest !!}</td>
            <td>
                <a href="{!! route('municipios.edit', [$municipios->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('municipios.delete', [$municipios->id]) !!}" onclick="return confirm('Are you sure wants to delete this Municipios?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
