<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Libraries\Repositories\CategoriaRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CategoriaController extends AppBaseController
{

	/** @var  CategoriaRepository */
	private $categoriaRepository;

	function __construct(CategoriaRepository $categoriaRepo)
	{
		$this->categoriaRepository = $categoriaRepo;
	}

	/**
	 * Display a listing of the Categoria.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = $this->categoriaRepository->paginate(10);

		return view('categorias.index')
			->with('categorias', $categorias);
	}

	/**
	 * Show the form for creating a new Categoria.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categorias.create');
	}

	/**
	 * Store a newly created Categoria in storage.
	 *
	 * @param CreateCategoriaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCategoriaRequest $request)
	{


		$this->validate($request, [
			'nombre' => 'required|unique:posts|max:255',
			'descripcion' => 'required',
		]);


		$input = $request->all();

		$categoria = $this->categoriaRepository->create($input);

		Flash::success('Categoria Guardada Correctamente.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Display the specified Categoria.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = $this->categoriaRepository->find($id);

		if(empty($categoria))
		{
			Flash::error('Categoria no encontrada');

			return redirect(route('categorias.index'));
		}

		return view('categorias.show')->with('categoria', $categoria);
	}

	/**
	 * Show the form for editing the specified Categoria.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = $this->categoriaRepository->find($id);

		if(empty($categoria))
		{
			Flash::error('Categoria no encontrada');

			return redirect(route('categorias.index'));
		}

		return view('categorias.edit')->with('categoria', $categoria);
	}

	/**
	 * Update the specified Categoria in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCategoriaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCategoriaRequest $request)
	{
		$categoria = $this->categoriaRepository->find($id);

		if(empty($categoria))
		{
			Flash::error('Categoria no encontrada');

			return redirect(route('categorias.index'));
		}

		$categoria = $this->categoriaRepository->updateRich($request->all(), $id);

		Flash::success('Categoria Actualizada Correctamente.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Remove the specified Categoria from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = $this->categoriaRepository->find($id);

		if(empty($categoria))
		{
			Flash::error('Categoria no encontrada');

			return redirect(route('categorias.index'));
		}

		$this->categoriaRepository->delete($id);

		Flash::success('Categoria Borrada Correctamente.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'nombre' => 'required|max:255',
			'descripcion' => 'required|max:255',
		]);
	}
}
