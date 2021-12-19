<?php 
 
namespace App\Repositories;
use App\Models\Form;
use App\Repositories\CustomerRepositoryInterface;
class CustomerRepository implements CustomerRepositoryInterface {

	public function all(){

		 return Form::get();
	}

	public function store(array $data){

		  return Form::create($data);
	}

	public function get($id){

		  return Form::find($id);
	}

	public function update($id,array $data){

		return Form::find($id)->update($data);
	}

	public function delete($id){

		return Form::find($id)->delete();
	}

}
